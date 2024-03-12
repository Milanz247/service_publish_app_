@extends('frontend.master')
@section('frontend')
    <div class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="title-bar-text">
                        <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign In</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Start -->
    <!-- Body Start -->
    <main class="browse-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="lg_form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="main-heading">
                                <h2>Sign in to Jobby</h2>
                                <div class="line-shape1">
                                    <img src="images/line.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label15">Email Address*</label>
                                <input class="job-input" id="email" type="email" name="email" required
                                    placeholder="Enter Email Address" id="email" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username">
                            </div>
                            <div class="form-group">
                                <label class="label15">Password*</label>
                                <input type="password" name="password" id="password" class="job-input"
                                    placeholder="Enter Password" type="password" name="password" id="password">
                            </div>
                            <button class="lr_btn" type="submit">Sign in
                                Now</button>
                            <div class="done145">
                                <div class="done146">
                                    Need an account?<a href="{{ route('select.profile')}}">Join us Now<i
                                            class="fas fa-angle-double-right"></i></a>
                                </div>
                                <div class="done147">
                                    <a href="forgot_password.html">Forgot Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
