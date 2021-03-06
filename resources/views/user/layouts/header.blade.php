<header>
    <div class="top-header">
        <div class="container">
            <div class="oflow-hidden font-9 text-sm-center ptb-sm-5">

                <ul class="float-left float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-10 list-a-ptb-xs-5">
                    <li><a class="pl-0 pl-sm-10" href="#">Stockholm, Sweden
                            <i class="ion-android-cloud-outline"></i> 15 &#8451;</a></li>
                    <li><a href="#">Thursda, 24 May, 2018</a></li>
                    <li><a href="#">09:00 AM</a></li>
                </ul>
                <ul class="float-right float-sm-none font-13 list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5 color-ash">
                    <li><a class="pl-0 pl-sm-10" href="#"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                    <li><a href="#"><i class="ion-social-google"></i></a></li>
                    <li><a href="#"><i class="ion-social-rss"></i></a></li>
                </ul>

            </div><!-- top-menu -->
        </div><!-- container -->
    </div><!-- top-header -->

    <div class="middle-header mtb-20 mt-xs-0">
        <div class="container">
            <div class="row">

                <div class="col-sm-4">
                    <a class="logo" href="#"><img src="images/logo-black.png" alt="Logo"></a>
                </div><!-- col-sm-4 -->

                <div class="col-sm-8">
                    <!-- Bannner bg -->
                    <div class="banner-area dplay-tbl plr-30 plr-md-10 color-white">
                        <div class="ptb-sm-15 dplay-tbl-cell">
                            <h5>realestate.com.au</h5>
                            <h6>Discover the latest properties of australia</h6>
                        </div><!-- left-area -->

                        <div class="dplay-tbl-cell text-right min-w-100x">
                            <a class="btn-fill-white btn-b-sm plr-10" href="#">READ MORE</a>
                        </div><!-- right-area -->
                    </div><!-- banner-area -->
                </div><!-- col-sm-4 -->

            </div><!-- row -->
        </div><!-- container -->
    </div><!-- top-header -->

    <div class="bottom-menu">
        <div class="container">

            <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

            <ul class="main-menu" id="main-menu">
                <li class="drop-down"><a href="#!">HOME<i class="ion-chevron-down"></i></a>
                    <ul class="drop-down-menu drop-down-inner">
                        <li><a href="#">PAGE 1</a></li>
                        <li><a href="#">PAGE 2</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="{{ route('pengaduan-online') }}">PENGADUAN ONLINE</a>
                </li>
                <li class="drop-down"><a href="#!">SPORT<i class="ion-chevron-down"></i></a>
                    <ul class="drop-down-menu drop-down-inner">
                        <li><a href="#">PAGE 1</a></li>
                        <li><a href="#">PAGE 2</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#!">POLITICS<i class="ion-chevron-down"></i></a>
                    <ul class="drop-down-menu drop-down-inner">
                        <li><a href="#">PAGE 1</a></li>
                        <li><a href="#">PAGE 2</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#!">TRAVEL<i class="ion-chevron-down"></i></a>
                    <ul class="drop-down-menu drop-down-inner">
                        <li><a href="#">PAGE 1</a></li>
                        <li><a href="#">PAGE 2</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#!">LIFESTYLE<i class="ion-chevron-down"></i></a>
                    <ul class="drop-down-menu drop-down-inner">
                        <li><a href="#">PAGE 1</a></li>
                        <li><a href="#">PAGE 2</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#!">CULTURE<i class="ion-chevron-down"></i></a>
                    <ul class="drop-down-menu drop-down-inner">
                        <li><a href="#">PAGE 1</a></li>
                        <li><a href="#">PAGE 2</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#!">TECH<i class="ion-chevron-down"></i></a>
                    <ul class="drop-down-menu drop-down-inner">
                        <li><a href="#">PAGE 1</a></li>
                        <li><a href="#">PAGE 2</a></li>
                    </ul>
                </li>
                @if(Auth::guest())
                <li class="drop-down">
                    <a href="{{ route('login') }}">SIGN-IN</a>
                </li>
                @else
                <span class="drop-down">
                    {{ Auth::user()->name }}
                </span>
                <li class="drop-down">

                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                @endif
                <li class="drop-down"><a href="#!">VIDEO<i class="ion-chevron-down"></i></a>
                    <ul class="drop-down-menu drop-down-inner">
                        <li><a href="#">PAGE 1</a></li>
                        <li><a href="#">PAGE 2</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div><!-- container -->
    </div><!-- bottom-menu -->
</header>
