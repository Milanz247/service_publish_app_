<header>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="">
                        <div class="top-header-full">
                            <div class="top-left-hd">
                                <ul>
                                    <li>
                                        <div class="wlcm-text">Welcome to Jobby</div>
                                    </li>
                                    <li>
                                        <div class="lang-icon dropdown">
                                            <i class="fas fa-globe ln-glb"></i>
                                            <a href="sign_in.html#" class="icon15 dropdown-toggle-no-caret"
                                                role="button" data-toggle="dropdown">
                                                EN <i class="fas fa-caret-down p-crt"></i>
                                            </a>
                                            <div class="dropdown-menu lanuage-dropdown dropdown-menu-left">
                                                <a class="link-item" href="sign_in.html#">EN</a>
                                                <a class="link-item" href="sign_in.html#">DE</a>
                                                <a class="link-item" href="sign_in.html#">RU</a>
                                                <a class="link-item" href="sign_in.html#">ES</a>
                                                <a class="link-item" href="sign_in.html#">FR</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="top-right-hd">
                                @auth
                                    @if (Auth::user()->usertype === '1')
                                        <a href="{{ route('view.serviceuser.home') }}" class="login_btn"><i
                                                class="fas fa-dashboard"></i> Dashboard</a>
                                    @elseif (Auth::user()->usertype === '0')
                                        <a href="{{ route('view.user.home') }}" class="login_btn"><i
                                                class="fas fa-dashboard"></i> Dashboard</a>
                                    @endif
                                @else
                                    @if (Route::is('/'))
                                        <a href="{{ route('login') }}" class="login_btn mx-3"><i class="fas fa-lock"></i>
                                            Login</a>
                                        <a href="{{ route('select.profile') }}" class="login_btn"><i
                                                class="fas fa-lock"></i>
                                            Register</a>
                                    @elseif (Route::is('login'))
                                        <a href="{{ route('select.profile') }}" class="login_btn"><i
                                                class="fas fa-lock"></i>
                                            Register</a>
                                    @elseif(Route::is('register') || Route::is('select.profile') || Route::is('register.user') || Route::is('view.about') || Route::is('view.contact'))
                                        <a href="{{ route('login') }}" class="login_btn"><i class="fas fa-lock"></i>
                                            Login</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-dark1 justify-content-sm-start">
                        <a class="order-1 order-lg-0 ml-lg-0 ml-3 mr-auto" href="{{ route('/') }}">
                            <img style="width: 100px;" src="{{ asset('frontend/images/jobuy-logo.png') }}"
                                alt="">
                        </a>
                        <button class="navbar-toggler align-self-start" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-self-stretch">

                                <li class="nav-item ">
                                    <a class="nav-link {{ request()->routeIs('/') ? 'active' : '' }}"
                                        href="{{ route('/') }}">Home <span class="sr-only">(current)</span></a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link {{ request()->routeIs('view.about') ? 'active' : '' }}"
                                        href="{{ route('view.about') }}">About <span
                                            class="sr-only">(current)</span></a>
                                </li>


                                <li class="nav-item ">
                                    <a class="nav-link {{ request()->routeIs('view.contact') ? 'active' : '' }}"
                                        href="{{ route('view.contact') }}">Contact us<span
                                            class="sr-only">(current)</span></a>
                                </li>

                            </ul>

                        </div>
                        <div class="responsive-search order-1">
                            <input type="text" class="rsp-search" placeholder="Search...">
                            <i class="fas fa-search r-sh1"></i>
                        </div>
                    </nav>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </div>
</header>
