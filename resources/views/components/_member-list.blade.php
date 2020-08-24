@if(count($members) > 0)
<h2 class="ml-3 ml-lg-0 {{ $class }} rellax" data-rellax-speed="1">{{$title}}</h2>
<div class="row">
    <div class="col-lg-10 col-sm-9 col-10">
        <div class="members rellax" data-rellax-speed="1.5">
            <div class="row">
                @foreach($members as $key => $member)
                    @php
                        $_class =  $class;
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
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-lg-2 col-sm-3 col-2 mt-3">
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
