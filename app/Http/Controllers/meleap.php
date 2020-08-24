<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class meleap extends Controller
{
    public $default = [];
    public $products = [];
    public $currentpage = 1;
    public $totalPage = false;
    public $totalPosts = false;
    public $default_avatar = "https://apimeleap.it-monk.com/wp-content/uploads/2020/08/下載-1.jpg";
    public $IndexPageApi = "https://apimeleap.it-monk.com/wp-json/wp/v2/pages/107";
    public $SettingsApi = "https://apimeleap.it-monk.com/wp-json/wp/v2/pages?slug=settings&per_page=1";
    public $CategoryApi = "https://apimeleap.it-monk.com/wp-json/wp/v2/categories/?hide_empty=true";
//    public $CategoryApi = "https://hado-official.com/en/wp-json/wp/v2/categories";
    public $PostApi = "https://apimeleap.it-monk.com/wp-json/wp/v2/posts/";
    public $ProductsApi = "https://apimeleap.it-monk.com/wp-json/wp/v2/product";

    public $PostApi_en = "https://hado-official.com/en/wp-json/wp/v2/posts/";
    public $CategoryApi_en = "https://hado-official.com/en/wp-json/wp/v2/categories/?hide_empty=true";
    public $PageSettingsStatic = false;
    public $postApiSetting = [
        "per_page" => 9,
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

        $social_media = [
            "facebook"=>"https://www.facebook.com/HADOinfo/",
            "youtube"=>"https://www.youtube.com/channel/UC2alHTyXjiwe_aRFWq3N-Hw",
            "twitter"=> "https://twitter.com/hado_info"
        ];



        $this->products = $this->ProductsGetter();
        $PageSettingsStatic = $this->PageSettings();



        view()->share('localeLink', $localeLink);
        view()->share('locale', $locale);
        view()->share('products', $this->products);
        view()->share('route_name', $route_name );
        view()->share('social_media', $social_media );
        view()->share('page_setting', $PageSettingsStatic );
    }

    function MailTest(){

        $to = "Dean Huang <hcd@mojopot.com>,hcd@hcd-design-studio.com";
        $subject = "TEST here";
        $message = view('emails.template-1');
        $headers = 'From: ' . "IT-MONK <noreply@it-monk.com>" . "\r\n" .
            'Reply-To: ' . "hcd@mojopot.com" . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $status = mail($to,$subject,$message,$headers);
//        $status = Mail::send('emails.template-1', [], function ($message) {
//            $message->from('system@it-monk.com', 'some-test');
//            $message->to('hcd@mojopot.com');
////            $message->cc('bar@example.com', $name = null);
//        });

        dd($status);
        return "mailtest";
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
            $_products_JP[$slug] = [
                "slug"=>$slug,
                "title"=>$title["rendered"],
                "subtitle"=>$subtitle,
                "logo"=>$logo,
                "cover"=>$cover,
                "thumbnail"=>$thumbnail,
                "main_pic"=>$main_pic,
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

            $endpoint = "https://apimeleap.it-monk.com/wp-json/wp/v2/team_member";
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
//        dd($categories);
//        dd($posts);


        return view("news_api",[
            "posts"=>$posts,
            "categories"=>$categories,
            "current_page" => $this->currentpage,
            "total_page" => $this->totalPage,
            "total_posts" => $this->totalPosts,
        ]);


        echo $res->getStatusCode();
// "200"
        echo $res->getHeader('content-type')[0];
// 'application/json; charset=utf8'
        echo $res->getBody();

    }

    function news_api_category($locale,$slug=null){

        if($slug == null){
            abort('404');
        }

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

    function news_single($slug){

        $data = [];
        $data["title"] = "HADO WORLD CUP 2019<br>フォトギャラリー公開！";
        $data["permalink"] = "#";
        $data["slug"] = "ok";
        $data["cover"] = url("images/news-1.png");
        $data["category"] = "Activity";
        $data["date_y"] = "2020";
        $data["date_m"] = "06";
        $data["date_d"] = "06";

        $data["content"] = [
            [
                "type"=>"image",
                "image"=>url("images/news-3.png"),
                "content"=>"
                    <h2>meleap公式アルバム利用ガイドラインについて</h2>
                    <blockquote>2019年12月15日(土)に開催された「HADO WORLD CUP 2019」<br>のステージ上での熱戦や、舞台裏の様子などを写したフォトギャラリーを公開いたします。9つの国と地域の代表16チームが世界一をかけて繰り広げた熱戦の貴重な瞬間を切り取った写真をぜひご覧ください！</blockquote>
                    <p>meleapは当社が創造するコンテンツに対して、お客様が情熱をもってその体験が広く共有されることを推奨・応援したいと考えております。その中で、本ガイドラインは、個人であるお客様を対象に、meleap公式アルバムで公開されたメディアを活用するにあたっての オフィシャルガイドラインとして作成されたものです。個人であるお客様が、meleap公式アルバム内で meleap が著作権を有する映像、写真およびスクリーンショット（以下「meleapの著作物」といいます）を利用した動画や静止画等を、適切な共有サイトに投稿する際は、このガイドラインに従っていただく必要がありますのでご注意ください。</p>

                "
            ],
            [
                "type"=>"video",
                "youtube_id"=>"TjbtH_MxDQI",
                "content"=>"
                    <h3>2019年12月15日(土)に開催された<br>
「HADO WORLD CUP 2019」のステージ上での熱戦や、<br>
舞台裏の様子などを写したフォトギャラリーを公開いたします。</h3>
                    <p>人であるお客様は、meleap公式アルバム内のmeleapの著作物を利用した動
画や静止画等を、営利を目的としない場合に限り、投稿することができます。
個人であるお客様は、meleap公式アルバムで公開されたmeleapの著作物を、
投稿に利用することができます。<br>
meleapは、違法または不適切な投稿や公序良俗に反する投稿、このガイドライ
ンに従わない投稿に対して、法的措置を講じる権利を保持しています。
meleapは、このガイドラインに関する個別のお問い合わせにはお答えいたしま
せん。ご了承ください。<br>
※このガイドラインは、随時更新されますので、投稿前に必ず最新のガイドライ
ンをご確認いただきますようお願いいたします。</p>
              "
            ],
            [
                "type"=>"text",
                "content"=>"
                    <p>2019年12月15日(土)に開催された「HADO WORLD CUP 2019」<br>のステージ上での熱戦や、舞台裏の様子などを写したフォトギャラリーを公開いたします。9つの国と地域の代表16チームが世界一をかけて繰り広げた熱戦の貴重な瞬間を切り取った写真をぜひご覧ください！</p>

                "
            ],
            [
                "type"=>"image",
                "image"=>url("images/soccer.jpg"),
                "content"=>"
                    <p>2019年12月15日(土)に開催された「HADO WORLD CUP 2019」<br>のステージ上での熱戦や、舞台裏の様子などを写したフォトギャラリーを公開いたします。9つの国と地域の代表16チームが世界一をかけて繰り広げた熱戦の貴重な瞬間を切り取った写真をぜひご覧ください！</p>
                    <p>※ビジネスでのメディア利用に関しては別途お<br>
                    問い合わせフォーム( <a href='https://meleap.com/contact2/'>https://meleap.com/contact2/</a> )
                    </p>
              "
            ],
            [
                "type"=>"text",
                "content"=>"
                    <p>2019年12月15日(土)に開催された「HADO WORLD CUP 2019」<br>のステージ上での熱戦や、舞台裏の様子などを写したフォトギャラリーを公開いたします。9つの国と地域の代表16チームが世界一をかけて繰り広げた熱戦の貴重な瞬間を切り取った写真をぜひご覧ください！</p>

                    <p>meleapは当社が創造するコンテンツに対して、お客様が情熱をもってその体験が広く共有されることを推奨・応援したいと考えております。その中で、本ガイドラインは、個人であるお客様を対象に、meleap公式アルバムで公開されたメディアを活用するにあたっての オフィシャルガイドラインとして作成されたものです。個人であるお客様が、meleap公式アルバム内で meleap が著作権を有する映像、写真およびスクリーンショット（以下「meleapの著作物」といいます）を利用した動画や静止画等を、適切な共有サイトに投稿する際は、このガイドラインに従っていただく必要がありますのでご注意ください。</p>
              "
            ],

        ];

        $data["next_post_link"] = route("news-single",["slug"=>"next"]);
        $data["next_post_title"] = "森渉さんのゲスト出演が決定！その他出演者情報発表！";
        $data["next_post_date"] = "2020.06.04";
        $data["prev_post_link"] = route("news-single",["slug"=>"prev"]);
        $data["prev_post_title"] = "CLIMAX SEASON 2019 大会エントリー開始！";
        $data["prev_post_date"] = "2020.06.08";

        return view("news_single",$data);

    }

    function test(){
        return view("test");
    }
}
