@extends("page",[
    'title' => 'Contact | MELEAP',
    'current'=> 'contact'
])
@php
    $locale = app::getLocale();
@endphp
@section("head")

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

                <button-tab locale="{{$locale}}"></button-tab>


            </div>
        </div>
    </div>


@endsection
@section("script")
@endsection
