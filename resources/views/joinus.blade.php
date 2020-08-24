@extends("page",['title' => 'MELEAP'])
@php
$VideoId = "JAY7rbO7RD4";
$mission_bg = URL::asset('images/mission_bg.png');

$media_logos = [URL::asset('images/logos/media-01.png'),URL::asset('images/logos/media-02.png'),URL::asset('images/logos/media-03.png'),URL::asset('images/logos/media-04.png'),URL::asset('images/logos/media-05.png'),URL::asset('images/logos/media-06.png'),URL::asset('images/logos/media-07.png'),
URL::asset('images/logos/media-08.png'),URL::asset('images/logos/media-09.png'),URL::asset('images/logos/media-10.png'),URL::asset('images/logos/media-11.png'),URL::asset('images/logos/media-12.png'),URL::asset('images/logos/media-13.png'),
URL::asset('images/logos/media-14.png'),URL::asset('images/logos/media-15.png'),URL::asset('images/logos/media-16.png'),URL::asset('images/logos/media-17.png'),URL::asset('images/logos/media-18.png')
];
$award_logos = [URL::asset('images/logos/award-1.png'),URL::asset('images/logos/award-2.png'),URL::asset('images/logos/award-3.png')];
@endphp
@section("head")

@endsection
@section("content")
    <div id="video">

        <div class="overlay"></div>
        <div id="IndexSocial">
            <ul>
                <li><a href="#"><div class="icon-ball"><i class="fab fa-facebook-square"></i></div></a></li>
                <li><a href="#"><div class="icon-ball"><i class="fab fa-youtube"></i></div></a></li>
                <li><a href="#"><div class="icon-ball"><i class="fab fa-twitter"></i></div></a></li>
                <li><a href="#"><div class="icon-ball"><i class="fab fa-instagram"></i></div></a></li>

            </ul>
        </div>
    </div>
    <div class="section" id="mission">
        <div class="hollow-title">MISSION MISSION</div>
        <div class="back-img mb-3 mb-lg-0" style="background-image: url({{$mission_bg}})"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="content-box">
                        <div class="arrow-box top-left active d-none d-lg-block">
                            <x-line-arrow></x-line-arrow>
                        </div>
                        <h3>私たちはテクノスポーツで、<br>
                            新たなスポーツの歴史を創り出す。
                        </h3>
                        <div class="divider"></div>
                        <p class="text-justify">スポーツには人の心を動かす力がある。<br>
                            私たちはテクノロジーでスポーツの競技システム・観戦スタイルを革新し、その力を加速させる。<br>
                            観戦者も「自分ゴト」となり、ヒザがガクガク震えるほどの感動を得る。平凡な毎日が一変し、未来を生きる希望が生まれる。自分もやってやろう!と力がみなぎる。世界中の子供たちもテクノスポーツをきっかけに夢を持ち、魂を躍動させる。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='marquee-container'>
        <div class='marquee' data-duration='5000' data-gap='10' data-duplicated='true' >
            @component('components/LastNews')
            @endcomponent
            <span>2019年度年末年始休業のお知らせ株式会社ONは下記の期間を年末年始休業日と2019年12月28日（土）...</span>
        </div>
    </div>
    <div id="what-we-do-and-other" class="position-relative">
{{--        <canvas id="bg-grid" width="1500" height="800">--}}
{{--            Your browser does not support the HTML5 canvas tag.--}}
{{--        </canvas>--}}
        <div class="overlay" id="bg-grid-overlay">
            <canvas class="dots"></canvas>
        </div>
        <div class="section" id="WhatWeDo">
            <div class="hollow-title">WHAT WE DO WHAT WE DO</div>
            <div class="container-fluid position-relative">
                <div class="arrow-box top-right active d-none d-lg-block position-relative">
                    <x-line-arrow></x-line-arrow>
                </div>
                <div>
                    <h3 class="title-rotate-90 position-absolute">WHAT WE DO</h3>
                    <div class="wwd-posts">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="wwd-block">
                                    <div class="block-image" style="background-image: url('{{ URL::asset('images/wwd-1.png') }}');">
                                    </div>
                                    <h4 class="wwd-title">
                                        <span>INTRO <br>OF AR<br>TECHNOLOGY</span>
                                    </h4>
                                    <div class="wwd-description">
                                        <vword paragraph="頭にヘッドマウントディスプレイ、 腕にはアームセンサーを装着。 AR技術により、子どもの頃に誰もが憧れた 魔法の世界を圧倒的な臨場感で実現します。"></vword>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wwd-block">
                                    <div class="block-image" style="background-image: url('{{ URL::asset('images/wwd-2.png') }}');">
                                    </div>
                                    <h4 class="wwd-title">
                                        <span>HADO</span>
                                    </h4>
                                    <div class="wwd-description">
                                        <vword paragraph="頭にヘッドマウントディスプレイ、 腕にはアームセンサーを装着。 AR技術により、子どもの頃に誰もが憧れた 魔法の世界を圧倒的な臨場感で実現します。"></vword>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wwd-block">
                                    <div class="block-image" style="background-image: url('{{ URL::asset('images/wwd-3.png') }}');">
                                    </div>
                                    <h4 class="wwd-title">
                                        <span>HADO XBALL</span>
                                    </h4>
                                    <div class="wwd-description">
                                        <vword paragraph="頭にヘッドマウントディスプレイ、 腕にはアームセンサーを装着。 AR技術により、子どもの頃に誰もが憧れた 魔法の世界を圧倒的な臨場感で実現します。"></vword>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="section" id="OtherArContent">

            <div class="hollow-title">OTHER AR CONTENT</div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="two-line-title">
                            <h4 class="poppins mb-0">OTHER AR CONTENTS</h4>
                            <span>PRODUCT</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div style="height: 80px"></div>
                <div class="owl-carousel-other-content owl-carousel">


                    <div class="item" style="background-image: url({{ URL::asset('images/oc_1.png') }});">
                        <h4 class="poppins">HADO SHOOT!</h4>
                    </div>
                    <div class="item" style="background-image: url({{ URL::asset('images/oc_2.png') }});">
                        <h4 class="poppins">Some title here</h4>
                    </div>

                    <div class="item" style="background-image: url({{ URL::asset('images/mission_bg.png') }});">
                        <h4 class="poppins">Some title there</h4>
                    </div>
                    <div class="item" style="background-image: url({{ URL::asset('images/wwd-2.png') }});">
                        <h4 class="poppins">Some title other</h4>
                    </div>
                    <div class="item" style="background-image: url({{ URL::asset('images/oc_3.png') }});">
                        <h4 class="poppins">HADO MONSTER BATTLE</h4>
                    </div>

                </div>
                <div style="height: 90px"></div>
            </div>


        </div>

        <div id="news-grid" >
            <div class="row m-0">
                <div class="col-lg-7 p-0">

                        <div class="main-news" style="background-image: url({{ URL::asset('images/news-1.png') }})">
                            <div class="news-info">
                                <div class="clearfix">
                                    <div class="float-left">2020/02/04</div>
                                    <div class="float-right">NEWS</div>
                                </div>
                            </div>
                            <h3 class="poppins"><strong>CLIMAX SEASON 2019</strong>大会エントリー開始！</h3>
                            <a href="#" >
                                <div class="readmore">Read More</div>
                            </a>
                            <a href="#" >
                                <img class="news-link" src="{{URL::asset('images/newlink.png')}}">
                            </a>

                        </div>
                </div>
                <div class="col-lg-5 p-0">
                    <a href="#" >
                        <div class="normal-news" style="background-image: url({{ URL::asset('images/news-2.png') }})">
                            <div class="info-info-normal">
                                <h4 class="poppins">HADO XBALL</h4>
                                <p class="poppins">ARスポーツプロリーグ始動:<br>
                                    次世代のスターとなるプレイヤー求む
                                </p>
                            </div>
                            <div class="readmore">Read More</div>
                        </div>
                    </a>

                    <a href="#" >
                        <div class="normal-news" style="background-image: url({{ URL::asset('images/news-3.png') }})">
                            <div class="info-info-normal">
                                <h4 class="poppins">HADO ACADEMY</h4>
                                <p class="poppins">
                                    未来型スポーツスクール開講中！
                                </p>
                            </div>
                            <div class="readmore">Read More</div>
                        </div>
                    </a>
                    <a href="#" >
                        <div class="normal-news" style="background-image: url({{ URL::asset('images/news-4.png') }})">
                            <div class="info-info-normal">
                                <h4 class="poppins">HADO Connect</h4>
                                <p class="poppins">
                                    試合結果を分析して勝利をつかめ。
                                </p>
                            </div>
                            <div class="readmore">Read More</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="overlay"></div>
        </div>

    </div>

    <div class="section" id="media_award">
        <div class="overlay"></div>
        <div class="section_title_svg">
            <img src="{{ URL::asset('images/media_awards.svg') }}">
        </div>
        <div class="container-fluid position-relative">
            <div class="media_award-inner">
                <div class="media-title">
                    <h4 class="poppins">Media</h4>
                    <p>
                        We welcome any media inqyiries<br>
                        about live broadcasts or studio recordings.
                    </p>
                </div>
                <div class="logos">
                    @foreach($media_logos as $key => $logo)
                        <div class="logo">
                            <img src="{{$logo}}">
                        </div>
                    @endforeach
                </div>

                <div class="media-title">
                    <h4 class="poppins">Awards</h4>
                    <p>
                        We welcome any media inqyiries<br>
                        about live broadcasts or studio recordings.
                    </p>
                </div>
                <div class="logos">
                    @foreach($award_logos as $key => $logo)
                        <div class="logo logo-award">
                            <img src="{{$logo}}">
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class='marquee-container purple'>
        <div class='marquee' data-duration='5000' data-gap='10' data-duplicated='true' >
            @component('components/LastNews')
            @endcomponent
            <span>2019年度年末年始休業のお知らせ株式会社ONは下記の期間を年末年始休業日と2019年12月28日（土）...</span>
        </div>
    </div>

    @component("components/contact_block")
    @endcomponent


@endsection
@section("script")
    <script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js" type="text/javascript"></script>
    <script>
    $('#video').YTPlayer({
        fitToBackground: true,
        videoId: "{{ $VideoId }}"
    });
    </script>
    <script>
        $(".marquee").marquee({
            gap:20,
            duplicated:true,
            showSpeed: 850,  // 初始下拉速度   ,
            scrollSpeed: 12,  // 滾動速度   ,
            pauseSpeed: 500,  // 滾動完到下一條的間隔時間   ,
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
        $('.owl-carousel-other-content').owlCarousel({
            loop:true,
            stagePadding: 505,
            margin:160,
            nav:false,
            responsive:{
                0:{
                    stagePadding: 30,
                    margin:10,
                    items:1
                },
                768:{
                    items:1,
                    stagePadding: 100,
                    margin:50,
                },
                990:{
                    items:1,
                    stagePadding: 200,
                    margin:90,
                },
                1366:{
                    items:1,
                    stagePadding: 300,
                    margin:110,
                },
                1920:{
                    items:1
                }
            }
        })
    </script>
@endsection
