@extends("page",[
    'title' => 'News | MELEAP',
    'current'=> 'news_api'
])
@php
$locale = \App::getLocale();
@endphp
@section("head")

@endsection
@section("content")


    @component("components/head_block",["bg_image"=>URL::asset('images/hb-news.jpg'),"overlay"=>"0.2"])
        <h2>{!! __("_news.news") !!}</h2>
{{--        <p>お知らせ</p>--}}
    @endcomponent

    <div class="section news-list-section">
        <div  class="container-fluid">
            <news-list class="news-list px-xl-5" post-api="{{$PostsApiUrl}}" category-api="{{$CategoryApiUrl}}" news-url="{{route("news_api",["locale"=>$locale])}}" category-url="{{route("news_api_category",["locale"=>$locale])}}" category-slug="{{$slug ?? ""}}">

                <template v-slot:category="slotProps">
                    <div class="search-bar d-md-flex justify-content-md-between align-items-md-end">

                        <category-list :categories="slotProps.categories"  current="{{$slug}}" news-url="{{route("news_api",["locale"=>$locale])}}" category-url="{{route("news_api_category",["locale"=>$locale])}}"></category-list>

                        <div class="search-form poppins">
                            <form action="#">
                                <div class="search-form-container">
                                    <input type="text"  placeholder="Search" />
                                    <button class="icon"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <post-list news-url="{{route("news_api",["locale"=>$locale])}}" :categories="slotProps.categories" :posts="slotProps.posts"></post-list>
                    <div class="text-center">
                        <news-pagination news-url="{{url()->current()}}" :total-page="slotProps.totalPage" :total-post="slotProps.totalPost" :offset="2" :current="{{$_GET["page"] ?? 1}}"></news-pagination>
                    </div>

                    <div v-if="!slotProps.newsLoaded">
                        <loading></loading>
                    </div>
                    <div v-if="slotProps.newsLoaded && slotProps.posts.length ==0">
                        <h3 class="no-result">No Result.</h3>
                    </div>
                </template>

            </news-list>
        </div>
    </div>


    @component("components/contact_block")
    @endcomponent

@endsection
@section("script")
@endsection
