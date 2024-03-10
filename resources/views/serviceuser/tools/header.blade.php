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
                                        <a href="" class="icon15 dropdown-toggle-no-caret" role="button"
                                            data-toggle="dropdown">
                                            EN <i class="fas fa-caret-down p-crt"></i>
                                        </a>
                                        <div class="dropdown-menu lanuage-dropdown dropdown-menu-left">
                                            <a class="link-item" href="">EN</a>
                                            <a class="link-item" href="">DE</a>
                                            <a class="link-item" href="">RU</a>
                                            <a class="link-item" href="">ES</a>
                                            <a class="link-item" href="">FR</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="top-right-hd">
                            <ul>
                                <li class="dropdown">
                                    <a href="" class="icon14 dropdown-toggle-no-caret" role="button"
                                        data-toggle="dropdown">
                                        <i class="fas fa-envelope"></i>
                                        <div class="circle-alrt"></div>
                                    </a>
                                    <div class="dropdown-menu message-dropdown dropdown-menu-right">
                                        <div class="user-request-list">
                                            <div class="request-users">
                                                <div class="user-request-dt">
                                                    <a href="">
                                                        <img src="{{ asset('frontend/images/user-dp-1.jpg') }}"
                                                            alt="">
                                                        <div class="user-title1">Jassica William </div>
                                                        <span>Hey How are you John Doe...</span>
                                                    </a>
                                                </div>
                                                <div class="time5">2 min ago</div>
                                            </div>
                                        </div>
                                        <div class="user-request-list">
                                            <div class="request-users">
                                                <div class="user-request-dt">
                                                    <a href=""><img
                                                            src="{{ asset('frontend/images/user-dp-1.jpg') }}"
                                                            alt="">
                                                        <div class="user-title1">Rock Smith </div>
                                                        <span>Interesting Event! I will join this...</span>
                                                    </a>
                                                </div>
                                                <div class="time5">5 min ago</div>
                                            </div>
                                        </div>
                                        <div class="user-request-list">
                                            <div class="request-users">
                                                <div class="user-request-dt">
                                                    <a href="{{ route('view.serviceuser.home') }}""><img
                                                            src="{{ asset('frontend/images/user-dp-1.jpg') }}"
                                                            alt="">
                                                        <div class="user-title1">Joy Doe </div>
                                                        <span>Hey Sir! What about you...</span>
                                                    </a>
                                                </div>
                                                <div class="time5">10 min ago</div>
                                            </div>
                                        </div>
                                        <div class="user-request-list">
                                            <a href="my_freelancer_messages.html" class="view-all">View All Messages</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="icon14 dropdown-toggle-no-caret" role="button"
                                        data-toggle="dropdown">
                                        <i class="fas fa-bell"></i>
                                        <div class="circle-alrt"></div>
                                    </a>
                                    <div class="dropdown-menu message-dropdown dropdown-menu-right">
                                        <div class="user-request-list">
                                            <div class="request-users">
                                                <div class="user-request-dt">
                                                    <a href="">
                                                        <div class="noti-icon"><i class="fas fa-users"></i></div>
                                                        <div class="user-title1">Rock William </div>
                                                        <span>applied for a <ins class="noti-p-link">Php
                                                                Developer</ins>.</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-request-list">
                                            <div class="request-users">
                                                <div class="user-request-dt">
                                                    <a href="">
                                                        <div class="noti-icon"><i class="fas fa-bullseye"></i></div>
                                                        <div class="user-title1">Johnson Smith</div>
                                                        <span>placed a bid on your <ins class="noti-p-link">I Need a
                                                                ...</ins></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-request-list">
                                            <div class="request-users">
                                                <div class="user-request-dt">
                                                    <a href="">
                                                        <div class="noti-icon"><i class="fas fa-exclamation"></i></div>

                                                        <span class="pt-2">Your job listing <ins
                                                                class="noti-p-link">Wordpress Developer</ins> is
                                                            expiring.</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-request-list">
                                            <a href="my_freelancer_notifications.html" class="view-all">View All
                                                Notifications</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="account order-1 dropdown">
                                        <a href="" class="account-link dropdown-toggle-no-caret" role="button"
                                            data-toggle="dropdown">
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
                                            <a class="link-item" href="{{ route('view.sudashboard') }}">Dashboard</a>
                                            <a class="link-item" href="{{ route('view.susetting') }}">Setting</a>
                                            <a class="link-item" href="{{ route('view.suorder.list') }}">Order
                                                List</a>
                                            <a class="link-item" href="{{ route('view.sumessages') }}">My
                                                Messages</a>
                                            {{-- <a class="link-item" href="my_freelancer_bids.html">My Bids</a>
                                            <a class="link-item" href="my_freelancer_portfolio.html">My Portfolio</a>
                                            <a class="link-item" href="my_freelancer_bookmarks.html">My Bookmarks</a>
                                            <a class="link-item" href="my_freelancer_payments.html">Payments</a> --}}
                                            <a class="link-item" href="{{ route('logout') }}">Logout</a>
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
                        <a class="order-1 order-lg-0 ml-lg-0 ml-3 mr-auto"
                            href="{{ route('view.serviceuser.home') }}">
                            <img style="width: 100px;" src="{{ asset('frontend/images/jobuy-logo.png') }}"
                                alt="">
                        </a>
                        <button class="navbar-toggler align-self-start" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-self-stretch">
                                <li class="nav-item {{ request()->routeIs('view.home') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('view.serviceuser.home') }}">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>



                                {{-- <li class="nav-item  {{ request()->routeIs('view.service.list') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('view.service.list')}}">Find Service <span class="sr-only"></span></a>
                                </li> --}}

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('view.serviceuser.about') }}">About <span
                                            class="sr-only"></span></a>
                                </li>
                            </ul>
                            <a href="{{ route('view.service.section') }}" class="add-post">Post a Service</a>
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
