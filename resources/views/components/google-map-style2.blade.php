<div id="map" class="section">
    {{--        <div class="bugger-icon"></div>--}}

    <div id="g-map">
        {!! $map !!}
    </div>

    <div class="container-fluid mt-5">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-xl-7 col-xxl-5 order-1 order-md-0 mt-5 mt-md-0 p-0 p-md-3">
                <div class="company-data">
                    <h2 class="poppins">COMPANY PROFILE</h2>
                    <table>
                        <tr>
                            <th>{!! __("about.th_company") !!}</th>
                            <td>{!! __("about.td_company") !!}</td>
                        </tr>
                        <tr>
                            <th>{!! __("about.th_createat") !!}</th>
                            <td>{!! __("about.td_createat") !!}</td>
                        </tr>
                        <tr>
                            <th>{!! __("about.th_amount") !!}</th>
                            <td>{!! __("about.td_amount") !!}</td>
                        </tr>
                        <tr>
                            <th>{!! __("about.th_location") !!}</th>
                            <td>{!! __("about.td_location") !!}</td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="col-12 col-md-6  col-xl-4 col-xxl-4 offset-xl-1  offset-xxl-3 d-flex justify-content-center col-12 order-0 order-md-1">
                <a class="hollow-btn poppins font-italic" href="{{ URL::asset('/contact/') }}">Google Map</a>
            </div>
        </div>
    </div>

</div>
