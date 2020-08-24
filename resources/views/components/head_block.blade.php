@php
if(!isset($content_class)){
     $content_class = "col-lg-5 col-xl-3 offset-lg-6";
}

if(!isset($logo)){
     $content_class .= " m-pl-75";
}

$content_class .= " rellax";
@endphp
<div class="head-block d-flex align-items-center @if(isset($class)) {{$class}} @endif" style="background-image: url({{$bg_image}})">
    @if(isset($overlay))
        <div class="overlay" style="background:#000;opacity: {{$overlay}};"></div>
    @endif
    {{--    <grid-bg class="overlay"></grid-bg>--}}

    <div class="container-fluid">
        <div class="head-block-content">
            <div class="row d-flex align-items-center">
                @if(isset($logo))
                    <div class="col-lg-6 pr-lg-3 d-lg-flex justify-content-lg-end logo-container">
                        <div class="product_logo rellax" data-rellax-speed="1"><img class="img-fluid" src="{{$logo}}"></div>
                    </div>
                @endif
                <div class="{{$content_class}}" data-rellax-speed="1">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
