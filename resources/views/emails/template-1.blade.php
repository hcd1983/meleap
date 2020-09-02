<style>
    div{
        display: flex;
    }
</style>
<h2>{{$title}}</h2>
@foreach($pass as $key => $item)
    <div>
        <h3>{{$item["label"]}}</h3>
        @foreach($item["param"] as $_key => $param)
            @if($_key > 0) 、@endif
            {{$param["value"]}}
        @endforeach
    </div>
@endforeach
