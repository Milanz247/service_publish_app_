<header>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="top-header-full">
                        <div class="top-left-hd">
                            <ul>
                                <li>
                                    <div class="wlcm-text">Welcome to JoBuy</div>
                                </li>
                                <li>
                                    <div class="lang-icon dropdown">
                                        <i class="fas fa-globe ln-glb"></i>
                                        <a href="about.html#" class="icon15 dropdown-toggle-no-caret" role="button"
                                            data-toggle="dropdown">
                                            EN <i class="fas fa-caret-down p-crt"></i>
                                        </a>
                                        <div class="dropdown-menu lanuage-dropdown dropdown-menu-left">
                                            <a class="link-item" href="about.html#">EN</a>
                                            <a class="link-item" href="about.html#">DE</a>
                                            <a class="link-item" href="about.html#">RU</a>
                                            <a class="link-item" href="about.html#">ES</a>
                                            <a class="link-item" href="about.html#">FR</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="top-right-hd">
                            <ul>

                                <li>
                                    <div class="account order-1 dropdown">
                                        <a href="about.html#" class="account-link dropdown-toggle-no-caret"
                                            role="button" data-toggle="dropdown">

                                            <div class="user-dp">


                                                @if (Auth::user()->image)
                                                    <img src="{{ asset('images/user_profile/' . Auth::user()->image) }}"
                                                        class="img-thumbnail" alt="Cinque Terre">
                                                @else
                                                    <img src="{{ asset('images/profile/userd.png') }}"
                                                        class="img-thumbnail" alt="Cinque Terre">
                                                @endif


                                            </div>

                                            <span>Hi! {{ Auth::user()->fname }}</span>


                                            <i class="fas fa-sort-down"></i>
                                        </a>
                                        <div class="dropdown-menu account-dropdown dropdown-menu-right">

                                            <a class="link-item" href="{{ route('view.user.setting') }}">Setting</a>
                                            <a class="link-item" href="{{ route('view.applied.service.list') }}">Applied
                                                Service List</a>
                                            <a class="link-item" href="{{ route('logout') }}"">Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
                        <a class="order-1 order-lg-0 ml-lg-0 ml-3 mr-auto" href="{{ route('view.user.home') }}">
                            <img style="width: 100px;" src="{{ asset('frontend/images/jobuy-logo.png') }}"
                                alt="">
                            <button class="navbar-toggler align-self-start" type="button">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu"
                                id="navbarSupportedContent">
                                <ul class="navbar-nav align-self-stretch">
                                    <li class="nav-item ">
                                        <a class="nav-link {{ request()->routeIs('view.user.home') ? 'active' : '' }}"
                                            href="{{ route('view.user.home') }}">Home <span
                                                class="sr-only">(current)</span></a>
                                    </li>

                                    <li
                                        class="nav-item {{ request()->routeIs('view.user.service') ? 'active' : '' }} ">
                                        <a class="nav-link" href="{{ route('view.user.service') }}">Services <span
                                                class="sr-only"></span></a>
                                    </li>
                                    <li class="nav-item {{ request()->routeIs('view.user.about') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('view.user.about') }}">About <span
                                                class="sr-only"></span></a>
                                    </li>


                                    <li class="nav-item ">
                                        <a class="nav-link" href="index.html">Contact Us <span
                                                class="sr-only"></span></a>
                                    </li>

                                </ul>
                                <a href="about.html#" class="search-link" role="button" data-toggle="modal"
                                    data-target="#searchModal"><i class="fas fa-search"></i></a>
                                <a href="post_a_job.html" class="add-post"></a>
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
