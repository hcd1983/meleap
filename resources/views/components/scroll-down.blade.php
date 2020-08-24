@php
  $_class= "scroll-to";
  if(isset($class) && $class){
      $_class .= " ".$class;
  }
@endphp
<a href="{{$href}}" class="{{$_class}}">
    <div class="scroll-down">
        <h3>Scroll Down</h3>
        <div class="animated fadeInDown infinite"><img src="{{asset("/images/down-arrow.svg")}}"></div>
    </div>
</a>

