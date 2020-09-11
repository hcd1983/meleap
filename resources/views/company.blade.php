@extends("page",[
    'title' => 'About | MELEAP',
    'current'=> 'about'
])

@php

    $sliders = [];
    $sliders[] = [
        "image" => URL::asset('images/vr-bg.jpg'),
        "title" => __("about.version"),
        "content"=>__("about.version_des"),
    ];

    $locale = \App::getLocale();

@endphp

@section("head")

@endsection
@section("content")


    @component("components/head_block",["bg_image"=>URL::asset('images/hb-company.jpg')])
        <h2>{!! __("about.title") !!}</h2>
        <p>{!! __("about.des") !!}</p>
    @endcomponent

    <div class="section pink-linear-bg">
        <div class="section_title_svg not-fill">
            <img src="{{ URL::asset('images/vision.svg?') }}">
        </div>
        <h1 class="hollow-title d-lg-none" id="version-title">
            VISION
        </h1>
    </div>

    <div class="section full-screen-slider">
        {{--        <div class="bugger-icon"></div>--}}
        <div class="owl-carousel">
            @foreach($sliders as $key => $slider )
                <div class="item" style="background-image: url({{$slider["image"]}});">
                    <div class="row p-0 m-0 h-100">
                        <div class="col-xl-6 offset-xl-6 position-relative slider-content-container d-flex align-items-end">
                            <div class="overlay"></div>
                            <div class="slider-content">
                                {{--                            @if($slider["content"])--}}
                                <h2>{!! nl2br($slider["title"]) !!}</h2>
                                <p>{!! nl2br($slider["content"]) !!}</p>
                                {{--                            @endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="value" class="section pink-linear-bg-reverse position-relative">


        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-11 d-flex justify-content-end order-1 order-lg-0">
                    <div class="value-list" >
                        <div class="row">
                            <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-3">
                                <div class="value-block">
                                    <div class="number poppins">01</div>
                                    <h3 class="title">{!! __("about.value_sub_1") !!}</h3>
                                    <p>{!! __("about.value_des_1") !!}</p>
                                </div>
                            </div>
                            <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-3">
                                <div class="value-block">
                                    <div class="number poppins">02</div>
                                    <h3 class="title">{!! __("about.value_sub_2") !!}</h3>
                                    <p>{!! __("about.value_des_2") !!}</p>
                                </div>
                            </div>
                            <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-3">
                                <div class="value-block">
                                    <div class="number poppins">03</div>
                                    <h3 class="title">{!! __("about.value_sub_3") !!}</h3>
                                    <p>{!! __("about.value_des_3") !!}</p>
                                </div>
                            </div>
                            <div class="col-10 offset-1 offset-md-0 col-md-6 col-lg-3">
                                <div class="value-block">
                                    <div class="number poppins">04</div>
                                    <h3 class="title">{!! __("about.value_sub_4") !!}</h3>
                                    <p>{!! __("about.value_des_4") !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-1 order-0 order-lg-1 d-flex justify-content-center">
                    <h3 class="vertical-title left-border nowrap">{!! __("about.value") !!}</h3>
                </div>
            </div>

        </div>

        <div class="section_title_svg not-fill">
            <img src="{{ URL::asset('images/value.svg?') }}">
        </div>
        <h1 class="hollow-title d-lg-none" id="value-title">
            VALUE
        </h1>
    </div>

    @component("components.google-map-style2",["map"=>$map])
    @endcomponent

    <div id="team_members" class="section">
        <grid-bg class="overlay rellax" :pattern-width="150" :pattern-height="131" :global-alpha=".2" shadow-color="#FFF" style="background-position: -80px -70px" data-rellax-speed="-3"></grid-bg>
        <div class="section_title_svg rellax" data-rellax-speed=".5">
            <img src="{{ URL::asset('images/team-member.svg') }}">
        </div>
        <h1 class="hollow-title d-lg-none">
            TEAM MEMBERS
        </h1>
        <div class="row member-list" >
            <div class="col-lg-11 offset-lg-1">
                @if(isset($departments["management"][$locale]))
                    @component("components/member-list",[
                        "members" => $departments["management"][$locale],
                        "title" => "Management",
                        "class" => "management",
                        "sticky"=> true,
                        ])
                        <h3 class="vertical-title left-border nowrap poppins">TEAM MEMBERS</h3>
                    @endcomponent
                @endif

                @if(isset($departments["engineer"][$locale]))
                    @component("components/member-list",[
                        "members" => $departments["engineer"][$locale],
                        "title" => "Engineer/Creative",
                        "class" => "engineer"
                        ])
                    @endcomponent
                @endif

                @if(isset($departments["sales"][$locale]))
                    @component("components/member-list",[
                        "members" => $departments["sales"][$locale],
                        "title" => "Sales/Customer Support",
                        "class" => "sales"
                        ])
                    @endcomponent
                @endif

                @if(isset($departments["event"][$locale]))
                    @component("components/member-list",[
                       "members" => $departments["event"][$locale],
                       "title" => "Event&Promo",
                       "class" => "event"
                       ])
                    @endcomponent
                @endif

                @if(isset($departments["corporate"][$locale]))
                    @component("components/member-list",[
                       "members" => $departments["corporate"][$locale],
                       "title" => "Corporate",
                       "class" => "corporate"
                       ])
                    @endcomponent
                @endif


            </div>
        </div>

        <div style="height: 60px"></div>
    </div>

    @component("components/contact_block")
    @endcomponent

    {{--    <x-head_block></x-head_block>--}}
    {{--    <x-contact_block></x-contact_block>--}}


@endsection
@section("script")
    {{--    <script src="//code.jquery.com/jquery-migrate-1.2.1.js"></script>--}}
    {{--    <script src="{{URL::asset('src/jquery.scrolling-parallax.js')}}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


    <script>
        $('.full-screen-slider .owl-carousel').owlCarousel({
            loop:true,
            nav:false,
            items:1,
            dots:false,
            nav:true,
            navText:["<div class='prev'></div>","<div class='next'></div>"]
        })
    </script>
    <script>
        // var OffsetLeft =  $(".sticky").offset().left;


        function sticky_title() {
            // return;
            let OffsetTop = 100;
            let OffsetBottom = 150;
            let $endbase =  $("#team_members");
            let $trigger = $(".sticky").parent();
            let $item  = $(".sticky");

            let EndPoint = $endbase.offset().top + $endbase.height() - OffsetTop + $(window).height() - $item.height() -OffsetBottom;

            let WinTop = $(window).scrollTop();
            let WinBottomLine = $(window).scrollTop() + $(window).height();

            let OffsetLeft = $item.offset().left;



            let StartAt = $trigger.offset().top - OffsetTop;

            if( WinBottomLine > EndPoint){
                $item.css("transition", "all 0.2s ease");
                $item.css("opacity", 0);
                return;
            }

            if(WinTop >= StartAt  ){
                $item.css("position","fixed");
                $item.css("opacity", "1");
                $item.css("top",OffsetTop + "px");
                // $item.css("left",OffsetLeft + "px");
                // $item.css("right",13 + "px");

            }else{
                $(".sticky").removeAttr("style");
            }

        }

        $(window).scroll(function(){
            sticky_title();
        });
        $(window).resize(function () {
            sticky_title();
        });

        $(window).on('load',function(){
            sticky_title();
        })
    </script>
@endsection
