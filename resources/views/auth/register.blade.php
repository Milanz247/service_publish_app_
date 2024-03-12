@extends('frontend.master')
@section('frontend')
    <div class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="title-bar-text">
                        <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <main class="browse-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="lg_form">
                        <div class="main-heading">
                            <h2>Sign Up to Jobby</h2>
                            <div class="line-shape1">
                                <img src="images/line.svg" alt="">
                            </div>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" value="{{ $usertype }}" name="usertype">
                            <div class="form-group">
                                <label class="label15">Name*</label>
                                <input class="job-input" placeholder="Enter Name" id="name"type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            </div>

                            <div class="form-group">
                                <label class="label15">Email Address*</label>
                                <input class="job-input" placeholder="Enter Email Address" id="email" type="email"
                                    name="email" :value="old('email')" required autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>
                            <div class="form-group">
                                <label class="label15">Password*</label>
                                <input class="job-input" placeholder="Enter Password" id="password" type="password"
                                    name="password" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>
                            <div class="form-group">
                                <label class="label15">Confirm Password*</label>
                                <input class="job-input" placeholder="Enter Confirm Password" id="password_confirmation"
                                    type="password" name="password_confirmation" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />


                            </div>

                            <div class="ui checkbox apply_check check_out checked">
                                <input type="checkbox" tabindex="0" class="hidden">
                                <label style="color:#242424 !important;">I accept the Terms of Services</label>
                            </div>
                            <button class="lr_btn" type="submit">Sign Up
                                Now</button>

                        </form>

                        <div class="done140">
                            Already have an account?<a href="{{ route('login') }}">Sign in Now<i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
