@extends("page",[
    'title' => $title.' | MELEAP',
    'current'=> 'Contact'
])

@section("head")

@endsection
@section("content")


    @component("components/head_block",["bg_image"=>$cover,"overlay"=>"0.2"])
{{--        <h2>お問い合わせ</h2>--}}
{{--        <p>お問い合わせはこちらから</p>--}}
    @endcomponent

    <div class="section news-single-section">
        <div  class="container-fluid">
            <div class="news-single px-xl-5">
                <div class="title-bar">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2>{!! $title !!}</h2>
                        </div>
                        <div class="col-lg-2 offset-lg-4 d-flex justify-content-end align-items-end ">
                            <a href="#"><div class="icon-ball mr-2"><i class="fab fa-facebook-square"></i></div></a>
                            <a href="#"><div class="icon-ball"><i class="fab fa-twitter"></i></div></a>
                        </div>
                    </div>
                </div>
                <article>
                    <header class="d-flex justify-content-between">
                        <div class="date poppins">
                            <div class="year">{{$date_y}}</div>
                            <div class="day">{{$date_m}} / {{$date_d}}</div>
                        </div>
                        <div class="post-breadcrumb d-flex justify-content-end align-items-end ">
                          <a href="{{route("news")}}" class="mr-3">Top</a>
                          <a href="javascript:void(0)" class="mr-3"><img src="{{URL::asset("images/bread_crumb_arrow.svg")}}"></a>
                          <a href="{{route("news")}}">Activity</a>
                        </div>
                    </header>
                    <div class="article-content">
                        @php
                            $media_row = 0;
                        @endphp
                        @foreach($content as $key => $_content)
                            @php

                                if($_content["type"] === "text"){

                                    $html_content_class = "html-content html-content-nomedia col-lg-8 offset-lg-2";

                                }else{

                                    if(($media_row + 1) % 2 == 0){
                                        $order_class = "row-media-even";
                                    }else{
                                        $order_class = "row-media-odd";
                                    }
                                    $media_row++;
                                    $html_content_class = "html-content col-lg-5";
                                }
                            @endphp
                            <div class="content-cell {{$order_class}}">
                                <div class="row align-items-center">
                                    <div class="{{$html_content_class}}">
                                        {!! $_content["content"] !!}
                                    </div>
                                    <div class="col-lg-7">
                                        @if($_content["type"] === "image" && isset($_content["image"]))
                                            <img src="{{$_content["image"]}}" class="w-100">
                                        @endif
                                        @if($_content["type"] === "video" && isset($_content["youtube_id"]))
                                            @component("components/youtube-iframe",["youtube_id"=>$_content["youtube_id"]])
                                            @endcomponent
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </article>
                <div class="article-nav">
                    <a class="back-link d-none d-lg-block" href="javascript:void(0)" onclick="window.history.back()">BACK</a>
                    <div class="row">
                        <div class="col-lg-6 prev px-lg-5 py-5 poppins">
                            <a href="{{$prev_post_link}}" class="text-decoration-none">
                                <img src="{{URL::asset("images/post-prev.svg")}}">
                                <div class="ml-3 ml-lg-5">
                                    {{$prev_post_title}}
                                    <span>{{$prev_post_date}}</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 next px-lg-5 py-5">
                            <a  href="{{$next_post_link}}" class="justify-content-end">
                                <div class="mr-3 mr-lg-5">
                                    {{$next_post_title}}
                                    <span>{{$next_post_date}}</span>
                                </div>
                                <img src="{{URL::asset("images/post-next.svg")}}">
                            </a>
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
@endsection
