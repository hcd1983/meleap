<div class="member {{$class}}">
    <div class="photo" style="background-image: url({{$photo}})"></div>
    <div class="data">
        <h3>
            @if(mb_strlen($name) >= 17)
                <small class="smaller">{{$name}}</small>
            @elseif(mb_strlen($name) >= 15)
                <small >{{$name}}</small>
            @else
                {{$name}}
            @endif

        </h3>
        <div class="title poppins">{{$position}}</div>
{{--        <div class="team poppins">Team</div>--}}
    </div>
</div>
