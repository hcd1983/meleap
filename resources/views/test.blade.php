@extends("page",[
    'title' => 'Company | MELEAP',
    'current'=> 'company'
])

@php
    $names = ["福田 浩士","本木 卓磨","冨田 由紀治","林 先健","太田 直樹","安達 亮介","増田 博志","角 保幸"];

    $sliders = [];
    $sliders[] = [
        "image" => URL::asset('images/vr-bg.jpg'),
        "title" => "私たちはテクノスポーツ
    で、新たなスポーツの
    歴史を創り出す。",
        "content"=>"\"スポーツには人の心を動かす力がある。
    私たちはテクノロジーでスポーツの競技システム・観戦スタイルを革新し、その力を加速させる。観戦者も「自分ゴト」となり、ヒザがガクガク震えるほどの感動を得る。

    平凡な毎日が一変し、未来を生きる希望が生まれる。
    自分もやってやろう!と力がみなぎる。
    世界中の子供たちもテクノスポーツをきっかけに夢を持ち、魂を躍動させる。\"",
    ];
    $sliders[] = [
        "image" => URL::asset('images/mission_bg.png'),
        "title" => "Some Title Here",
        "content"=> "",
    ];
@endphp

@section("head")

@endsection
@section("content")


    @component("components/head_block",["bg_image"=>URL::asset('images/hb-company.jpg')])
        <h2>会社情報</h2>
        <p>"社名の由来はmerry leap(陽気な跳躍)です。
            ビジョンの実現を目指し、どんな困難があろう
            とも陽気に飛び跳ね続けます。"</p>
    @endcomponent

    <div class="section pink-linear-bg">
        <div class="section_title_svg">
            <img src="{{ URL::asset('images/vision.svg') }}">
        </div>
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
                <div class="col-10 col-lg-11 col-md-10 d-flex justify-content-end">
                    <div class="value-list" >
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="value-block">
                                    <div class="number poppins">01</div>
                                    <h3 class="title">挑戦する</h3>
                                    <p>自らの限界の先へ。成長し続けよう。<br>
                                        一度きりの人生、皆が難しいと思うこ
                                        とにこそ取り組む価値がある。</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="value-block">
                                    <div class="number poppins">02</div>
                                    <h3 class="title">チームでやり抜く</h3>
                                    <p>チームで助け合おう。<br>
                                        自身はもちろん、他者の力も引き出して目標
                                        を実現させよう。</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="value-block">
                                    <div class="number poppins">03</div>
                                    <h3 class="title">自ら考え動く</h3>
                                    <p>何事も自分事と捉え、自ら最適解を探ろう。<br>
                                        他責でなく自責で振り返り、次に繋げよう。</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="value-block">
                                    <div class="number poppins">04</div>
                                    <h3 class="title">挑戦する</h3>
                                    <p>自身の熱源を常に意識し、モチベー
                                        ションを最大化させよう</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 col-lg-1 col-md-2">
                    <h3 class="vertical-title left-border nowrap">大事にする<span>4</span>つの価値観</h3>
                </div>
            </div>

        </div>

        <div class="section_title_svg">
            <img src="{{ URL::asset('images/value.svg') }}">
        </div>
    </div>

    <div id="map" class="section">
        {{--        <div class="bugger-icon"></div>--}}

        <div class="row">
            <div class="col-lg-11 offset-lg-1 position-relative">
                <div class="company-data rellax" data-rellax-speed="1">
                    <h2 class="poppins">COMPANY PROFILE</h2>
                    <table>
                        <tr>
                            <th>社名</th>
                            <td>株式会社meleap</td>
                        </tr>
                        <tr>
                            <th>設立</th>
                            <td>2014年1月24日</td>
                        </tr>
                        <tr>
                            <th>資本金</th>
                            <td>6億5,554万円(資本準備金含む)</td>
                        </tr>
                        <tr>
                            <th>所在地</th>
                            <td>〒100-0011 東京都千代田区内幸町<br>
                                1丁目1−6 NTT 日比谷ビル 8階</td>
                        </tr>
                    </table>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1620.6164606852747!2d139.75636705823175!3d35.67126637401255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bedd42946e7%3A0xd08244475af5bc0e!2z5pel5pys44CSMTAwLTAwMTEgVMWNa3nFjS10bywgQ2hpeW9kYSBDaXR5LCBVY2hpc2Fpd2FpY2jFjSwgMS1jaMWNbWXiiJIx4oiSNiBOVFQg5pel5q-U6LC344OT44OrIDjpmo4!5e0!3m2!1szh-TW!2stw!4v1593447574908!5m2!1szh-TW!2stw"
                    width="100%" height="500"
                    frameborder="0"
                    style="border:0;"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="1"></iframe>
            </div>
        </div>
    </div>

    <div id="team_members" class="section">
        <grid-bg class="overlay rellax" :pattern-width="150" :pattern-height="131" :global-alpha=".2" shadow-color="#FFF" style="background-position: -80px -70px" data-rellax-speed="-3"></grid-bg>
        <div class="section_title_svg rellax" data-rellax-speed=".5">
            <img src="{{ URL::asset('images/team-member.svg') }}">
        </div>
        <div class="row member-list" >
            <div class="col-lg-11 offset-lg-1">
                <h2 class="ml-3 ml-lg-0 management rellax" data-rellax-speed="1">Management</h2>
                <div class="row">
                    <div class="col-lg-10 col-sm-9 col-10">
                        <div class="members rellax" data-rellax-speed="3">
                            <div class="row">
                                @for($i=0;$i<8;$i++)
                                    @php
                                        $rand = rand(0,5);
                                        $positions = ["CEO","Senior Engineer","Sales","Good Person","Guard","Boss"];

                                        $member = [];
                                        $member["name"] = $names[$i];
                                        $member["avatar"] = "https://i.pravatar.cc/400?U=".rand();
                                        $member["position"] = $positions[$rand];
                                        $_class = "management";
                                    @endphp
                                    <div class="col-sm-6 col-xl-3 mb-5 mt-3">
                                        @component("components/member",[
                                            "photo"=>$member["avatar"],
                                            "class"=>$_class,
                                            "name"=>$member["name"],
                                            "position"=>$member["position"]
                                        ])
                                        @endcomponent
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-3 col-2 mt-3">
                        <h3 class="vertical-title left-border nowrap poppins sticky"  data-margin-top="100"  data-sticky-class="is-sticky">TEAM MEMBERS</h3>
                    </div>
                </div>

                <h2 class="ml-3 ml-lg-0 engineer rellax" data-rellax-speed="1">Engineer/Creative</h2>
                <div class="row">
                    <div class="col-lg-10 col-sm-9 col-10">
                        <div class="members rellax" data-rellax-speed="3">
                            <div class="row">
                                @for($i=0;$i<8;$i++)
                                    @php
                                        $rand = rand(0,5);
                                        $positions = ["CEO","Senior Engineer","Sales","Good Person","Guard","Boss"];

                                        $member = [];
                                        $member["name"] = $names[$i];
                                        $member["avatar"] = "https://i.pravatar.cc/400?U=".rand();
                                        $member["position"] = $positions[$rand];
                                        $_class = "engineer";
                                    @endphp
                                    <div class="col-sm-6 col-xl-3 mb-5 mt-3">
                                        @component("components/member",[
                                            "photo"=>$member["avatar"],
                                            "class"=>$_class,
                                            "name"=>$member["name"],
                                            "position"=>$member["position"]
                                        ])
                                        @endcomponent
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-3 col-2 mt-3"></div>
                </div>

                <h2 class="ml-3 ml-lg-0 sales rellax" data-rellax-speed="1">Sales/Customer Support</h2>
                <div class="row">
                    <div class="col-lg-10 col-sm-9 col-10">
                        <div class="members rellax" data-rellax-speed="3">
                            <div class="row">
                                @for($i=0;$i<8;$i++)
                                    @php
                                        $rand = rand(0,5);
                                        $positions = ["CEO","Senior Engineer","Sales","Good Person","Guard","Boss"];

                                        $member = [];
                                        $member["name"] = $names[$i];
                                        $member["avatar"] = "https://i.pravatar.cc/400?U=".rand();
                                        $member["position"] = $positions[$rand];
                                        $_class = "sales";
                                    @endphp
                                    <div class="col-sm-6 col-xl-3 mb-5 mt-3">
                                        @component("components/member",[
                                            "photo"=>$member["avatar"],
                                            "class"=>$_class,
                                            "name"=>$member["name"],
                                            "position"=>$member["position"]
                                        ])
                                        @endcomponent
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-3 col-2 mt-3"></div>
                </div>

                <h2 class="ml-3 ml-lg-0 event rellax" data-rellax-speed="1">Event&Promo</h2>
                <div class="row">
                    <div class="col-lg-10 col-sm-9 col-10">
                        <div class="members rellax" data-rellax-speed="3">
                            <div class="row">
                                @for($i=0;$i<8;$i++)
                                    @php
                                        $rand = rand(0,5);
                                        $positions = ["CEO","Senior Engineer","Sales","Good Person","Guard","Boss"];

                                        $member = [];
                                        $member["name"] = $names[$i];
                                        $member["avatar"] = "https://i.pravatar.cc/400?U=".rand();
                                        $member["position"] = $positions[$rand];
                                        $_class = "event";
                                    @endphp
                                    <div class="col-sm-6 col-xl-3 mb-5 mt-3">
                                        @component("components/member",[
                                            "photo"=>$member["avatar"],
                                            "class"=>$_class,
                                            "name"=>$member["name"],
                                            "position"=>$member["position"]
                                        ])
                                        @endcomponent
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-3 col-2 mt-3"></div>
                </div>

                <h2 class="ml-3 ml-lg-0 corporate rellax" data-rellax-speed="1">Corporate</h2>
                <div class="row">
                    <div class="col-lg-10 col-sm-9 col-10">
                        <div class="members rellax" data-rellax-speed="3">
                            <div class="row">
                                @for($i=0;$i<8;$i++)
                                    @php
                                        $rand = rand(0,5);
                                        $positions = ["CEO","Senior Engineer","Sales","Good Person","Guard","Boss"];

                                        $member = [];
                                        $member["name"] = $names[$i];
                                        $member["avatar"] = "https://i.pravatar.cc/400?U=".rand();
                                        $member["position"] = $positions[$rand];
                                        $_class = "corporate";
                                    @endphp
                                    <div class="col-sm-6 col-xl-3 mb-5 mt-3">
                                        @component("components/member",[
                                            "photo"=>$member["avatar"],
                                            "class"=>$_class,
                                            "name"=>$member["name"],
                                            "position"=>$member["position"]
                                        ])
                                        @endcomponent
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-3 col-2 mt-3"></div>
                </div>

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
       function sticky_title() {
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
               $item.css("left",OffsetLeft + "px");

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
