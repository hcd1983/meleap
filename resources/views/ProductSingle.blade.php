@extends("page",[
    'title' => $title.' | MELEAP',
    'current'=> 'product'
])
@php
    $locale = \App::getLocale();
@endphp

@section("head")

@endsection
@section("content")


    @component("components/head_block",["bg_image"=>$cover,"logo"=>$logo,"class"=>"product_head_block","content_class"=>"col-lg-6 pl-lg-3","overlay"=>"0.1"])
        <h2>{{$title}}</h2>
        <p>{!! $subtitle !!}</p>
    @endcomponent
    @if($youtube_id)
    <div class="youtube-block pink-linear-bg-reverse">
{{--        <div class="bugger-icon"></div>--}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0 p-lg-0 order-1 order-lg-0">
                    @component("components/youtube-iframe",["youtube_id"=>$youtube_id])
                    @endcomponent
                </div>
                <div class="col-lg-6 order-0 order-lg-1">
                    <div class="mt-lg-5 ml-lg-5">
                        <div class="row">
                            <div class="col-lg-10 yt-block-content">
                                @if($video_title)
                                <h1>{!! $video_title !!} </h1>
                                @endif
                                @if($video_description)
                                <p>{!! $video_description !!}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div>
        <img src="{{$main_pic}}" class="w-100">
    </div>
@if(count($gallery) > 0)
    <div class="hado-gallery pink-linear-bg-reverse">
{{--        <div class="bugger-icon"></div>--}}
        <div class="container-fluid">
            <h3 class="poppins ml-lg-5">HADO  GALLERY</h3>
        </div>
        @if( !empty($gallery) )
            <div class="hado-gallery-slider owl-carousel">
                @php $i=1; @endphp
                @foreach($gallery as $key => $item)
                    <div class="item" style="background-image: url({{$item}})"  data-index="{{$i}}">
                    </div>
                    @php $i++; @endphp
                @endforeach
            </div>
            <div class="text-center poppins d-lg-block d-none">
                <range-bar max="{{count($gallery) }}" min="1" step="1"  :showing="showing" @change="OwlSliderTo"></range-bar>
            </div>
            <div class="d-lg-none counter">
                @{{ showing }} / {{count($gallery) }}
            </div>
        @endif
    </div>
@endif

@endsection
@section("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script>
        owl_start = null;
        function owlscrollto(index){
            // let goto = Number(index) + Number(owl_start) -1;
            // // console.log(goto);
            // owl.trigger('to.owl.carousel',goto );


            let goto = index - 1 ;
            owl.trigger('to.owl.carousel',goto );
        }
        owl = $('.hado-gallery-slider.owl-carousel').owlCarousel({
            loop:true,
            items:3,
            dots:false,
            nav:true,
            margin:34,
            startPosition:0,
            navText:["<div class='prev'></div>","<div class='next'></div>"],
            onChanged:function(event){
                setTimeout(function(){
                    app.showing = Number($(".hado-gallery-slider.owl-carousel .owl-item.active .item").data("index"));
                },100)

            },
            onInitialized:function(event){

                // owl_start = event.item.index;


            },
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
@endsection
