@extends('serviceuser.master')
@section('serviceuser')
    <div class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="title-bar-text">
                        <li class="breadcrumb-item"><a href="{{ route('view.serviceuser.home')}}"">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <main class="browse-section">
        <div class="container">
            <div class="row">

                @include('serviceuser.tools.profile_sidebar')


                <div class="col-lg-9 col-md-8 mainpage">

                    @include('serviceuser.tools.profile_header')

                    @include('serviceuser.tools.profile_navigation')

                    @yield('profile')

                </div>
            </div>
        </div>
    </main>
@endsection
