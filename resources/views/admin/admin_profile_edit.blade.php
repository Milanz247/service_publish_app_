@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="clearfix">
                    <div class="card card-bx author-profile m-b30">
                        <div class="card-body">
                            <div class="p-5">
                                <div class="author-profile">
                                    <div class="author-media">
                                        <img src="images/profile/pic1.jpg" alt="">
                                        <div class="upload-link" title="" data-bs-toggle="tooltip"
                                            data-placement="right" data-original-title="update">
                                            <input type="file" class="update-flie">
                                            <i class="fa fa-camera"></i>
                                        </div>
                                    </div>
                                    <div class="author-info">
                                        <h6 class="title">John</h6>
                                        <span>Developer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-list">
                                <ul>
                                    <li><a href="app-profile.html">Models</a><span>36</span></li>
                                    <li><a href="app-profile.html">Gallery</a><span>3</span></li>
                                    <li><a href="app-profile.html">Lessons</a><span>1</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group mb-3">
                                <div class="form-control rounded text-center">Portfolio</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8">
                <div class="card  card-bx m-b30">
                    <div class="card-header">
                        <h4 class="card-title">Account setup</h4>
                    </div>
                    <form class="profile-form" action="{{ route('admin.profile.update') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="lname" value="{{ $admin->lname }}" class="form-control">
                                </div>

                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Gender</label>
                                    <div
                                        class="dropdown bootstrap-select nice-select default-select form-control wide mh-auto dropup">
                                        <select name="gender" class="nice-select default-select form-control wide mh-auto">
                                            <option value="Male" @if ($admin->gender == 'Male') selected @endif>Male
                                            </option>
                                            <option value="Female" @if ($admin->gender == 'Female') selected @endif>Female
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 m-b30">
                                    <div class="example">
                                        <label class="form-label">Birth</label>
                                        <input class="form-control " type="date" name="birth"
                                            value="{{ $admin->birth }}" id="birth">
                                    </div>
                                </div>

                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $admin->phone }}">
                                </div>

                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Email adress</label>
                                    <input type="text" class="form-control" name="email" value="{{ $admin->email }}">
                                </div>


                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- <div class="col-xl-3 col-lg-4">
                <div class="card  card-bx m-b30">
                    <div class="card-header">
                        <h4 class="card-title">Change Password</h4>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" placeholder="Password"
                                        name="current_password">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" placeholder="New Password"
                                        name="current_password">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder=" Confirm Password"
                                        name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div> --}}





        </div>
    </div>
@endsection
