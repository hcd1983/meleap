@php
$favico = URL::asset('images/favico_color.png');
$logo = URL::asset('images/svg_color_header.png');
$FooterLogo = URL::asset('images/footer-logo.png');
$CopyRight = "≪ meleap inc. ≫. All right reserved.";
$content_link = URL::asset('/contact/');
$locale = \App::getLocale();
//$current = "home";
$nav = [];
$nav["home"] = ["text"=>"home","url"=>route('home', ["locale"=> $locale] )];
$nav["about"] = ["text"=>"about","url"=> route('about', ["locale"=> $locale] )];
$nav["product"] = ["text"=>"product","url"=> "javascript:void(0)"];
//$nav["news"] = ["text"=>"news","url"=> route('news', ["locale"=> $locale] )];
$nav["news_api"] = ["text"=>"news","url"=> route('news_api', ["locale"=> $locale] )];
//$nav["joinus"] = ["text"=>"join us","url"=>"#"];
$nav["contact"] = ["text"=>"contact","url"=> route('contact', ["locale"=> $locale] )];

$homeurl = route('home', ["locale"=> $locale]);
$products = $products[$locale];

$social_image_default = "";
$social_title_default = "";
$social_description_default = "";

if(isset($page_setting["acf"])){

    $_settings = $page_setting["acf"];

    $social_image_default = isset($_settings["social_media_image"]) ? $_settings["social_media_image"] : "";
    $social_title_default = isset($_settings["social_media_title"]) ? $_settings["social_media_title"] : "";
    $social_description_default = isset($_settings["social_media_description"]) ? $_settings["social_media_description"] : "";

    if($locale == "en"){
        $social_image_default = isset($_settings["social_media_image_en"]) &&  $_settings["social_media_image_en"]? $_settings["social_media_image_en"] : $social_image_default;
        $social_title_default = isset($_settings["social_media_title_en"]) &&  $_settings["social_media_title_en"] ? $_settings["social_media_title_en"] : $social_title_default;
        $social_description_default = isset($_settings["social_media_description_en"]) &&  $_settings["social_media_description_en"] ? $_settings["social_media_description_en"] : $social_description_default;
    }

}else{
    $_settings = [];
}



@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="lang-{{$locale}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="{{$title}}">
    <meta name="keywords" content="HADO, HadoBall, Meleap, AR">
    <meta name="author" content="Mounts Studio">

    <meta property="og:title" content="{{$social_title ?? $social_title_default}}">
    <meta property="og:description" content="{{$social_description ?? $social_description_default}}">
    <meta property="og:image" content="{{$social_image ?? $social_image_default}}">
    <meta property="og:url" content="{{url()->current()}}">

    <meta name="twitter:title" content="{{$social_title ?? $social_title_default}}">
    <meta name="twitter:description"content="{{$social_description ?? $social_description_default}}">
    <meta name="twitter:image" content="{{$social_image ?? $social_image_default}}">
    <meta name="twitter:card" content="summary_large_image">

    {{--FAVICON--}}
    <link rel=icon href="{{$favico}}" sizes="16x16" type="image/png">
    <link rel=icon href="{{$favico}}" sizes="32x32 48x48" type="image/vnd.microsoft.icon">
    <link rel=icon href="{{$favico}}" sizes="128x128 512x512 8192x8192 32768x32768">
    <link rel=icon href="{{$favico}}" sizes="57x57" type="image/png">
    <link rel=icon href="{{$favico}}" sizes="any" type="image/svg+xml">

    <title>{{$title}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,600&display=swap" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('css/app.css?ver='.time())}}" rel="stylesheet">

    @yield("head")
</head>
<body id="top" class="{{$route_name}}-page">
<div id="wrap">
    <div id="header" class="header">
        <nav class="navbar navbar-expand-lg poppins">
            <a href="{{$homeurl}}" class="logo navbar-brand" id="logo"><img  class="img-fluid" src="{{$logo}}"></a>
            <div class="bugger-icon menu-trigger"></div>
            <div class="cross-icon menu-off"></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach($nav as $key => $li)
                        <li class="nav-item {{ $key == $current ? "active":"" }}">
                            <a class="nav-link" href="{{$li["url"]}}">{{ __($li["text"]) }}</a>
                            @if($key=="product")
                                <ul>
                                    <li><a href="{{ __("index.what_we_do.hado.link") }}">HADO</a></li>
                                    <li><a href="https://meleap.com/xball/about/">HADO XBALL</a></li>
                                    @foreach($products as $key => $product)
                                        <li><a href="{{$product["permalink"]}}">{{ __($product["title"]) }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
                <div class="right-nav">
                    <div class="locale-switcher">
                        <ul>
                            <li class="{{ $locale == "jp" ? "current":"" }}"><a href="{{$localeLink["jp"]}}">JP</a></li>
                            <li class="{{ $locale == "en" ? "current":"" }}"><a href="{{$localeLink["en"]}}">EN</a></li>
                        </ul>
                    </div>
                    <top-search-block action="#"></top-search-block>
                </div>
            </div>

            <div id="nav-bottom-bar">
                <div class="active-bar"></div>
            </div>

        </nav>
    </div>

    @yield("content")

    @component("components/footer-social-only",[
        "FooterLogo" => $FooterLogo,
        "CopyRight" => $CopyRight,
        "homeurl" => $homeurl
        ])
    @endcomponent
</div>

<script src="{{URL::asset('js/app.js?ver=').time()}}"></script>
{{--<script src="{{URL::asset('js/jquery.nicescroll.min.js')}}"></script>--}}

<link rel="stylesheet" href="https://apimeleap.it-monk.com/wp-includes/css/dist/block-library/style.min.css?ver=5.4.2"></link>
<script>
    $(".scroll-to").click(function(e) {
        e.preventDefault();
        let target = $(this).attr("href");
        $('html,body').animate({
                scrollTop: $(target).offset().top},
            'fast');

    });


</script>

<script>
    function use_mobile_style(){
        if($(window).width() < 992){
            return true;
        }else{
            return false;
        }
    }
    function barGoactive(){
        if(use_mobile_style() == true){
            return;
        }
        let active = "#navbarSupportedContent ul.navbar-nav >li.active";
        let wid = $(active).width();
        let left = $(active).offset().left;
        $("#nav-bottom-bar .active-bar").width(wid);
        $("#nav-bottom-bar .active-bar").css({
            "left": left + "px"
        });

    }

    function barGoPosition(wid,left){
        if(use_mobile_style() == true){
            return;
        }
        $("#nav-bottom-bar .active-bar").width(wid);
        $("#nav-bottom-bar .active-bar").css({
            "left": left + "px"
        });
    }


    $("#navbarSupportedContent ul.navbar-nav >li").hover(function(){

        if(use_mobile_style() == true){
            return;
        }

        let wid = $(this).width();
        let left = $(this).offset().left;
        barGoPosition(wid,left)
    },function(){
        barGoactive();
    });

    $(window).resize(function (){
        barGoactive();
    })

    $(window).on("load", function (e) {

        if(use_mobile_style() == true){
            return;
        }

        $("#nav-bottom-bar").css("opacity","1");
        $(window).scroll();

        // $("body").niceScroll();

    });

    let lastScrollTop = 0;
    $(window).scroll(function(){

        if(use_mobile_style() == true){
            return;
        }

        if($(window).scrollTop() > 60){
            $("#header").addClass("not-on-top");
        }else{
            $("#header").removeClass("not-on-top");
        }

        var st = $(this).scrollTop();
        if (st > lastScrollTop){
            // downscroll code
            $("#header").addClass("scroll-hide");
        } else {
            // upscroll code
            $("#header").removeClass("scroll-hide");
        }

        lastScrollTop = st;

        barGoactive();
    })

</script>

<script>
    if(use_mobile_style() == false){
        var rellax = new Rellax('.rellax', {
            center: true
        });
    }

</script>

<script>
    function InViewActive(){
        inView.offset(100);
        let basicInView = inView('.in-view')
            .on('enter', function(el){


                if($(el).hasClass("in-view-once") && $(el).hasClass("in-view-in")){
                    return;
                }
                $(el).removeClass("in-view-exit");
                $(el).removeClass("in-view-in");
                $(el).addClass("in-view-in");
                if(typeof $(el).data("delay") != "undefined"){
                    $(el).css("transition-delay",$(el).data("delay") + "s");
                }
            })
            .on('exit', function(el) {

                if($(el).hasClass("in-view-once")){

                }else{
                    $(el).removeClass("in-view-exit");
                    $(el).removeClass("in-view-in");
                    $(el).addClass("in-view-exit");
                }

            });
    }

    function InViewActiveMobile(){
        $('.in-view').addClass("in-view-in");
    }

</script>

<script>
    if(use_mobile_style() == true){
        $(".bugger-icon.menu-trigger").click(function(){
            $("#header").addClass("mobile-active");
        })
        $(".cross-icon.menu-off").click(function(){
            $("#header").removeClass("mobile-active");
        })

        $(".nav-item").click(function(){

            if($(this).hasClass("moblie-nav-show")){
                $(this).removeClass("moblie-nav-show")
                return;
            }

            $(".nav-item").removeClass("moblie-nav-show");


            if( $(this).find("ul").length > 0){
                $(this).addClass("moblie-nav-show");
            }

        })

        // InViewActiveMobile();
        InViewActive();
    }else{

        InViewActive();
    }


</script>

@yield("script")
</body>
</html>
