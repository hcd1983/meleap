<footer id="footer" class="poppins social-only">
    <div class="container-fluid mt-3 mb-0">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center justify-content-md-start">
                <a href="{{$homeurl}}">
                    <img src="{{$FooterLogo}}" class="mb-lg-4 footer-logo">
                </a>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 offset-md-4 d-flex justify-content-center justify-content-md-end">
                @component("components/social-media-list",[
                       "class" => "footer-icon mt-4",
                   ])
                @endcomponent
            </div>
        </div>
    </div>
    <div class="copyright">{{$CopyRight}}</div>
</footer>
