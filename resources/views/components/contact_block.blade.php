<div id="contact_block">
    {{--    <grid-bg class="overlay"></grid-bg>--}}
    <div class="overlay"></div>
{{--    <div class="bugger-icon"></div>--}}
    <div class="contact-social">
        @component("components/social-media-list")
        @endcomponent
    </div>
    <div class="container">
        <a href="#top" class="go-top poppins">TOP</a>
        <h2>{!! __("general.contact_us") !!}</h2>
        <a class="contact-btn poppins" href="{{ URL::asset('/contact/') }}">GO</a>
    </div>
</div>
