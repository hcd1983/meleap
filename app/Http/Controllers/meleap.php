<?php
namespace App\Http\Controllers;
define( "JpApi" , "https://api.meleap.com");
define( "EnApi" , "https://hado-official.com/en");
use Illuminate\Http\Request;
use Cache;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Sheets;
class meleap extends Controller
{
    public $default = [];
    public $products = [];
    public $currentpage = 1;
    public $totalPage = false;
    public $totalPosts = false;
    public $default_avatar = "https://api.meleap.com/wp-content/uploads/2020/09/%E4%B8%8B%E8%BC%89-1.jpg";
    public $IndexPageApi = JpApi."/wp-json/wp/v2/pages/107";
    public $SettingsApi = JpApi."/wp-json/wp/v2/pages?slug=settings&per_page=1";
    public $CategoryApi = JpApi."/wp-json/wp/v2/categories/?hide_empty=true";
    public $MembersApi = JpApi."/wp-json/wp/v2/team_member";
//    public $CategoryApi = "https://hado-official.com/en/wp-json/wp/v2/categories";
    public $PostApi = JpApi."/wp-json/wp/v2/posts/";
    public $ProductsApi = JpApi."/wp-json/wp/v2/product";
    public $PostApi_en = EnApi."/wp-json/wp/v2/posts/";
    public $CategoryApi_en = EnApi."/wp-json/wp/v2/categories/?hide_empty=true";
    public $PageSettingsStatic = false;
    public $postApiSetting = [
        "per_page" => 6,
        "order" => 'desc',
        "orderby" => "date"
//        "orderby"=>'menu_order'
    ];

    function __construct()
    {


        $origin_local = \Route::current()->parameter('locale');
        $locale = $origin_local;
        if ( in_array($locale, ['en', 'jp']) ){
            \App::setlocale($locale);
        }

        $locale = "jp";
        $current_params = \Route::current()->parameters();
        $route_name = \Request::route()->getName();


        if(isset($_GET["page"]) && $_GET["page"] && is_numeric($_GET["page"]) ){
            $this->currentpage = $_GET["page"];
            $this-> postApiSetting["page"] = $_GET["page"];
            unset($current_params["page"]);
        }

        $params_with_locale_en = array_merge($current_params,["locale"=>"en"]);
        $params_with_locale_jp = array_merge($current_params,["locale"=>"jp"]);



        if($route_name == null){
//            $localeLink = [
//                "en"=> route("home", ["locale"=>"en"]),
//                "jp"=> route("home", ["locale"=>"jp"])
//            ];
            $route_name = "home";
        }

        if($route_name == "news_single_api"){
            $route_name = "news_api";
            unset($params_with_locale_jp["id"]);
            unset($params_with_locale_en["id"]);
        }

        if($route_name == "news_api_category"){
            $route_name = "news_api";
            unset($params_with_locale_jp["slug"]);
            unset($params_with_locale_en["slug"]);
        }


        $localeLink = [
            "en"=> route( $route_name,$params_with_locale_en),
            "jp"=> route( $route_name, $params_with_locale_jp)
        ];


        $this->products = $this->ProductsGetter();
        $PageSettingsStatic = $this->PageSettings();

        $social_media = [
            "facebook"=> $PageSettingsStatic["acf"]["social_media_facebook"],
            "youtube"=> $PageSettingsStatic["acf"]["social_media_youtube"],
            "twitter"=> $PageSettingsStatic["acf"]["social_media_twitter"],
        ];



        view()->share('localeLink', $localeLink);
        view()->share('locale', $locale);
        view()->share('products', $this->products);
        view()->share('route_name', $route_name );
        view()->share('social_media', $social_media );
        view()->share('page_setting', $PageSettingsStatic );
    }

    function FormSubmit(Request $request){
        $data = $request->all();
        $this-> AppendGoogleSheet($data);

//        return true;
        $data = $request->all();
        $status = $this ->  SendContactMail($data);
        return $status;
//        return view('emails.template-1',$data);

//        return  $request->input('title');
//        return json_encode(["status"=>"success"]);
    }

    function AppendGoogleSheet($data){
        $pass = $data["pass"];
        if($data["locale"] == "jp"){
            $spreadsheet_id = '1wObGSEuXAgrUFth7rImuQ9aLbxYS_dbuR2GVs9ZA-k0';
        }else{
            $spreadsheet_id = '1-yjQRS98l4bsa54rgqka_HkiOmJWS_7tcG7Ja1eKWeo';
        }

        $PostSheet = 'demo2';
        $PostSheet = $data["title"];
//        列出所有 sheet;
        $all_sheets = Sheets::getService()->spreadsheets->get($spreadsheet_id)->sheets;
        $sheet_titles = [];
        foreach ($all_sheets as $key => $single){
            $sheet_titles[] = $single->properties->title;
        }
//偵伺表單是否存在 ，不在的話新增一個
        if(!in_array($PostSheet,$sheet_titles)){
            Sheets::spreadsheet($spreadsheet_id)->addSheet($PostSheet);
        }



//取得第一行的資料
        $sheets = Sheets::spreadsheet($spreadsheet_id)
        ->sheet($PostSheet.'!1:1')
        ->get()
        ->toArray();


        $labels = [];
        $insert = [];

        foreach($pass as $key => $item){
            if($item["label"] == "locale") continue;
            $labels[] = $item["label"];
            $insert[$item["label"]] = "";
            foreach($item["param"] as $_key => $param){
                if($_key > 0){
                    $insert[$item["label"]].=", ";
                }
                $insert[$item["label"]].= $param["value"];
            }
        }
//如果第一行沒資料，填入標題
        if(count($sheets) == 0){

            Sheets::sheet($PostSheet)->range('A1')->update([$labels]);
        }else{
//偵測新標題，加進去
            $firstRow = $sheets[0];
            $newRow = array_values (array_unique(array_merge($firstRow,$labels)));
            Sheets::sheet($PostSheet)->range('A1')->update([$newRow]);
        }

//  填入欄位資料
        Sheets::sheet($PostSheet)->append([$insert]);

    }

    function SendContactMail($data){


        $from = $this -> PageSettingsStatic["acf"]["send_mail_from"];
        $fromName = $this -> PageSettingsStatic["acf"]["send_mail_from_name"];
        if($data["locale"] == "jp"){
            $to = $this -> PageSettingsStatic["acf"]["send_mail_to"].",".$data["email"];
        }else{
            $to = $this -> PageSettingsStatic["acf"]["send_mail_to_en"].",".$data["email"];
        }



        if($fromName){
            $from = $fromName."<".$from.">";
        }

//        $to = "Dean Huang <hcd@mojopot.com>,hcd@hcd-design-studio.com";
        $subject = $data["title"]." - ";
        $subject .= isset($data["company"])? $data["company"] :$data["name"];

        $subject = mb_encode_mimeheader($subject, 'UTF-8');

        $message = view('emails.template-1',$data);
        $headers = [];
        $headers[] = 'From: ' . $from ;
        $headers[] =  'Reply-To: ' . $data["email"] ;
        $headers[] =  'X-Mailer: PHP/' . phpversion();
        $headers[] = 'MIME-Version: 1.0';
//        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'Content-type: text/html; charset=utf-8';

        $status = mail($to,$subject,$message,implode("\r\n", $headers));
        return $status;
    }


    function recache(){

        if(isset($_GET['key']) && $_GET['key']){
            $key = $_GET['key'];
            Cache::forget($key);

        }else{
//            \Artisan::call('cache:clear');
            Cache::flush();
        }


        $reacche = [];
        $reacche["products"] = $this->GetProducts();
        $reacche["index"] = $this -> GetIndexData();
        $reacche["members"] = $this -> GetMembers();
        $reacche["settings"] = $this -> GetPageSettings();

        dd($reacche);
        return "recache";
    }



    function GetProducts(){

        $value = Cache::rememberForever('products', function() {

            $endpoint = $this -> ProductsApi;
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $endpoint, [
                'query' => [
                    'per_page' => 99,
                    'order' => 'asc',
                ],
                'verify'=>false
            ]);
            $statusCode = $response->getStatusCode();
            $content = $response->getBody();
            $products = json_decode( $content->getContents() ,true);
            return $products;

        });
        return $value;

    }

    function ProductsGetter(){
        $products = $this->GetProducts();
        $_products_JP = [];
        $_products_EN = [];

        foreach ($products as $key => $product){
            extract($product);
            extract($acf);

            $main_pic_mobile = isset($main_pic_mobile) &&  $main_pic_mobile? $main_pic_mobile : $main_pic;
            $main_pic_mobile_en = isset($main_pic_mobile_en) &&  $main_pic_mobile_en ? $main_pic_mobile_en : $main_pic_mobile;

            $_products_JP[$slug] = [
                "slug"=>$slug,
                "title"=>$title["rendered"],
                "subtitle"=>$subtitle,
                "logo"=>$logo,
                "cover"=>$cover,
                "thumbnail"=>$thumbnail,
                "main_pic"=>$main_pic,
                "main_pic_mobile"=>$main_pic_mobile,
                "video_title"=>isset($video_title)? $video_title : "",
                "video_description"=>isset($video_description)? $video_description : "",
                "youtube_id"=>$youtube_id,
                "gallery"=>isset($gallery)?$gallery:[],
                "permalink"=>route('product', ["locale"=>"jp",'slug' => $slug])
            ];

            $_products_EN[$slug] = [
                "slug"=>$slug,
                "title"=>$title_en,
                "subtitle"=>$subtitle_en,
                "logo"=>$logo,
                "cover"=>$cover,
                "thumbnail"=>$thumbnail,
                "main_pic"=>$main_pic_en ? $main_pic_en : $main_pic,
                "main_pic_mobile"=>$main_pic_mobile_en,
                "video_title"=>isset($video_title_en)? $video_title_en : "",
                "video_description"=>isset($video_description_en)? $video_description_en : "",
                "youtube_id"=>$youtube_id_en,
                "gallery"=>isset($product["gallery-en"])?$product["gallery-en"]:[],
                "permalink"=>route('product', ["locale"=>"en",'slug' => $slug])
            ];

        }

        return [
            "jp" => $_products_JP,
            "en" => $_products_EN
        ];

    }

    function GetCategoryApiUrl(){
        $locale = \App::getLocale();
        if($locale == "en"){
            $endpoint = $this -> CategoryApi_en;
        }else{
            $endpoint = $this -> CategoryApi;
        }
        return $endpoint;
    }

    function GetCategory(){

        $locale = \App::getLocale();

        if($locale == "en"){
            $endpoint = $this -> CategoryApi_en;
        }else{
            $endpoint = $this -> CategoryApi;
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint, [
            'verify'=>false
        ]);
        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        $IndexData = json_decode( $content->getContents() ,true);
        return $IndexData;

    }

    function GetPostsApiUrl($query=[]){
        $locale = \App::getLocale();
        if($locale == "en"){
            $url = $this -> PostApi_en;
        }else{
            $url = $this -> PostApi;
        }
        $_query = array_merge($this->postApiSetting,$query);
        return $url."?".http_build_query($_query);
    }

    function GetPosts($query=[]){

        $locale = \App::getLocale();

        if($locale == "en"){
            $url = $this -> PostApi_en;
        }else{
            $url = $this -> PostApi;
        }

        $_query = array_merge($this->postApiSetting,$query);
//        $url = $this -> PostApi;
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url, ['verify' => false,'query'=>$_query]);
            $body = $res->getBody();
            $_body = json_decode($body,true);
//            dd($res->getHeaders());
            $this->totalPosts = $res->getHeader('X-WP-Total')[0];
            $this->totalPage = $res->getHeader('X-WP-TotalPages')[0];
        }catch(\GuzzleHttp\Exception\ClientException $e){
            $_body = false;
        }



        return $_body;
    }


    function index($locale=null){



        $_data = $this -> PageSettingsStatic;


        $marquee = [
            "jp" => [
                "text" => $_data["acf"]["marquee_jp"],
                "link" => $_data["acf"]["marquee_link_jp"],
            ],
            "en" => [
                "text" => $_data["acf"]["marquee_en"],
                "link" => $_data["acf"]["marquee_link_en"],
            ]
        ];

        $_last_post = $this-> GetPosts($query=[
            "per_page"=> 1,
        ]);

        if( is_array($_last_post) && count($_last_post) > 0){
            $last_post = $_last_post[0];


            $thumbnail = "";
            $size = "large";
            if(isset($last_post["better_featured_image"])){
                if(isset($last_post["better_featured_image"]["source_url"]) && $last_post["better_featured_image"]["source_url"]){
                    $thumbnail = $last_post["better_featured_image"]["source_url"];
                }
            }

            $title = $last_post["title"]["rendered"];
            $date = new \DateTime($last_post["date"]);
            $cover =  $thumbnail;
            $date_y = $date->format('Y');
            $date_m = $date->format('m');
            $date_d = $date->format('d');

            $last_post["title"] = $title;
            $last_post["cover"] = $thumbnail;
            $last_post["date"] = $date_y."/".$date_m."/".$date_d;

        }else{
            $last_post = null;
        }



        $data = [
            "marquee" => $marquee,
            "last_post" => $last_post
        ];


//        $data["products"] = $this -> products;
        return view("index",$data);
    }

    function GetPageSettings(){
        $value = Cache::rememberForever('settings', function() {

            $endpoint = $this -> SettingsApi;
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $endpoint, [
                'verify'=>false
            ]);
            $statusCode = $response->getStatusCode();
            $content = $response->getBody();
            $IndexData = json_decode( $content->getContents() ,true);
            return $IndexData;
        });

        return $value;
    }

    function PageSettings(){
        $settings = $this->GetPageSettings();
        if( is_array($settings) && count($settings) > 0){

            $_settings = $settings[0];

        }else{
            abort('500');
            $_settings = false;
        }

        $this -> PageSettingsStatic =  $_settings;

        return $_settings;
    }

    function GetIndexData(){

//        $seconds = 600;
//        $value = Cache::remember('IndexData', $seconds, function() {
//
//            $endpoint = $this -> IndexPageApi;
//            $client = new \GuzzleHttp\Client();
//            $response = $client->request('GET', $endpoint, [
//                'verify'=>false
//            ]);
//            $statusCode = $response->getStatusCode();
//            $content = $response->getBody();
//            $IndexData = json_decode( $content->getContents() ,true);
//            return $IndexData;
//
//        });

        $value = Cache::rememberForever('index', function() {

            $endpoint = $this -> IndexPageApi;
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $endpoint, [
                'verify'=>false
            ]);
            $statusCode = $response->getStatusCode();
            $content = $response->getBody();
            $IndexData = json_decode( $content->getContents() ,true);
            return $IndexData;

        });
        return $value;

    }


    //

    function joinus(){
        return view("index");
    }


    function company(){

        $_data = $this -> PageSettingsStatic;
        $map = $_data["acf"]["google_map"];


        $_members = $this->GetMembers();

//        dd($_members);
        $departments = [];
        foreach ($_members as $key => $single){
            $avatar =  $this -> default_avatar;
            if(isset($single["better_featured_image"])){
                if(isset($single["better_featured_image"]["source_url"]) && $single["better_featured_image"]["source_url"]){
                    $avatar = $single["better_featured_image"]["source_url"];
                }
                if(isset($single["better_featured_image"]["media_details"]["sizes"]["team_member"]["source_url"])){
                    $avatar = $single["better_featured_image"]["media_details"]["sizes"]["team_member"]["source_url"];
                }
            }

            if(isset($single["acf"]) && isset($single["acf"]["department"]) && $single["acf"]["department"]){
                $department = $single["acf"]["department"];
                $title = $single["title"]["rendered"];
                if(isset( $departments[$department])){

                }else{

                    $departments[$department] = [
                        "en"=>[],
                        "jp"=>[]
                    ];

                }

                $_single = [];
                $_single["jp"] = [];
                $_single["en"] = [];

                $_acf = $single["acf"];
                $_single["jp"] = [
                    "name" => $title,
                    "avatar"=>$avatar,
                    "department" => $department,
                    "position" => $_acf["position_jp"] ? $_acf["position_jp"]: $_acf["position_en"]
                ];

                $_single["en"] = [
                    "name" =>$_acf["name_en"],
                    "avatar"=>$avatar,
                    "department" => $department,
                    "position" => $_acf["position_en"]
                ];

                $departments[$department]["en"][] = $_single["en"];
                $departments[$department]["jp"][] = $_single["jp"];

            }

        }
//        dd($departments);
        return view("company",['departments'=>$departments,"map"=>$map]);
    }

    function GetMembers(){


        $value = Cache::rememberForever('members', function() {

//            $endpoint = "https://apimeleap.it-monk.com/wp-json/wp/v2/team_member";
            $endpoint = $this->MembersApi;
            $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', $endpoint, [
                'query' => [
                    'per_page' => 99,
                    'order' => 'asc',
                ],
                'verify'=>false
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getBody();
            $members = json_decode( $content ->getContents() ,true);

            return $members;
        });


        return $value;

    }

    function contact(){
        return view("contact");
    }
    function product($locale,$slug){

        if(isset($this->products[$locale][$slug]) ){
            return view("ProductSingle",$this->products[$locale][$slug]);
        }else{
            abort(404);
        }


        dd($this->products);
//        return "product".$id;
    }

    function news(){

        return view("news");

    }

    function GetCategoryName($categories,$cid){
        $res = [
            "name" =>"",
            "slug" => ""
        ];

        foreach ($categories as $key => $category){

            if($category["id"] == $cid){
                $res["name"] = $category["name"];
                $res["slug"] = $category["slug"];
                break;
            }
        }
        return $res;
    }

    function news_api($locale){

        return $this -> news_api_list_by_vue();
        $categories = $this->GetCategory();
        $posts = $this-> GetPosts();

        if(!$posts){
            abort(404);
        }else{
            foreach ($posts as $key => $post){
                $post["post_category"] = "";
                if( isset($post["categories"][0]) ){
                    $cid =  $post["categories"][0];
                    $post["post_category"] = $this->GetCategoryName($categories,$cid)["name"];
                    $posts[$key] = $post;
                }
                $posts[$key] = $post;
            }

        }

        return view("news_api",[
            "posts"=>$posts,
            "categories"=>$categories,
            "current_page" => $this->currentpage,
            "total_page" => $this->totalPage,
            "total_posts" => $this->totalPosts,
        ]);

    }

    function news_api_list_by_vue($slug=null,$query=null){

        $categoriesUrl = $this -> GetCategoryApiUrl();
        $postsUrl = $this -> GetPostsApiUrl();

        return view("news_api_vue",[
            "CategoryApiUrl"=> $categoriesUrl,
            "PostsApiUrl"=> $postsUrl,
            "slug"=>$slug,
            "search"=>$query
        ]);

    }

    function search($locale,$query=null,Request $request){
        $this -> postApiSetting["per_page"] = 100;

        $keyword= $request->input('query');
        if($keyword){

            return redirect()->route('search', [
                "locale" => $locale,
                "query" => $keyword
            ]);
        }

        if(!$query){
            return redirect()->route('news_api',["locale"=>$locale]);
        }
        return $this->news_api_list_by_vue($slug=null,$query);
    }

    function news_api_category($locale,$slug=null){

        if($slug == null){
            abort('404');
        }

        return $this -> news_api_list_by_vue($slug);

        $categories = $this->GetCategory();
        $current_category = null;
        foreach ($categories as $key => $category){

            if(isset($category["slug"]) && $category["slug"] == $slug){
                $current_category = $category;
                break;
            }
        }

        if($current_category == null){
            abort('404');
        }else{

            $posts = $this-> GetPosts($query=[
                "categories" => $current_category["id"]
            ]);

            $categories = $this->GetCategory();
            $posts = $this-> GetPosts();

            if(!$posts){
                abort(404);
            }else{

                foreach ($posts as $key => $post){
                    $post["post_category"] = "";
                    if( isset($post["categories"][0]) ){
                        $cid =  $post["categories"][0];
                        $post["post_category"] = $this->GetCategoryName($categories,$cid)["name"];
                        $posts[$key] = $post;
                    }
                    $posts[$key] = $post;
                }
            }
//
            return view("news_api",[
                "posts"=>$posts,
                "categories"=>$categories,
                "current_page" => $this->currentpage,
                "total_page" => $this->totalPage,
                "total_posts" => $this->totalPosts,
            ]);
        }

    }

    function GetPostbyID($id){
        $locale = \App::getLocale();

        if($locale == "en"){
            $api_url = $this -> PostApi_en;
        }else{
            $api_url = $this -> PostApi;
        }
        $url = $api_url.$id;
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url, ['verify' => false]);
            $body = $res->getBody();
            $post = json_decode($body,true);
        }catch(\GuzzleHttp\Exception\ClientException $e){
            $post = false;
//            echo 'Caught response: ' . $e->getResponse()->getStatusCode();
        }


        return $post;
    }

    function news_single_api($locale,$id){

        $categories = $this->GetCategory();
        $post = $this -> GetPostbyID($id);
        $locale = \App::getLocale();

        if(!$post){
            abort(404);
        }
        $post["post_category"] = "";
        $post["post_category_url"] = "#";

        if($categories){
            if( isset($post["categories"][0]) ){
                $cid =  $post["categories"][0];
                $post["post_category"] = $this->GetCategoryName($categories,$cid)["name"];
                $post["post_category_url"] = route("news_api_category",[
                    "locale"=>$locale,
                    "slug" =>  $this->GetCategoryName($categories,$cid)["slug"]
                ]);
            }
        }



        return view("news_api_single",["post"=>$post]);

        echo $res->getStatusCode();
// "200"
        echo $res->getHeader('content-type')[0];
// 'application/json; charset=utf8'
        echo $res->getBody();

    }



}
