<div class="member {{$class}}">
    <div class="photo" style="background-image: url({{$photo}})"></div>
    <div class="data">
        <h3>
            @if(mb_strlen($name) >= 15)
                <span class="small-word">{{$name}}</span>
            @else
                {{$name}}
            @endif
        </h3>
        <div class="title poppins">{{$position}}</div>
{{--        <div class="team poppins">Team</div>--}}
    </div>
</div>
