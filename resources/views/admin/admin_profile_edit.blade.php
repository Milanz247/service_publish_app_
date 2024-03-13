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
            <div class="col-xl-6 col-lg-8">
                <div class="card  card-bx m-b30">
                    <div class="card-header">
                        <h4 class="card-title">Account setup</h4>
                    </div>
                    <form class="profile-form" action="{{ route('admin.profile.update') }}" method="post"
                        enctype="multipart/form-data">
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
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Upload Files</label>
                                    <input class="form-control" type="file" name="image" id="inputImage">
                                </div>

                                <div class="col-sm-6 m-b30">
                                    <div id="previewImg"></div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4">
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
            </div>





        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#inputImage').change(function(event) {
                var preview = $('#previewImg');
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function() {
                    var imgElement = $('<img>').attr('src', reader.result).css({
                        'max-width': '100%',
                        'max-height': '200px'
                    });
                    preview.empty().append(imgElement);
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
