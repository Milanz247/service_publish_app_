@extends('serviceuser.user_profile_master')
@section('profile')
    <div class="jobs_manage">
        <div class="row">
            <div class="col-lg-3">
                <div class="jobs_tabs">
                    <ul class="nav job_nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#my_profile" id="my-profile-tab" data-toggle="tab">My Profile</a>
                        </li>
                        {{-- <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#social_accounts" id="social-accounts-tab" data-toggle="tab">Social
                                Accounts</a>
                        </li> --}}
                        <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#change_password" id="change-password-tab" data-toggle="tab">Change
                                Password</a>
                        </li>
                        {{-- <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#delete_account" id="delete-account-tab" data-toggle="tab">Deactivate
                                Account</a>
                        </li> --}}
                    </ul>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="my_profile" role="tabpanel">
                        <div class="view_chart">
                            <div class="view_chart_header">
                                <h4>My Profile</h4>
                            </div>
                            <div class="post_job_body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="container mt-3 text-center">
                                            <h4>My Profile</h4>
                                            @if ($user->image)
                                                <img src="{{ asset('images/user_profile/' . $user->image) }}"
                                                    class="img-thumbnail" alt="Cinque Terre">
                                            @else
                                                <img src="{{ asset('images/profile/userd.png') }}" class="img-thumbnail"
                                                    alt="Cinque Terre">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <form action="{{ route('view.update.suprofile.image') }}" method="POST"
                                            id="image-upload" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label class="label15"> Upload Files</label>
                                                <input class="job-input" type="file" name="image" id="inputImage">
                                                <div class="text-left" style="margin-left:0; margin-top:15px;">
                                                    <button type="submit"
                                                        style="border: 0;
                                                                position: relative;
                                                                border-radius: 3px;
                                                                width: 120px;
                                                                height: 40px;
                                                                color: #ffffff;
                                                                font-family: 'Roboto', sans-serif;
                                                                font-weight: 500;
                                                                font-size: 12px;
                                                                background:#ff4500;">SAVE
                                                        IMAGE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label15">First Name*</label>
                                            <input type="text" value="{{ $user->fname }}" class="job-input"
                                                placeholder="Your First Name" id="fname">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label15">Last Name*</label>
                                            <input type="text" value="{{ $user->lname }}" class="job-input"
                                                placeholder="Your Last Name" id="lname">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label15">UserName*</label>
                                            <input type="text" value="{{ $user->name }}" class="job-input"
                                                placeholder="Your User Name" id="username">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label15">Email Address*</label>
                                            <input type="email" value="{{ $user->email }}" class="job-input"
                                                placeholder="Enter Your Email Address" id="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label15">Birthday*</label>
                                            <div class="smm_input">
                                                <input value="{{ $user->dob }}" type="text"
                                                    class="job-input datepicker-here" data-language="en"
                                                    placeholder="Enter Your Birth Date" id="dob">
                                                <div class="mix_max"><i class="fas fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label15">Location*</label>
                                            <div class="smm_input">
                                                <input type="text" value="{{ $user->location }}" id="location"
                                                    class="job-input" placeholder="Type Address">
                                                <div class="loc_icon"><i class="fas fa-crosshairs"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label15">Description*</label>
                                            <div class="description_dtu">
                                                <div class="description_actions">
                                                    <a href="my_freelancer_setting.html#"><i class="fas fa-bold"></i></a>
                                                    <a href="my_freelancer_setting.html#"><i
                                                            class="fas fa-italic"></i></a>
                                                    <a href="my_freelancer_setting.html#"><i
                                                            class="fas fa-list-ul"></i></a>
                                                    <a href="my_freelancer_setting.html#"><i
                                                            class="fas fa-list-ol"></i></a>
                                                </div>
                                                <textarea id="description" class="textarea70"
                                                    placeholder="Describe your experience, skills, etc. In complete details. This is your chance to show off.">{{ $user->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label15">Pay Rate ($/hr)*</label>
                                            <div class="smm_input">
                                                <input type="text" value="{{ $user->pay_rate }}" id="payrate"
                                                    class="job-input" placeholder="Enter Your Page Rate">
                                                <div class="mix_max">LKR</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label15">Phone*</label>
                                            <input type="number" value="{{ $user->phone }}" class="job-input"
                                                placeholder="Your Phone Number" id="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label15">Skill Category*</label>
                                            <div
                                                class="ui fluid multiple search selection dropdown skills-search skillget">
                                                <input id="tags" type="hidden" value="">
                                                @if ($user->skill_categories)
                                                    @foreach (json_decode($user->skill_categories, true) ?? [] as $skill_categories)
                                                        <a class="ui label transition visible"
                                                            data-value="{{ $skill_categories }}"
                                                            style="display: inline-block !important;">{{ $skill_categories }}<i
                                                                class="delete icon"></i></a>
                                                    @endforeach
                                                @endif


                                                <i class="dropdown icon"></i>
                                                <input class="search" autocomplete="off" tabindex="0"><span
                                                    class="sizer" style=""></span>
                                                <div class="default text">Skill Category</div>
                                                <div class="menu transition hidden" tabindex="-1">
                                                    @foreach ($subcategories as $subcategory)
                                                        <div class="item" data-value="{{ $subcategory->name }}">
                                                            {{ $subcategory->name }}
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label15">Languages*</label>
                                            <div
                                                class="ui fluid multiple search selection dropdown skills-search langu-get">
                                                <input id="tags" type="hidden" value="">

                                                @if (isset($user->languages))
                                                    @foreach (json_decode($user->languages, true) ?? [] as $lang)
                                                        <a class="ui label transition visible"
                                                            data-value="{{ $lang }}"
                                                            style="display: inline-block !important;">{{ $lang }}<i
                                                                class="delete icon"></i></a>
                                                    @endforeach
                                                @endif
                                                <i class="dropdown icon"></i>
                                                <input id="[]" class="search" autocomplete="off"
                                                    tabindex="0"><span class="sizer" style=""></span>
                                                <div class="default text">Select Language</div>
                                                <div class="menu transition hidden" tabindex="-1">
                                                    <div class="item" data-value="English">English</div>
                                                    <div class="item" data-value="Hindi">Tamil</div>
                                                    <div class="item" data-value="Punjabi">Sinhala</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button id="sendRequestButton" class="post_jp_btn" type="submit">SAVE
                                            CHANGES</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="social_accounts">
                        <div class="view_chart">
                            <div class="view_chart_header">
                                <h4>Social Accounts</h4>
                            </div>
                            <div class="social200">
                                <form>
                                    <ul>
                                        <li>
                                            <div class="social201">
                                                <input class="scl_input" type="text"
                                                    placeholder="Http://facebook.com/johndoe...">
                                                <div class="icon143 f1"><i class="fab fa-facebook-f"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="social201">
                                                <input class="scl_input" type="text"
                                                    placeholder="Http://twitter.com/johndoe...">
                                                <div class="icon143 t1"><i class="fab fa-twitter"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="social201">
                                                <input class="scl_input" type="text"
                                                    placeholder="Http://googleplus.com/johndoe...">
                                                <div class="icon143 go1"><i class="fab fa-google-plus-g"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="social201">
                                                <input class="scl_input" type="text"
                                                    placeholder="Http://youtube.com/johndoe...">
                                                <div class="icon143 y1"><i class="fab fa-youtube"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="social201">
                                                <input class="scl_input" type="text"
                                                    placeholder="Http://linkedin.com/johndoe...">
                                                <div class="icon143 l1"><i class="fab fa-linkedin-in l1"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="social201">
                                                <input class="scl_input" type="text"
                                                    placeholder="Http://instagram.com/johndoe...">
                                                <div class="icon143 i1"><i class="fab fa-instagram"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="social201">
                                                <input class="scl_input" type="text"
                                                    placeholder="Http://dribbble.com/johndoe...">
                                                <div class="icon143 d1"><i class="fab fa-dribbble d1"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="social201">
                                                <input class="scl_input" type="text"
                                                    placeholder="Http://behance.net/johndoe...">
                                                <div class="icon143 b1"><i class="fab fa-behance b1"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="social201">
                                                <input class="scl_input" type="text"
                                                    placeholder="Http://github.com/johndoe...">
                                                <div class="icon143 g1"><i class="fab fa-github g1"></i></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <button class="post_jp_btn" type="submit">SAVE CHANGES</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="change_password">
                        <div class="view_chart">
                            <div class="view_chart_header">
                                <h4>Change Password</h4>
                            </div>
                            <div class="post_job_body">
                                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('put') <div class="form-group">

                                        <label class="label15">Old Password*</label>
                                        <input class="job-input" id="update_password_current_password"
                                            name="current_password" type="password" autocomplete="current-password"
                                            placeholder="Enter Old Password">

                                    </div>

                                    <div class="form-group">
                                        <label class="label15">New Password*</label>
                                        <input class="job-input" placeholder="Enter New Password"
                                            id="update_password_password" name="password" type="password"
                                            autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label class="label15">Repeat New Password*</label>
                                        <input id="update_password_password_confirmation" name="password_confirmation"
                                            type="password" autocomplete="new-password"class="job-input"
                                            placeholder="Enter Repeat New Password">
                                    </div>
                                    <button class="post_jp_btn" type="submit">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="delete_account" role="tabpanel">
                        <div class="view_chart">
                            <div class="view_chart_header">
                                <h4>Deactivate Account</h4>
                            </div>
                            <div class="post_job_body">
                                <form>
                                    <div class="form-group">
                                        <label class="label15">Please Explain Further**</label>
                                        <textarea class="textarea_input" placeholder="Type"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="label15">Password*</label>
                                        <input type="password" class="job-input" placeholder="Enter Password">
                                    </div>
                                    <div class="email_chk">
                                        <div class="ui checkbox apply_check">
                                            <input type="checkbox">
                                            <label style="color:#242424 !important;">Email Option Out.</label>
                                        </div>
                                    </div>
                                    <button class="post_jp_btn" type="submit">Deactivate Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('#sendRequestButton').on('click', function() {

                var firstName = $("#fname").val();
                var lastName = $("#lname").val();
                var userName = $("#username").val();
                var emailAddress = $("#email").val();
                var location = $("#location").val();
                var description = $("#description").val();
                var phone = $("#phone").val();
                var payrate = $("#payrate").val();
                var website = $("#website").val();
                var whatsapp = $("#whatsapp").val();
                var facebook = $("#facebook").val();
                var dob = $("#dob").val();


                var selectedSkills = [];
                var selectedLanguages = [];

                $('.skillget .ui.label').each(function() {
                    var value = $(this).data('value');
                    selectedSkills.push(value);
                });

                $('.langu-get .ui.label').each(function() {
                    var value = $(this).data('value');
                    selectedLanguages.push(value);
                });

                var requestData = {
                    skill: selectedSkills,
                    lang: selectedLanguages,
                    firstName: firstName,
                    lastName: lastName,
                    userName: userName,
                    emailAddress: emailAddress,
                    description: description,
                    phone: phone,
                    payrate: payrate,
                    website: website,
                    whatsapp: whatsapp,
                    facebook: facebook,
                    location: location,
                    dob: dob,
                };

                $.ajax({
                    url: '/serviceuser/profile-update',
                    method: 'POST',
                    data: requestData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {


                        toster(response.alerttype, response.message)
                        setTimeout(function() {
                            window.location.reload();
                        }, 1400);

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            });
        });

        function toster(alerttype, message) {
            var type = alerttype;
            switch (type) {
                case 'info':
                    toastr.info(message);
                    break;

                case 'success':
                    toastr.success(message);
                    break;

                case 'warning':
                    toastr.warning(message);
                    break;

                case 'error':
                    toastr.error(message);
                    break;
            }
        }
    </script>
@endsection
