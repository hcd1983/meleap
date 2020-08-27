@php
    unset($parameters["page"]);

    if($total_page <= 1 + 2 * $offset){
        $start = 1;
        $end = $total_page;
    }else{

        if($current_page <= $offset){
            $start = 1;
            $end = 1 + 2 * $offset;
        }else{
            $start = $current_page - $offset;
            $end = $current_page + $offset;
        }

        if($end >= $total_page){
            $start = $total_page - 2 * $offset;
            $end = $total_page;
        }
    }

@endphp
@if($total_page > 1)
<nav aria-label="Page navigation example" class="d-inline-block">
    <ul class="pagination">

        <li class="page-item {{ $current_page == 1 ? "disabled":""}}">
            @php
                $parameters["page"] = $current_page - 1;
                $link = route( $route_name,$parameters);
            @endphp
            <a class="page-link" href="{{$link}}">Previous</a>
        </li>

        @for($i = $start;$i <= $end;$i++)
            <li class="page-item {{$current_page == $i ? "active" : ""}}">
                @php
                    $parameters["page"] = $i;
                    $link = route( $route_name,$parameters);
                @endphp
                <a class="page-link" href="{{$link}}">{{$i}}</a>
            </li>
        @endfor


        <li class="page-item {{ $current_page == $total_page ? "disabled":""}}">

            @php
                $parameters["page"] = $current_page + 1;
                $link = route( $route_name,$parameters);
            @endphp
           <a class="page-link" href="{{$link}}">Next</a>
        </li>

    </ul>
</nav>
@endif
