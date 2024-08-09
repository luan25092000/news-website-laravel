<div class="container-fluid fh5co_header_bg">
    <div class="container">
        <div class="row">
            <div class="col-12 fh5co_mediya_center"><a href="#" class="color_fff fh5co_mediya_setting"><i
                        class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;Friday, 5 January 2018</a>
                <div class="d-inline-block fh5co_trading_posotion_relative"><a href="#"
                        class="treding_btn">Trending</a>
                    <div class="fh5co_treding_position_absolute"></div>
                </div>
                <a href="#" class="color_fff fh5co_mediya_setting">Instagram’s big redesign goes live with
                    black-and-white app</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <a href="{{ route('client.index') }}">
                    <img src="{{ asset(\App\Models\Setting::first()->logo) }}" alt="img"
                        class="fh5co_logo_width" />
                </a>
            </div>
            <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table">
                        <div class="fh5co_verticle_middle" data-toggle="modal" data-target="#searchModal"><i
                                class="fa fa-search"></i></div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table">
                        <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table">
                        <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://twitter.com/fh5co" target="_blank" class="fh5co_display_table">
                        <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://fb.com/fh5co" target="_blank" class="fh5co_display_table">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a>
                </div>
                <!--<div class="d-inline-block text-center"><img src="./public/client/images/country.png" alt="img" class="fh5co_country_width"/></div>-->
                <div class="d-inline-block text-center dd_position_relative ">
                    <div id="google_translate_element"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-sm bg-light">
    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('client.index') }}">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        @if (Auth::check())
            <li class="nav-item">
                <div class="dropdown">
                    <div class="dropdown-toggle" data-toggle="dropdown">Hi, {{ Auth::user()->name }}</div>
                    <div class="dropdown-menu" style="margin-left: -90px;">
                        <a class="dropdown-item" href="{{ route('client.logout') }}">Logout</a>
                    </div>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('client.login.form') }}">Sign In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('client.register.form') }}">Sign Up</a>
            </li>
        @endif
    </ul>
</nav>
<!-- The Modal -->
<div class="modal fade" id="searchModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="border: none;">
                <h4 class="modal-title">Search</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('client.news.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="keyword" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-warning text-white">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer" style="border: none;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
