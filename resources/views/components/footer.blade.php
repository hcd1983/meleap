<footer id="footer" class="poppins">
    <div class="container-fluid mt-0 mb-0">
        <div class="row">
            <div class="col-12 col-lg-4 pt-lg-4 order-0 order-lg-0 d-flex justify-content-between">
                <a href="#">
                    <img src="{{$FooterLogo}}" class="mb-lg-4 footer-logo">
                </a>
                <div class="d-lg-none">
                    @component("components/footer-icons")
                    @endcomponent
                </div>
            </div>
            <div class="col-12 col-lg-4 pt-lg-4 order-1 order-lg-1">
                <h4>Address</h4>
                <p class="mt-3 address">meleap inc. NTT Hibiya Bldg 8F, 1-1-6 Uchisaiwaicho, Chiyoda-ku, Tokyo 100-0011 JAPAN</p>
            </div>
            <div class="col-6 col-lg-4 pt-lg-4 order-3 order-lg-2">
                <h4>Newsletter</h4>
                <p>Stay in the loop. </p>
            </div>
            <div class="col-lg-4 pb-lg-4 order-4 order-lg-3">
                <h4>Policy</h4>
                <div class="mt-lg-3"><a href="#">Privacy</a></div>
                <div><a href="#">Terms</a></div>
            </div>
            <div class="col-6 col-lg-4 pb-lg-4 order-2 order-lg-4">
                <h4>Info</h4>
                <div class="mt-3"><a href="#">+39 0733 224 031</a></div>
                <div><a href="#">info@meleap.jp</a></div>
            </div>
            <div class="col-lg-4 pb-lg-4 order-5 order-lg-5">
                <div class="footer-search">

                    <form class="d-none d-lg-block" action="#" autocomplete="off">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="SEARCH" autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">
                                    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         width="20.441px" height="20.441px" viewBox="0 0 20.441 20.441" enable-background="new 0 0 20.441 20.441" xml:space="preserve">
                                        <polygon  points="10.22,0 9.513,0.707 18.526,9.72 0,9.72 0,10.72 18.526,10.72 9.513,19.734 10.22,20.441
	20.44,10.22 "/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="d-none d-lg-block">
                        @component("components/footer-icons")
                        @endcomponent
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="copyright">©2019 ON CO.LTD. ALL RIGHTS RESERVED.</div>
</footer>
