@extends('user.master')
@section('user')
    <div class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="title-bar-text">
                        <li class="breadcrumb-item"><a href="{{ route('view.user.home')}}"">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <main class="browse-section">
        <div class="container">
            <div class="row">

                {{-- @include('serviceuser.tools.profile_sidebar') --}}


                <div class="col-lg-12 col-md-8 mainpage">

                    @include('user.tools.profile_header')

                    @include('user.tools.profile_navigation')

                    @yield('profile')

                </div>
            </div>
        </div>
    </main>
@endsection
