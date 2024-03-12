@extends('frontend.master')
@section('frontend')
    <div class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="title-bar-text">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign In</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Start -->
    <main class="browse-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heading">
                        <h2>Sign Up</h2>
                        <div class="line-shape1">
                            <img src="images/line.svg" alt="">
                        </div>
                    </div>
                    <div class="choose_profile">
                        <h3>Choose Your Profile</h3>
                        <p>Which type of profile fits you best?</p>
                    </div>
                    <div class="plans150">
                        <div class="row justify-content-md-center">
                            <div class="col-lg-4 col-md-4">
                                <div class="plan_item">
                                    <div class="plan_icon1">
                                        <div class="cfp_icon">
                                            <img src="{{ asset('frontend/images/cp_icon.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <h4>Normal User</h4>
                                    <div class="plan_price1">
                                        <span>Start a Normal User Profile</span>
                                    </div>
                                    <ul class="plan_dt1">
                                        <li>
                                            <p>01. View Website And serch and find best service.</p>
                                        </li>
                                        <li>
                                            <p>2. Can Hire Sercies and apply and you can review to user</p>
                                        </li>
                                    </ul>
                                    <div class="plan_btn">
                                        <a href="{{ route('register.user', ['usertype' => 0]) }}">Next</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="plan_item">
                                    <div class="plan_icon1">
                                        <div class="cfp_icon">
                                            <img src="{{ asset('frontend/images/fp_icon.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <h4>Service User</h4>
                                    <div class="plan_price1">
                                        <span>Start a Service User Profile</span>
                                    </div>
                                    <ul class="plan_dt1">
                                        <li>
                                            <p>01. Login As a service user and register for the services and pushlish
                                                services.</p>
                                        </li>
                                        <li>
                                            <p>2. manage dashboard update profile and register for the multiple service .</p>
                                        </li>
                                    </ul>
                                    <div class="plan_btn">
                                        <a href="{{ route('register.user', ['usertype' => 1]) }}">Next</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
