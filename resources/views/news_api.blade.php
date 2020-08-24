@extends("page",[
    'title' => 'News | MELEAP',
    'current'=> 'news_api'
])
@php
$locale = \App::getLocale();
@endphp
@section("head")

@endsection
@section("content")


    @component("components/head_block",["bg_image"=>URL::asset('images/hb-news.jpg'),"overlay"=>"0.2"])
        <h2>お知らせ</h2>
        <p>お知らせ</p>
    @endcomponent

    <div class="section news-list-section">
        <div  class="container-fluid">
            <div class="news-list px-xl-5">
                <div class="search-bar d-md-flex justify-content-md-between align-items-md-end">
                    <div class="categories">
                        <ul class="poppins">
                            <li><a href="{{route('news_api',["locale"=>$locale])}}">All</a></li>
                            @foreach($categories as $key => $category)
                                @php
                                    $category_link = route("news_api_category",["locale"=>$locale,"slug"=>$category["slug"]]);
                                @endphp
                                <li><a href="{{$category_link}}">{{$category["name"]}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="search-form poppins">
                        <form action="#">
                            <div class="search-form-container">
                                <input type="text"  placeholder="Search" />
                                <button class="icon"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="news-list-container">
                    <div class="row">
                        @foreach($posts as $key => $post)
                            @php
                                $single = $post;
                                $thumbnail = "";
                                $size = "medium";
                                if(isset($single["better_featured_image"])){
                                    if(isset($single["better_featured_image"]["source_url"]) && $single["better_featured_image"]["source_url"]){
                                        $thumbnail = $single["better_featured_image"]["source_url"];
                                    }
                                    if(isset($single["better_featured_image"]["media_details"]["sizes"][$size]["source_url"])){
                                        $thumbnail = $single["better_featured_image"]["media_details"]["sizes"][$size]["source_url"];
                                    }
                                }
                                $single["thumbnail"] = $thumbnail;
                                $single["date"] = date( "Y/m/d" , strtotime($post["date"]) ) ;
                                $single["post_category"] = ["News","Activity","Others"][rand(0,2)];
                                $single["title"] = $post["title"]["rendered"];
                                $single["permalink"] = $post["link"];
                                $single["permalink"] = route("news_single_api",["locale"=>$locale,"id"=>$post["id"]]);
                            @endphp
                            <div class="col-lg-6 col-xl-4">

                                <article class="news-block">
                                    <header class="d-flex justify-content-between px-3 py-2">
                                        <div class="date">{{ $single["date"] }}</div>
                                        <div class="category"><a href="#">{{ $single["post_category"] }}</a></div>
                                    </header>
                                    <a href="{{$single["permalink"] }}">
                                        <div class="thumbnail" style="background-image: url({{$single["thumbnail"]}})"></div>
                                    </a>
                                    <footer>
                                        <a href="{{$single["permalink"] }}">
                                            <h3 class="mt-3 mb-1">{!! $single["title"] !!}</h3>
                                        </a>
                                        <div class="text-right">
                                            <a href="{{$single["permalink"] }}" class="readmore poppins font-weight-bold font-italic mr-1">
                                                Readmore
                                            </a>
                                        </div>
                                    </footer>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center">
                   @component("components/pagination",[
                        "route_name" => \Request::route()->getName(),
                        "parameters" => \Route::current()->parameters(),
                        "current_page" => $current_page,
                        "total_page" => $total_page,
                        "total_posts" => $total_posts,
                        "offset"=>2
                    ])
                   @endcomponent
                </div>

            </div>
        </div>
    </div>


    @component("components/contact_block")
    @endcomponent

@endsection
@section("script")
@endsection
