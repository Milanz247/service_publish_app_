@extends('frontend.master')
@section('frontend')
    <main class="body-section">
        <div class="Search-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-3 col-12">
                        <div class="form-group mb-0">
                            <input class="search-1" type="text" placeholder="Keywords (e.g. Job Title, Position...)">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="form-group mb-0 mt-15">
                            <input class="search-1" type="text" placeholder="Location (e.g. City, Country...)">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 mt-15">
                        <div class="form-group mb-0">
                            <input class="search-1" type="text" placeholder="Industry (e.g. Design, Art...)">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12 mt-15">
                        <button class="srch-btn" type="submit">Search Now</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="banner-slider">
            <div class="owl-carousel bnnr-owl owl-theme">
                @foreach ($slider as $slider)
                    <div class="item">
                        <div class="featured-cities">
                            <a href="">
                                <div class="feature-img">
                                    <img src="{{ asset('images/slider/' . $slider->photo_name) }}" class="img-thumbnail"
                                        alt="Cinque Terre">
                                    <div class="overly-bg"></div>
                                </div>
                            </a>
                            <a href="">
                                <div class="featured-text">
                                    <div class="city-title">{{ $slider->title }}</div>
                                    <ins>125 Jobs</ins>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>









        <div class="achivements">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="achive-text">3M Registered Members</div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="achive-text">786k Jobs Found</div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="achive-text">1.2K Best Companies</div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="achive-text">1.2K Best Companies</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="we-offers">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="main-heading">
                            <h2>What We Offers</h2>
                            <span>Offering the Best Deal</span>
                            <div class="line-shape1">
                                <img src="{{ asset('frontend/images/line.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="offer-step">
                            <div class="offer-text-dt">
                                <h4>Searching the Best Jobs</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum commodo mi.</p>
                                <a href="index.html#">Read More<i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="offer-step">
                            <div class="offer-text-dt">
                                <h4>Apply for a Good Service</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum commodo mi.</p>
                                <a href="index.html#">Read More<i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="offer-step">
                            <div class="offer-text-dt">
                                <h4>More Quality Hires</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum commodo mi.</p>
                                <a href="index.html#">Read More<i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="offer-step">
                            <div class="offer-text-dt">
                                <h4>Choose Working Hours</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum commodo mi.</p>
                                <a href="index.html#">Read More<i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="all-categories">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="main-heading">
                            <h2>Choose Category</h2>
                            <span>Find quality talent or agencies</span>
                            <div class="line-shape1">
                                <img src="{{ asset('frontend/images/line.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="job-categories mt-30">
                            <div class="row no-gutters">

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-5.svg') }}"
                                                alt="">
                                            <span>Web, Mobile &amp; Software Dev</span>
                                            <p>150 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-2.svg') }}"
                                                alt="">
                                            <span>Data Science &amp; Analytics</span>
                                            <p>120 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-3.svg') }}"
                                                alt="">
                                            <span>Admin Support</span>
                                            <p>290 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-4.svg') }}"
                                                alt="">
                                            <span>Design &amp; Creative</span>
                                            <p>250 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-11.svg') }}"
                                                alt="">
                                            <span>Accounting &amp; Consulting</span>
                                            <p>350 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-13.svg') }}"
                                                alt="">
                                            <span>Writing</span>
                                            <p>90 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-14.svg') }}"
                                                alt="">
                                            <span>Legal</span>
                                            <p>250 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-15.svg') }}"
                                                alt="">
                                            <span>IT &amp; Networking</span>
                                            <p>150 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-9.svg') }}"
                                                alt="">
                                            <span>Sales &amp; Marketing</span>
                                            <p>110 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-16.svg') }}"
                                                alt="">
                                            <span>Customer Service</span>
                                            <p>310 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-17.svg') }}"
                                                alt="">
                                            <span>Translation</span>
                                            <p>410 Jobs</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-category">
                                        <a href="index.html#" title="">
                                            <img src="{{ asset('frontend/images/homepage/categories/icon-7.svg') }}"
                                                alt="">
                                            <span>Engineering &amp; Architecture</span>
                                            <p>190 Jobs</p>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="featured-candidates">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="main-heading">
                            <h2>Featured Candidates</h2>
                            <span>Discover, Intelligent, Experienced, Professional, Trustworthy, Freelancer & Full Time
                                Candidates.</span>
                            <div class="line-shape1">
                                <img src="{{ asset('frontend/images/line.svg') }}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-12">
                        <div class="lts-jobs-slider">
                            <div class="owl-carousel jobs-owl owl-theme">
                                @foreach ($foundUsers as $user)
                                    <div class="item">
                                        <div class="job-item">
                                            <div class="job-top-dt1 text-center">
                                                <div class="job-center-dt">
                                                    <img src="{{ asset('images/user_profile/' . $user->image) }}"
                                                        alt="">
                                                    <div class="job-urs-dts">
                                                        <a href="index.html#">
                                                            <h4>{{ $user->fname }} {{ $user->lname }}
                                                            </h4>
                                                        </a>
                                                        <span>Member Since:
                                                            {{ \Carbon\Carbon::parse($user->member_since)->format('M d, Y') }}</span>
                                                        <div class="avialable">Available Full Time</div>
                                                    </div>
                                                </div>
                                                <div class="job-price hire-price">{{ $user->pay_rate }}/hr</div>
                                            </div>
                                            <div class="rating-location">
                                                <div class="left-rating">
                                                    <div class="rtitle">Rating</div>
                                                    <div class="star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>4.9</span>
                                                    </div>
                                                </div>
                                                <div class="right-location">
                                                    <div class="text-left">
                                                        <div class="rtitle">Location</div>
                                                        <span><i style="color: orangered"
                                                                class="fas fa-map-marker-alt"></i>
                                                            {{ $user->location }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-buttons">
                                                <ul class="link-btn">
                                                    <li><a href="{{ route('view.service.profile', $user->id) }}"
                                                            class="link-j1" title="View Profile">View Profile</a></li>
                                                    <li>
                                                        {{-- <a href="index.html#" class="link-j1" title="Hire Me">Hire Me</a> --}}

                                                        <a data-toggle="modal" data-target="#exampleModalScrollable"
                                                            class="link-j1"> Hire Me</a>


                                                    </li>

                                                    <li class="bkd-pm"><button class="bookmark1" title="bookmark"
                                                            data-toggle="modal" data-target="#exampleModalScrollable"><i
                                                                class="fas fa-heart"></i></button></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            {{-- <div class="text-center">
                                <button class="view-links" onclick="window.location.href = '#';">SEE ALL
                                    CANDIDATES</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="all-categories">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="main-heading text-left">
                            <h2>Post Jobs</h2>
                            <span>Quick and easy way to advertise.</span>
                            <div class="line-shape1">
                                <img src="{{ asset('frontend/images/line.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="text152">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu purus et diam blandit
                                vehicula sit amet sed metus. Fusce condimentum non neque at fringilla.</p>
                        </div>
                        <div class="text-steps">
                            <div class="text-step1">
                                <div class="btext-heading">
                                    <i class="far fa-check-circle"></i>Hire for your company.
                                </div>
                                <p>Aenean malesuada aliquet tincidunt. Nam a nisl mi. Fusce ornare fermentum enim, id
                                    interdum velit posuere quis.
                                <p>
                            </div>
                            <div class="text-step1">
                                <div class="btext-heading">
                                    <i class="far fa-check-circle"></i>Daily out reach to qualified matches.
                                </div>
                                <p>Aenean malesuada aliquet tincidunt. Nam a nisl mi. Fusce ornare fermentum enim, id
                                    interdum velit posuere quis.
                                <p>
                            </div>
                            <div class="btns15">
                                <button class="btn-152" onclick="window.location.href = 'post_a_job.html';">Post a
                                    Job</button>
                                <button class="btn-153" onclick="window.location.href = '#';">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="main-heading text-left mt-80">
                            <h2>Talented Candidates</h2>
                            <span>Get discoverd by companies looking to hire remote.</span>
                            <div class="line-shape1">
                                <img src="{{ asset('frontend/images/line.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="text152">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu purus et diam blandit
                                vehicula sit amet sed metus. Fusce condimentum non neque at fringilla.</p>
                        </div>
                        <div class="text-steps">
                            <div class="text-step1">
                                <div class="btext-heading">
                                    <i class="far fa-check-circle"></i>Get your profile listed.
                                </div>
                                <p>Aenean malesuada aliquet tincidunt. Nam a nisl mi. Fusce ornare fermentum enim, id
                                    interdum velit posuere quis.
                                <p>
                            </div>
                            <div class="text-step1">
                                <div class="btext-heading">
                                    <i class="far fa-check-circle"></i>Customize your profile.
                                </div>
                                <p>Aenean malesuada aliquet tincidunt. Nam a nisl mi. Fusce ornare fermentum enim, id
                                    interdum velit posuere quis.
                                <p>
                            </div>
                            <div class="btns15">
                                <button class="btn-152" onclick="window.location.href = 'browse_freelancers.html';">Get
                                    Listed</button>
                                <button class="btn-153" onclick="window.location.href = '#';">Learn More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
