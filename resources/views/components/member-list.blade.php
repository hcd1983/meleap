@if(count($members) > 0)
<div class="text-center text-sm-left">
    <h2 class="ml-lg-3 ml-lg-0 {{ $class }} rellax poppins" data-rellax-speed="1">{{$title}}</h2>
</div>
<div class="row">
    <div class="col-lg-10 col-sm-9 col-12">
        <div class="members rellax" data-rellax-speed="1.5">
            <div class="row">
                @foreach($members as $key => $member)
                    @php
                        $_class =  $class;
                    @endphp
                    <div class="col-6 col-xl-4 col-xxl-3 mb-3 mb-sm-5 mt-sm-3 member-container">
                        @component("components/member",[
                            "photo"=>$member["avatar"],
                            "class"=>$_class,
                            "name"=>$member["name"],
                            "position"=>$member["position"]
                        ])
                        @endcomponent
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-lg-2 col-sm-3 col-2 mt-3 d-none d-sm-block @if(isset($sticky) && $sticky) sticky @endif">
        {{ $slot }}
    </div>
</div>
@else
    <div class="row">
        <div class="col-lg-10 col-sm-9 col-10"></div>
        <div class="col-lg-2 col-sm-3 col-2 mt-3">
            {{ $slot }}
        </div>
    </div>
@endif
