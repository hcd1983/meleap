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

                <button-tab  :tabs='{!! json_encode($tabs) !!}' locale="{{$locale}}" action="{{route("FormSubmit")}}">

                    <template v-slot:events="slotProps" >
                        @include("form.events")
                    </template>

                    <template v-slot:media="slotProps">
                        @include("form.media")
                    </template>

                    <template v-slot:play="slotProps">
                        @include("form.play")
                    </template>

                    <template v-slot:query="slotProps">
                        @include("form.play")
                    </template>

                    <template v-slot:business="slotProps">
                        @include("form.business")
                    </template>

                    <template v-slot:press="slotProps">
                        @include("form.press")
                    </template>

                    <template v-slot:player="slotProps">
                        @include("form.player")
                    </template>

                    <template v-slot="slotProps">
                        <loading v-if="slotProps.sending" text="SENDING..."></loading>
                    </template>

                </button-tab>



            </div>
        </div>
    </div>


@endsection
@section("script")
@endsection
