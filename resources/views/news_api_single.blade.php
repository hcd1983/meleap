@extends("page",[
    'title' => $title.' | MELEAP',
    'current'=> 'news_api',
    'social_title' => $post["title"]["rendered"].' | MELEAP',
    'social_image' => $thumbnail,
    'social_description'=>strip_tags($post["excerpt"]["rendered"]),
])
@php
    $locale = \App::getLocale();
    $current_url = url() -> current();
    $single = $post;
    $thumbnail = "";
    $size = "large";
    if(isset($single["better_featured_image"])){
       if(isset($single["better_featured_image"]["source_url"]) && $single["better_featured_image"]["source_url"]){
           $thumbnail = $single["better_featured_image"]["source_url"];
       }
      // if(isset($single["better_featured_image"]["media_details"]["sizes"][$size]["source_url"])){
      //     $thumbnail = $single["better_featured_image"]["media_details"]["sizes"][$size]["source_url"];
      // }
    }


   $title = $post["title"]["rendered"];
   $date = new DateTime($post["date"]);

   $cover =  $thumbnail;
   $date_y = $date->format('Y');
   $date_m = $date->format('m');
   $date_d = $date->format('d');

   if($single["prev_post"]){
        $prev_post_link = route("news_single_api",["locale" => $locale,"id"=>$single["prev_post"]["id"] ]);
        $prev_post_title = $single["prev_post"]["title"];
        $prev_post_date = $single["prev_post"]["date"];
   }

   if($single["next_post"]){
        $next_post_link = route("news_single_api",["locale" => $locale,"id"=>$single["next_post"]["id"] ]);
        $next_post_title = $single["next_post"]["title"];
        $next_post_date = $single["next_post"]["date"];
   }



@endphp
@section("head")

@endsection
@section("content")


    @component("components/head_block",["bg_image"=>$cover,"overlay"=>"0.2","class"=>"post-cover"])
{{--        <h2>お問い合わせ</h2>--}}
{{--        <p>お問い合わせはこちらから</p>--}}
    @endcomponent

    <div class="section news-single-section">
        <div  class="container">
            <div class="news-single px-xl-5">
                <div class="title-bar">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>{!! $title !!}</h2>
                        </div>
                        <div class="col-lg-12 justify-content-end align-items-end d-none d-lg-flex">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{$current_url}}" target="_blank"><div class="icon-ball mr-2"><i class="fab fa-facebook-square"></i></div></a>
                            <a href="https://twitter.com/intent/tweet/?text={{urlencode($title)}}&url={{$current_url}}" target="_blank"><div class="icon-ball"><i class="fab fa-twitter"></i></div></a>
                        </div>
                    </div>
                </div>
                <article>
                    <header class="d-flex justify-content-between">
                        <div class="date poppins">
                            <div class="d-none d-lg-block">
                                <div class="year">{{$date_y}}</div>
                                <div class="day">{{$date_m}} / {{$date_d}}</div>
                            </div>
                            <div class="d-lg-none">
                                {{$date_y}}/{{$date_m}}/{{$date_d}}
                            </div>
                        </div>
                        <div class="post-breadcrumb d-flex justify-content-end align-items-end ">
                          <a href="{{route("news_api",["locale"=>$locale])}}" class="mr-3 d-none d-lg-block">Top</a>
                          <a href="javascript:void(0)" class="mr-3 d-none d-lg-block"><img src="{{URL::asset("images/bread_crumb_arrow.svg")}}"></a>
                          <a href="{{$single["post_category_url"]}}">{{$single["post_category"]}}</a>
                        </div>
                    </header>
                    <div class="article-content">
                       {!! $post["content"]["rendered"] !!}
                    </div>
                </article>
                <div class="back-link-mobile d-lg-none">
                    <a href="javascript:void(0)" onclick="window.history.back()">BACK</a>
                </div>
                <div class="article-nav poppins">
                    <a class="back-link d-none d-lg-block" href="javascript:void(0)" onclick="window.history.back()">BACK</a>
                    <div class="row">
                        <div class="col-6 prev px-lg-5 py-md-5">
                            @if($single["prev_post"])
                            <a href="{{$prev_post_link}}" class="text-decoration-none">
                                <img src="{{URL::asset("images/post-prev.svg")}}">
                                <div class="ml-3 ml-lg-5 d-none d-lg-block">
                                    {!! $prev_post_title !!}
                                    <span>{{$prev_post_date}}</span>
                                </div>
                                <div class="ml-3 ml-lg-5 page-footer-nav d-lg-none">
                                    <div>perv</div>
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="col-6 next px-lg-5 py-md-5">
                            @if($single["next_post"])
                            <a  href="{{$next_post_link}}" class="justify-content-end">
                                <div class="mr-3 mr-lg-5 d-none d-lg-block">
                                    {!! $next_post_title !!}
                                    <span>{{$next_post_date}}</span>
                                </div>
                                <div class="mr-3 mr-lg-5 page-footer-nav d-lg-none">
                                    <div>next</div>
                                </div>
                                <img src="{{URL::asset("images/post-next.svg")}}">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @component("components/contact_block")
    @endcomponent

@endsection
@section("script")
    <script>

        $("figure").each(function(i){
            if($(this).find("iframe").length >0){
                var url = $(this).find("iframe").attr("src");
                var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
                var match = url.match(regExp);
                if (match && match[2].length == 11) {
                    $(this).addClass("video-container");
                }
            }
        })
    </script>
@endsection
