@extends("page",[
    'title' => __("contact.contact").' | MELEAP',
    'current'=> 'contact'
])
@php
    $locale = app::getLocale();

    if($locale == "en"){

        $tabs = [
            [
                "text" => "Business Inquiry",
                "slug" =>"business",
            ],
            [
                "text" => "Press or Media Inquiry",
                "slug" =>"press",
            ],
            [
                "text" => "Player Inquiry",
                "slug" =>"player",
            ]
        ];

    }else{



        $tabs = [
            [
                "text" => "導入またはイベントでの活用をご検討されている方",
                "slug" =>"events",
            ],
            [
                "text" => "プレス・メディアの方はこちら",
                "slug" =>"media",
            ],
            [
                "text" => "プレイヤーの方はこちら",
                "slug" =>"play",
            ],
            [
                "text" => "その他のお問合せの方はこちら",
                "slug" =>"query",
            ]
        ];

    }



@endphp
@section("head")
    <script>
        let tabs = {!! json_encode($tabs) !!}
    </script>
@endsection
@section("content")


    @component("components/head_block",["bg_image"=>URL::asset('images/hb-contact.jpg'),"overlay"=>"0.2"])
        <h2>{!! __("contact.contact") !!}</h2>
{{--        <p>お問い合わせはこちらから</p>--}}
    @endcomponent

    <div id="contact_form" class="section">
        <div class="container-fluid position-relative">
            <div class="d-none d-xl-block contact-svg"><img src="{{ URL::asset('images/contact.svg') }}"></div>
            <h1 class="hollow-title d-lg-none">
                CONTACT
            </h1>
            <div class="form-content">
                <div class="contact-title">
                    <h3 class="text-lg-center text-left">{!! __("contact.please.fill") !!}</h3>
                </div>


                <button-tab  :tabs='{!! json_encode($tabs) !!}' locale="{{$locale}}">

                    <template slot="events">
                        @include("form.events")
                    </template>

                    <template slot="media">
                        @include("form.media")
                    </template>

                    <template slot="play">
                        @include("form.play")
                    </template>

                    <template slot="query">
                        @include("form.play")
                    </template>

                    <template slot="business">
                        @include("form.business")
                    </template>

                    <template slot="press">
                        @include("form.press")
                    </template>

                    <template slot="player">
                        @include("form.player")
                    </template>

                </button-tab>


            </div>
        </div>
    </div>


@endsection
@section("script")
@endsection
