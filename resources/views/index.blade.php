@extends("page",[
    'title' => 'Rock the World | Meleap',
    'current'=> 'home'
    ])
@php
$VideoId = "vw4tTF5u0l4";
$mission_bg = URL::asset('images/mission_bg.png');
$locale = \App::getLocale();

$media_logos = [URL::asset('images/logos/media-01.png'),URL::asset('images/logos/media-02.png'),URL::asset('images/logos/media-03.png'),URL::asset('images/logos/media-04.png'),URL::asset('images/logos/media-05.png'),URL::asset('images/logos/media-06.png'),URL::asset('images/logos/media-07.png'),
URL::asset('images/logos/media-08.png'),URL::asset('images/logos/media-09.png'),URL::asset('images/logos/media-10.png'),URL::asset('images/logos/media-11.png'),URL::asset('images/logos/media-12.png'),URL::asset('images/logos/media-13.png'),
URL::asset('images/logos/media-14.png'),URL::asset('images/logos/media-15.png'),URL::asset('images/logos/media-16.png'),URL::asset('images/logos/media-17.png'),URL::asset('images/logos/media-18.png')
];
$award_logos = [URL::asset('images/logos/award-1.png'),URL::asset('images/logos/award-2.png'),URL::asset('images/logos/award-3.png')];
$_products = $products[$locale];

$learn_more = __("general.learn-more");
$learn_more_text = mb_str_split($learn_more);
@endphp
@section("head")

@endsection
@section("content")
    <div id="video" class="d-flex align-items-center">
{{--        <div id="yt-video" class="overlay"></div>--}}
        <div id="yt-video" class="overlay overflow-hidden">
            <video autoplay muted loop playsinline id="myVideo" poster="{{asset("images/cover.png")}}">
                <source src="{{asset("images/video/meleap-top-video.mp4")}}" type="video/mp4">
            </video>
        </div>
        <div class="overlay" style="background-color: rgba(0,0,0,0.3);"></div>
        <div id="IndexSocial">
            @component("components/social-media-list")
            @endcomponent
        </div>
        <grid-bg class="overlay"  :global-alpha="1"  style="background-position: -80px -70px"></grid-bg>

        <div class="container-fluid">
            <div class="head-block-content rellex" data-rellax-speed="1">
                <div class="row">
                    <div class="col-8 offset-4 offset-md-6 col-md-6">
                        <h1 class="in-view" >{!! __("index.hero-message") !!}</h1>
                        <p class="poppins font-weight-bold in-view">{!! __("index.hero-message-small") !!}</p>
                    </div>

                </div>
            </div>
        </div>
        <img src="{{URL::asset("images/rock.svg")}}" class="hero-image rellax" data-rellax-speed="0.5">
        @component("components/scroll-down",[
            "href"=>"#mission",
            "class"=>"d-lg-none"
            ])

        @endcomponent
    </div>
    <div id="mission" class="section align-items-lg-end d-lg-flex" >
{{--        <div class="hollow-title">MISSION MISSION</div>--}}
        <div class="section_title_svg in-view-fadein in-view in-view-once not-fill mt-3 ml-3 d-none d-lg-block">
            <img src="{{ URL::asset('images/mission.svg?') }}">
        </div>

        <div class="mobile-title d-lg-none">
            <h1 class="hollow-title px-3">
                MISSION
            </h1>
            <div class="mission-arrow"><img src="{{asset("/images/mission_arrow.svg")}}"></div>
        </div>
        <div id="mission-image" class="back-img mb-3 mb-lg-0 rellax in-view in-view-fadein-to-top in-view-once" data-rellax-speed="2" style="background-image: url({{$mission_bg}})"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="content-box pb-lg-5">
                        <div class="arrow-box top-left active d-none d-lg-block">
                            <x-line-arrow></x-line-arrow>
                        </div>
                        <h3 class="in-view-fadein-to-top in-view in-view-once">
                            {!! __("index.mission.title") !!}
                        </h3>
                        <div class="divider in-view-fadein-to-top in-view in-view-once" data-delay=".25"></div>
                        <div class="in-view-fadein-to-top in-view in-view-once" data-delay=".5">
                            <p class="text-justify">{!! nl2br(__("index.mission.des")) !!}</p>
                        </div>
                       <div class="btn-container in-view-fadein-to-top in-view in-view-once"  data-delay=".75">
                            <a href="{{route('about',[ "locale"=> $locale ])}}" class="hollow-btn">{!! nl2br(__("index.mission.btn")) !!}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($marquee[$locale]["link"]) && $marquee[$locale]["link"])
        @if(isset($marquee[$locale]["text"]) && $marquee[$locale]["text"])
            <a href="{{$marquee[$locale]["link"]}}">
                <div class='marquee-container'>
                    <div class='marquee in-view in-view-once' data-duration='5000' data-gap='10' data-duplicated='true' >
                        @component('components/LastNews')
                        @endcomponent
                        <span>{{ $marquee[$locale]["text"]  }}</span>
                    </div>
                </div>
            </a>
        @endif
    @else
        @if(isset($marquee[$locale]["text"]) && $marquee[$locale]["text"])

            <div class='marquee-container'>
                <div class='marquee in-view in-view-once' data-duration='5000' data-gap='10' data-duplicated='true' >
                    @component('components/LastNews')
                    @endcomponent
                    <span>{{ $marquee[$locale]["text"]  }}</span>
                </div>
            </div>

        @endif
    @endif

    <div id="what-we-do-and-other" class="position-relative">
{{--        <canvas id="bg-grid" width="1500" height="800">--}}
{{--            Your browser does not support the HTML5 canvas tag.--}}
{{--        </canvas>--}}
        <div id="bg-grid-overlay" class="overlay">
            <canvas class="dots"></canvas>
        </div>
        <div class="section" id="WhatWeDo">
{{--            <div class="hollow-title">WHAT WE DO WHAT WE DO</div>--}}
            <div class="section_title_svg in-view-fadein in-view in-view-once rellax not-fill" data-rellax-speed="1">
                <img src="{{ URL::asset('images/what_we_do.svg?') }}">
            </div>
            <h1 class="hollow-title d-lg-none px-3">
                WHAT WE DO
            </h1>
            <div class="container-fluid position-relative wwd">

                <div class="row">
                    <div class="align-items-lg-center d-none d-lg-block col-lg-1 d-lg-flex order-2">

                        <h3 class="vertical-title left-border nowrap ml-0 position-relative poppins">
                            <div class="arrow-box top-right active d-none d-lg-block">
                                <x-line-arrow></x-line-arrow>
                            </div>
                            WHAT WE DO
                        </h3>
                    </div>

                    <div class="col-12 col-lg-11">
                        <div class="wwd-posts" style="background-image: url('{{ URL::asset('images/wwd-1.png') }}');">
                            <div class="row pb-0 pb-lg-5">
                                <div class="col-lg-4 rellax" data-rellax-speed="3">
                                    <div style="height: 40px" class="d-none d-lg-block"></div>
                                    <div class="wwd-block mb-5 mb-lg-0 in-view-fadein-to-top in-view in-view-once increase no-effect intro" data-delay=".25">
                                        <div class="effect">
                                            <div class="effect-container">
                                            </div>
                                            <h4 class="wwd-title intro">
                                                <span>INTRO <br>OF AR<br>TECHNOLOGY</span>
                                            </h4>
                                            @if($locale== "jp")
                                                <div class="wwd-description intro">
                                                    <p class="wwd-intro-text">"{!! nl2br(__("index.what_we_do.intro")) !!}" </p>
                                                </div>
                                            @endif
																					@if($locale== "en")
																					<div class="wwd-description intro">
                                            <p class="wwd-intro-text">{!! nl2br(__("index.what_we_do.intro")) !!}</p>
																						</div>
                                    @endif
                                        </div>
 
                                    </div>
                                </div>
                                <div class="col-lg-4 rellax" data-rellax-speed="2">
                                    <div style="height: 130px" class="d-none d-lg-block"></div>
                                    <a href="{{__("index.what_we_do.hado.link")}}">
                                        @if($locale== "en")
                                            <div class="in-view-fadein-to-top in-view in-view-once" data-delay=".5">
                                                <div class="description-en poppins" >
                                                    <p>{!! nl2br(__("index.what_we_do.hado")) !!}</p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="wwd-block mb-5 mb-lg-0 in-view-fadein-to-top in-view in-view-once increase"  data-delay=".5">
                                            <div class="effect">
                                                <div class="effect-container">
                                                    <div class="block-image" style="background-image: url('{{ URL::asset('images/wwd-2.png') }}');">
                                                    </div>
                                                    <div class="block-video">
                                                        <video loop autoplay playsinline muted preload="auto">
                                                            <source src="{{asset("images/video/HADO-5s.mp4")}}" type="video/mp4">
                                                        </video>
                                                    </div>
                                                </div>
                                                <h4 class="wwd-title">
                                                    <span>HADO</span>
                                                </h4>
                                                @if($locale== "jp")
                                                    <div class="wwd-description">
                                                        <vword paragraph="{!! nl2br(__("index.what_we_do.hado")) !!}" class="position-relative"></vword>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="readmore">
                                                <span>{{ $learn_more }} →</span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="col-lg-4 mb-5 mb-lg-0 rellax" data-rellax-speed="4">

                                    <a href="{{__("index.what_we_do.xball.link")}}">
                                        @if($locale== "en")
                                            <div class="in-view-fadein-to-top in-view in-view-once" data-delay=".5">
                                                <div class="description-en poppins" >
                                                    <p>{!! nl2br(__("index.what_we_do.xball")) !!}</p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="wwd-block in-view-fadein-to-top in-view in-view-once increase" data-delay=".75">
                                            <div class="effect">
                                                <div class="effect-container">
                                                    <div class="block-image" style="background-image: url('{{ URL::asset('images/wwd-3.png') }}');">
                                                    </div>
                                                    <div class="block-video">
                                                        <video loop autoplay playsinline muted preload="auto">
                                                            <source src="{{asset("images/video/XBALL-7s.mp4")}}" type="video/mp4">
                                                        </video>
                                                    </div>
                                                </div>
                                                <h4 class="wwd-title">
                                                    <span>HADO XBALL</span>
                                                </h4>
                                                @if($locale== "jp")
                                                    <div class="wwd-description">
                                                        <vword paragraph="{!! nl2br(__("index.what_we_do.xball")) !!}" class="position-relative"></vword>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="readmore">
                                                <span>{{ $learn_more }} →</span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="section" id="OtherArContent">

            <div class="section_title_svg">
                <img src="{{ URL::asset('images/other_content.svg?') }}">
            </div>
            <h1 class="hollow-title d-lg-none px-3">
                OTHER AR CONTENT
            </h1>
            <div class="container-fluid d-none d-lg-block">
                <div class="row">
                    <div class="col-md-4">
                        <div class="two-line-title position-relative">
                            <div class="arrow-box right active ">
                                <x-line-arrow></x-line-arrow>
                            </div>
                            <h4 class="poppins mb-0">OTHER AR CONTENTS</h4>
                            <span>PRODUCT</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-4 px-lg-0">
                <div class="d-none d-lg-block" style="height: 80px"></div>
                <div class="owl-carousel-other-content owl-carousel">
                    @php $i=1; @endphp
                    @foreach($_products as $key => $product)

                        <a href="{{$product["permalink"]}}">
                            <div class="item"  data-index="{{$i}}">
                                <div class="overlay" style="background-image: url({{ $product["thumbnail"] }});"></div>
                                <h4 class="poppins">{!! $product["title"] !!}</h4>
                                <div class="poppins description">
                                    <span>{!! $product["subtitle"] !!}</span>
                                    <div>
                                        <div class="learn-more">
                                            @foreach($learn_more_text as $key => $letter)
                                                @if($letter == " " || $letter =="")
                                                    <span>&nbsp;</span>
                                                @else
                                                    <span>{!! $letter !!}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @php $i++; @endphp
                    @endforeach

                </div>
                <div class="text-center poppins d-none d-lg-block">
{{--                    <range-bar max="{{count($products) }}" min="1" step="1" :value="owl_slider" :showing="showing" @change="OwlSliderTo"></range-bar>--}}
                    <range-bar max="{{count($_products) }}" min="1" step="1"  :showing="showing" @change="OwlSliderTo"></range-bar>
                </div>

                <div class="d-lg-none counter">
                   @{{ showing }} / {{count($_products) }}
                </div>


                <div style="height: 90px" class="d-lg-block d-none"></div>
            </div>


        </div>

        <div id="news-grid" >
            <div class="row m-0">
                <div class="col-12 p-0">
            <h1 class="hollow-title d-lg-none px-3">
                NEWS
            </h1>

                        <div class="main-news">
                            <div class="overlay"></div>
                            <div class="news-info">
                                <div class="clearfix">
                                    <div class="float-left">{{ $last_post["date"] }}</div>
                                    <div class="float-right">NEWS</div>
                                </div>
                            </div>
													<img src="{{ $last_post["cover"] }}" class="news-img" />
                            <a href="{{route("news_api",["locale"=>$locale])}}" >
                                <h3 class="poppins @if(mb_strlen($last_post["title"]) > 70) smaller-title @endif">
                                    {!! $last_post["title"] !!}
                                </h3>
                            </a>
                            <a href="{{route("news_api",["locale"=>$locale])}}" >
                                <div class="readmore">Read More</div>
                            </a>
                            <a href="{{route("news_api",["locale"=>$locale])}}" >
                                <div class="news-link pink-yellow-linear">
                                    <img src="{{URL::asset('images/more-news.svg')}}">
                                </div>
                            </a>
                        </div>
                </div>
                <div class="col-12 p-0">
                    <div class="row mx-0 mx-md-0">
                        <div class="col-md-4 p-0">
                            <a href="{!! __("index.news_1_link") !!}" >
                                <div class="normal-news" style="background-image: url({{ URL::asset('images/news-2.png') }})">
                                    <div class="overlay"></div>
                                    <div class="info-info-normal">
                                        <h4 class="poppins">{!! __("index.news_1") !!}</h4>
                                        <p class="poppins">{!! __("index.news_1_des") !!}</p>
                                    </div>
                                    <div class="readmore">Read More</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 p-0">
                            <a href="{!! __("index.news_2_link") !!}" >
                                <div class="normal-news" style="background-image: url({{ URL::asset('images/news-3.png') }})">
                                    <div class="overlay"></div>
                                    <div class="info-info-normal">
                                        <h4 class="poppins">{!! __("index.news_2") !!}</h4>
                                        <p class="poppins">{!! __("index.news_2_des") !!}</p>
                                    </div>
                                    <div class="readmore">Read More</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 p-0">
                            <a href="{!! __("index.news_3_link") !!}" >
                                <div class="normal-news" style="background-image: url({{ URL::asset('images/news-4.png') }})">
                                    <div class="overlay"></div>
                                    <div class="info-info-normal">
                                        <h4 class="poppins">{!! __("index.news_3") !!}</h4>
                                        <p class="poppins">{!! __("index.news_3_des") !!}</p>
                                    </div>
                                    <div class="readmore">Read More</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{route("news_api",["locale"=>$locale])}}" >
                <div class="d-lg-none">
                    <img src="{{URL::asset('images/more-news.jpg')}}" class="w-100">
                </div>
            </a>
{{--            <div class="overlay"></div>--}}
        </div>

    </div>

    <div class="section" id="media_award">
        <div class="overlay"></div>
        <div class="section_title_svg">
            <img src="{{ URL::asset('images/media_awards.svg') }}">
        </div>
        <h1 class="hollow-title d-lg-none px-1">
            MEDIA & AWARDS
        </h1>
        <div class="container-fluid position-relative">
            <div class="media_award-inner">

                <div class="logos">
                    <div class="title-container">
                        <div class="media-title">
                            <h4 class="poppins">{!! __("index.logos.media.title") !!}</h4>
                            <p>
                                {!! __("index.logos.media.description") !!}
                            </p>
                        </div>
                    </div>

                    @foreach($media_logos as $key => $logo)
                        <div class="logo logo-media">
                            <img src="{{$logo}}">
                        </div>
                    @endforeach
                </div>


                <div class="logos">
                    <div class="title-container">
                        <div class="media-title">
                            <h4 class="poppins">{!! __("index.logos.award.title") !!}</h4>
{{--                            <p>--}}
{{--                                We welcome any media inqyiries<br>--}}
{{--                                about live broadcasts or studio recordings.--}}
{{--                            </p>--}}
                        </div>
                    </div>

                    @foreach($award_logos as $key => $logo)
                        <div class="logo logo-award">
                            <img src="{{$logo}}">
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    @if(isset($marquee[$locale]["link"]) && $marquee[$locale]["link"])
        @if(isset($marquee[$locale]["text"]) && $marquee[$locale]["text"])
            <a href="{{$marquee[$locale]["link"]}}">
                <div class='marquee-container purple'>
                    <div class='marquee in-view in-view-once' data-duration='5000' data-gap='10' data-duplicated='true' >
                        @component('components/LastNews')
                        @endcomponent
                        <span>{{ $marquee[$locale]["text"]  }}</span>
                    </div>
                </div>
            </a>
        @endif
    @else
        @if(isset($marquee[$locale]["text"]) && $marquee[$locale]["text"])

                <div class='marquee-container purple'>
                    <div class='marquee in-view in-view-once' data-duration='5000' data-gap='10' data-duplicated='true' >
                        @component('components/LastNews')
                        @endcomponent
                        <span>{{ $marquee[$locale]["text"]  }}</span>
                    </div>
                </div>

        @endif
    @endif

    @component("components/contact_block")
    @endcomponent


@endsection
@section("script")

    <script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js" type="text/javascript"></script>
{{--    <script src="{{URL::asset('src/jQuery.YoutubeBackground.js')}}"></script>--}}

    <script>
        // let mqrqueeSpeed = Math.floor($(window).width() / 1920 * 100);

        let mqrqueeSpeed = 100;
        if($(window).width() < 991 ){
            mqrqueeSpeed = 30;
        }



        $(".marquee").marquee({
            gap:20,
            duplicated:true,
            speed: mqrqueeSpeed,
            scrollSpeed: 9999,  // 滾動速度   ,
            pauseSpeed: 300,  // 滾動完到下一條的間隔時間   ,
            // pauseOnHover: true, // 滑鼠滑向文字時是否停止滾動   ,
            loop: -1 ,    // 設定迴圈滾動次數 （-1為無限迴圈）   ,
            fxEasingShow: "swing" , // 緩衝效果   ,
            fxEasingScroll: "linear", // 緩衝效果   ,
            cssShowing: "marquee-showing" //定義class,
        });

    </script>
    <script>
        function bg_canvas(){
            const patternCanvas =  document.createElement("canvas");
            const patternContext = patternCanvas.getContext('2d');

            // Give the pattern a width and height of 50
            patternCanvas.width = 131;
            patternCanvas.height = 118;

            patternContext.shadowOffsetX = 0;
            patternContext.shadowOffsetY = 0;
            patternContext.shadowBlur = 1;
            patternContext.shadowColor = "#41a5dd";

            patternContext.strokeStyle = "rgba(65, 165, 221,.7);";
            patternContext.lineWidth   = .25;
            patternContext.strokeRect(0,0, patternCanvas.width,patternCanvas.height);


            patternContext.stroke();

            // Create our primary canvas and fill it with the pattern
            // const canvas = document.getElementById("bg-grid");
            const canvas =  document.createElement("canvas");
            const ctx = canvas.getContext('2d');
            const pattern = ctx.createPattern(patternCanvas, 'repeat');
            canvas.width = 1500;
            canvas.height = 800;
            let offsetX = 0;
            let offsetY = 0;
            ctx.fillStyle = pattern;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.stroke();

            // let url = canvas.toDataURL();
            let url = patternCanvas.toDataURL();
            $("#bg-grid-overlay").css("background-image","url("+url+")");

        }
        bg_canvas();
    </script>
    <script>
        function bg_dots(){
            var dotMargin = 25;
            var numRows = 3;
            var numCols = 10;
// Set the colors you want to support in this array
            var colors = ['#6c6c6c'];
            var directions = ['+', '-'];
            var speeds = [0.5, 1, 1.5, 2, 2.5, 3, 3.5];

            var canvas = $('canvas.dots');
            var context = canvas[0].getContext('2d');
            var canvasWidth = canvas.width();
            var canvasHeight = canvas.height(); // this one is new
            canvas.attr({height: canvasHeight, width: canvasWidth});

            var dotWidth = ((canvasWidth - (2 * dotMargin)) / numCols) - dotMargin;
            var dotHeight = ((canvasHeight - (2 * dotMargin)) / numRows) - dotMargin;

            if( dotWidth > dotHeight ) {
                var dotDiameter = dotHeight;
                var xMargin = (canvasWidth - ((2 * dotMargin) + (numCols * dotDiameter))) / numCols;
                var yMargin = dotMargin;
            } else {
                var dotDiameter = dotWidth;
                var xMargin = dotMargin;
                var yMargin = (canvasHeight - ((2 * dotMargin) + (numRows * dotDiameter))) / numRows;
            }

// Start with an empty array of dots.
            var dots = [];

            // var dotRadius = dotDiameter * 0.02;
            var dotRadius = 3;

            for(var i = 0; i < numRows; i++) {
                for(var j = 0; j < numCols; j++) {
                    var x = (j * (dotDiameter + xMargin)) + dotMargin + (xMargin / 2) + dotRadius;
                    var y = (i * (dotDiameter + yMargin)) + dotMargin + (yMargin / 2) + dotRadius;
                    // Get random color, direction and speed.
                    var color = colors[Math.floor(Math.random() * colors.length)];
                    var xMove = directions[Math.floor(Math.random() * directions.length)];
                    var yMove = directions[Math.floor(Math.random() * directions.length)];
                    var speed = speeds[Math.floor(Math.random() * speeds.length)];
                    // Set the object.
                    var dot = {
                        x: x,
                        y: y,
                        radius: dotRadius,
                        xMove: xMove,
                        yMove: yMove,
                        color: color,
                        speed: speed
                    };
                    // Save it to the dots array.
                    dots.push(dot);
                    drawDot(dot);
                }
            }

// Draw each dot in the dots array.
            for( i = 0; i < dots.length; i++ ) {
                drawDot(dots[i]);
            };

            setTimeout(function(){
                window.requestAnimationFrame(moveDot);
            }, 300);


            function moveDot() {
                context.clearRect(0, 0, canvasWidth, canvasHeight)

                for( i = 0; i < dots.length; i++ ) {

                    if( dots[i].xMove == '+' ) {
                        dots[i].x += dots[i].speed;
                    } else {
                        dots[i].x -= dots[i].speed;
                    }
                    if( dots[i].yMove == '+' ) {
                        dots[i].y += dots[i].speed;
                    } else {
                        dots[i].y -= dots[i].speed;
                    }

                    drawDot(dots[i])

                    if( (dots[i].x + dots[i].radius) >= canvasWidth ) {
                        dots[i].xMove = '-';
                    }
                    if( (dots[i].x - dots[i].radius) <= 0 ) {
                        dots[i].xMove = '+';
                    }
                    if( (dots[i].y + dots[i].radius) >= canvasHeight ) {
                        dots[i].yMove = '-';
                    }
                    if( (dots[i].y - dots[i].radius) <= 0 ) {
                        dots[i].yMove = '+';
                    }
                }

                window.requestAnimationFrame(moveDot);
            }

            function drawDot(dot) {
                // Set transparency on the dots.
                context.globalAlpha = 0.9;
                context.beginPath();
                context.arc(dot.x, dot.y, dot.radius, 0, 2 * Math.PI, false);
                context.fillStyle = dot.color;
                context.fill();
            }
        }
        bg_dots();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script>
        // alert($(window).width());
        owl_start = null;
        function FixOwlNav(){



            let offset = $(".owl-item.active").width() /2  + 80;
            let fixer = 0;

            if(use_mobile_style() == true){
                // $(".owl-prev .prev,.owl-next .next").removeAttr("style");
                let fixer = 0;

            }
            if($(window).width() < 1600){
                fixer = 40;
            }else if ($(window).width() < 1920){
                fixer = 50;
            }

            $(".owl-prev .prev").css("margin-left", (-1 * offset + fixer) + "px");
            $(".owl-next .next").css("margin-right", (-1 * offset + fixer) + "px");
        }

        function owlscrollto(index){
            // let goto = Number(index) + Number(owl_start) +1;
            let goto = index - 1 ;
            // console.log(goto);
            owl.trigger('to.owl.carousel',goto );
        }

        owl = $('.owl-carousel-other-content').owlCarousel({
            loop:true,
            stagePadding: 505,
            margin:160,
            nav:true,
            navText:["<div class='prev'></div>","<div class='next'></div>"],
            onChanged:function(event){
                // console.log(event.item);
                setTimeout(function(){
                    app.showing = Number($(".owl-carousel-other-content .owl-item.active .item").data("index"));
                },100)

                // if(event.item.index == owl_start - 1){
                //     app.owl_slider = event.item.count - Number(owl_start) +3;
                //     return;
                // }
                //
                // if(event.item.index % event.item.count == ( event.item.count - 2)){
                //
                //     app.owl_slider = Number(event.item.index) - Number(owl_start) +1;
                // }else{
                //     app.owl_slider = Number(event.item.index) - Number(owl_start) +1;
                // }

            },
            onInitialized:function(event){

                // app.showing = Number($(".owl-carousel-other-content .owl-item.active .item").data("index"));
                // owl_start = event.item.index;

                FixOwlNav();

            },
            onResized:function(event){
                FixOwlNav();
            },
            responsive:{
                0:{
                    stagePadding: 0,
                    margin:10,
                    items:1
                },
                992:{
                    items:1,
                    stagePadding: 200,
                    margin:90,
                },
                1366:{
                    items:1,
                    stagePadding: 220,
                    margin:10,
                },
                1430:{
                    items:1,
                    stagePadding: 260,
                    margin:10,
                },
                1600:{
                    items:1,
                    stagePadding: 400,
                    margin:10,
                },
                1900:{
                    items:1,
                    stagePadding: 450,
                    margin:10,
                }
            }
        })
    </script>
{{--    <script>--}}
{{--        function safarifix(){--}}
{{--            // return;--}}
{{--            setTimeout(function(){--}}
{{--                $(".wwd-block").each(function(){--}}
{{--                    let bw = $(this).width();--}}
{{--                    let cw = $(this).find(".wwd-description").width();--}}
{{--                    $(this).find(".wwd-description").css("left", bw - cw - 50 + 'px');--}}
{{--                })--}}

{{--                console.log("safari fixed");--}}

{{--            },600)--}}
{{--            //--}}
{{--            // setTimeout(function () {--}}
{{--            //     $(".wwd-description").removeAttr("style");--}}
{{--            // },900)--}}


{{--        }--}}


{{--        var ua = navigator.userAgent.toLowerCase();--}}
{{--        if (ua.indexOf('safari') != -1) {--}}
{{--            if (ua.indexOf('chrome') > -1) {--}}

{{--            } else {--}}
{{--                safarifix();--}}
{{--                // $(window).on("load",function(){--}}
{{--                //     safarifix();--}}
{{--                // })--}}
{{--                //--}}
{{--                // $(window).resize(function(){--}}
{{--                //    // setTimeout(safarifix,800);--}}
{{--                //--}}
{{--                // })--}}

{{--            }--}}
{{--        }--}}

{{--    </script>--}}
@endsection
