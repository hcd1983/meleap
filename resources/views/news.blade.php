@extends("page",[
    'title' => 'News | MELEAP',
    'current'=> 'news'
])

@section("head")

@endsection
@section("content")


    @component("components/head_block",["bg_image"=>URL::asset('images/hb-news.jpg'),"overlay"=>"0.2"])
        <h2>NEWS</h2>
        <p>{!! __("general.news") !!}</p>
    @endcomponent

    <div class="section news-list-section">
        <div  class="container-fluid">
            <div class="news-list px-xl-5">
                <div class="search-bar d-md-flex justify-content-md-between align-items-md-end">
                    <div class="categories">
                        @php
                        $categories = [];
                        $categories[] = [
                            "name"=>"Latest News",
                            "slug"=>"ln",
                            "link"=>"#"
                        ];
                        $categories[] = [
                            "name"=>"Activity",
                            "slug"=>"act",
                            "link"=>"#"
                        ];
                        @endphp
                        <ul class="poppins">
                            <li><a href="{{route('news',["locale"=>$locale])}}">All</a></li>
                            @foreach($categories as $key => $category)
                                <li><a href="{{$category["link"]}}">{{$category["name"]}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="search-form poppins">
                        <form action="#">
                            <div class="search-form-container">
                                <input type="text"  placeholder="Search" />
                                <button class="icon"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="news-list-container">
                    <div class="row">
                        @for($i=0;$i<9;$i++)
                            @php
                                $single = [];
                                $single["thumbnail"] = "https://picsum.photos/695/390"."?ver=".$i;
                                $single["date"] = "2020/06/18";
                                $single["post_category"] = ["News","Activity","Others"][rand(0,2)];
                                $single["title"] = ["CLIMAX SEASON 2019<br>大会エントリー開始！","HADO WORLD CUP 2019<br>フォトギャラリー公開！","meleap公式アルバム利用ガイドラインについて"][rand(0,2)];
                                $single["permalink"] = route("news-single",["locale"=>$locale,"slug"=>urlencode(urlencode($single['title']))]);
                            @endphp
                            <div class="col-lg-6 col-xl-4">

                                <article class="news-block">
                                    <header class="d-flex justify-content-between px-3 py-2">
                                        <div class="date">{{ $single["date"] }}</div>
                                        <div class="category"><a href="#">{{ $single["post_category"] }}</a></div>
                                    </header>
                                    <a href="{{$single["permalink"] }}">
                                        <div class="thumbnail" style="background-image: url({{$single["thumbnail"]}})"></div>
                                    </a>
                                    <footer>
                                        <a href="{{$single["permalink"] }}">
                                            <h3 class="mt-3 mb-1">{!! $single["title"] !!}</h3>
                                        </a>
                                        <div class="text-right">
                                            <a href="{{$single["permalink"] }}" class="readmore poppins font-weight-bold font-italic mr-1">
                                                Readmore
                                            </a>
                                        </div>
                                    </footer>
                                </article>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="text-center">
                    <nav aria-label="Page navigation example" class="d-inline-block">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>


    @component("components/contact_block")
    @endcomponent

@endsection
@section("script")
@endsection
