@extends('serviceuser.user_profile_master')
@section('profile')
    <div class="jobs_manage">
        <div class="row">
            <div class="col-lg-3">
                <div class="jobs_tabs">
                    <ul class="nav job_nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" href="#manage_jobs" id="manage-job-tab" data-toggle="tab">New
                                Orders</a>
                        </li>
                        <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#applied_jobs" id="applied-job-tab" data-toggle="tab">Complete
                                Orders</a>
                        </li>
                        <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#applied_candidates" id="applied-candidate-tab"
                                data-toggle="tab">Decline Orders</a>
                        </li>
                        <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#post_job" id="post-job-tab" data-toggle="tab">Post a Job</a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="manage_jobs" role="tabpanel">
                        <div class="view_chart">
                            {{-- <div class="view_chart_header">
                            <h4>Manage Jobs</h4>
                        </div> --}}
                            <div class="job_bid_body">
                                <ul class="all_applied_jobs jobs_bookmarks">
                                    @foreach ($neworders as $neworders)
                                        <li>
                                            <div class="applied_item">
                                                <a href="my_freelancer_jobs.html#">{{ $neworders->title }}</a>
                                                <span class="badge badge-primary"
                                                    style="font-size: 12px;">{{ $neworders->status }}</span>
                                                <ul class="view_dt_job">
                                                    @if ($neworders->urgent_job == 1)
                                                        <li>
                                                            <div class="vw1254">
                                                                <i class="far fa-clock text-danger"></i>
                                                                <!-- Assuming 'text-danger' is a Bootstrap class for red color -->
                                                                <span class="badge badge-danger">Urgent</span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                    @php
                                                        $date = $neworders->schedule_date;

                                                        $formatted_date = date('j F Y', strtotime($date));

                                                    @endphp
                                                    @if ($neworders->schedule_job == 1)
                                                        <li>
                                                            <div class="vw1254">
                                                                <i class="far fa-clock"></i>
                                                                <span>Scheduled Date:
                                                                    {{ $formatted_date }}</span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <div class="vw1254">
                                                            <i class="far fa-caret-square-right"></i>
                                                            <span>Category :
                                                                {{ $neworders->subcategory->name }}</span>
                                                        </div>
                                                    </li>

                                                    <input type="hidden" value=" {{ $neworders->id }}" id="order_id">

                                                </ul>
                                                <div class="btn_link23">
                                                    <button id="accept_bt" class="apled_btn60">Accept</button>

                                                    <button id="decline_bt" class="apled_btn123">Decline</button>


                                                    <button id="view_bt" class="apled_btn124" data-toggle="modal"
                                                        data-target="#staticBackdrop">view</button>

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="applied_jobs">
                        <div class="view_chart">
                            <div class="view_chart_header">
                                <h4>Applied Jobs</h4>
                            </div>
                            <div class="job_bid_body">
                                <ul class="all_applied_jobs jobs_bookmarks">
                                    <li>
                                        <div class="applied_item">
                                            <a href="my_freelancer_jobs.html#">Wordpress Developer</a>
                                            <ul class="view_dt_job">
                                                <li>
                                                    <div class="vw1254"><i class="fas fa-map-marker-alt"></i>Australia
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="fas fa-briefcase"></i>Full Time</div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="far fa-money-bill-alt"></i>$599 - Manual
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="far fa-clock"></i>1 day ago</div>
                                                </li>
                                            </ul>
                                            <div class="btn_link23">
                                                <button class="apled_btn50">Applied</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="applied_item">
                                            <a href="my_freelancer_jobs.html#">Front End Developer</a>
                                            <ul class="view_dt_job">
                                                <li>
                                                    <div class="vw1254"><i class="fas fa-map-marker-alt"></i>Australia
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="fas fa-briefcase"></i>Part Time</div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="far fa-money-bill-alt"></i>$50 / hr
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="far fa-clock"></i>2 day ago</div>
                                                </li>
                                            </ul>
                                            <div class="btn_link23">
                                                <button class="apled_btn50">Applied</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="applied_item">
                                            <a href="my_freelancer_jobs.html#">Back End Developer</a>
                                            <ul class="view_dt_job">
                                                <li>
                                                    <div class="vw1254"><i class="fas fa-map-marker-alt"></i>India</div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="fas fa-briefcase"></i>Full Time</div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="far fa-money-bill-alt"></i>$1200 - Fixed
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="far fa-clock"></i>4 day ago</div>
                                                </li>
                                            </ul>
                                            <div class="btn_link23">
                                                <button class="apled_btn50">Applied</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="applied_item">
                                            <a href="my_freelancer_jobs.html#">Ui / UX Designer</a>
                                            <ul class="view_dt_job">
                                                <li>
                                                    <div class="vw1254"><i class="fas fa-map-marker-alt"></i>Australia
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="fas fa-briefcase"></i>Part Time</div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="far fa-money-bill-alt"></i>$50 / hr
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="vw1254"><i class="far fa-clock"></i>2 day ago</div>
                                                </li>
                                            </ul>
                                            <div class="btn_link23">
                                                <button class="apled_btn50">Applied</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="applied_candidates">
                        <div class="view_chart">
                            <div class="view_chart_header">
                                <h4>Applied Candidates</h4>
                            </div>
                            <div class="job_bid_body">
                                <ul class="all_applied_jobs jobs_bookmarks">
                                    <li>
                                        <div class="applied_candidates_item">
                                            <div class="applied_candidates_dt">
                                                <div class="candi_img">
                                                    <img src="images/homepage/candidates/img-1.jpg" alt="">
                                                </div>
                                                <div class="candi_dt">
                                                    <a href="my_freelancer_jobs.html#">John Doe</a>
                                                    <div class="candi_cate">UX Designer</div>
                                                    <div class="rating_candi">Rating
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <span>4.9</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn_link24">
                                                <button class="apled_btn50">Download CV</button>
                                                <button class="apled_btn70">Message</button>
                                                <a href="my_freelancer_jobs.html#" class="delete_icon1"><i
                                                        class="far fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="applied_candidates_item">
                                            <div class="applied_candidates_dt">
                                                <div class="candi_img">
                                                    <img src="images/homepage/candidates/img-2.jpg" alt="">
                                                </div>
                                                <div class="candi_dt">
                                                    <a href="my_freelancer_jobs.html#">Rock William</a>
                                                    <div class="candi_cate">Front End Developer</div>
                                                    <div class="rating_candi">Rating
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <span>4.9</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn_link24">
                                                <button class="apled_btn50">Download CV</button>
                                                <button class="apled_btn70">Message</button>
                                                <a href="my_freelancer_jobs.html#" class="delete_icon1"><i
                                                        class="far fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="post_job" role="tabpanel">
                        <div class="view_chart">
                            <div class="view_chart_header">
                                <h4>Post a Job</h4>
                            </div>
                            <div class="post_job_body">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="label15">Job Name*</label>
                                                <input type="text" class="job-input" placeholder="Job Name Here">
                                            </div>
                                            <div class="form-group">
                                                <label class="label15">Job Description*</label>
                                                <textarea class="textarea_input" placeholder="Type Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="requires">
                                                What are the job requirements
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="label15">Job Type*</label>
                                                <div class="ui fluid search selection dropdown skills-search">
                                                    <input name="tags" type="hidden" value="">
                                                    <i class="dropdown icon"></i>
                                                    <input class="search" autocomplete="off" tabindex="0">
                                                    <span class="sizer" style=""></span>
                                                    <div class="default text">Select a job</div>
                                                    <div class="menu transition hidden" tabindex="-1">
                                                        <div class="item selected" data-value="Job1">Job Type 01</div>
                                                        <div class="item" data-value="Job2">Job Type 02</div>
                                                        <div class="item" data-value="Job3">Job Type 03</div>
                                                        <div class="item" data-value="Job4">Job Type 04</div>
                                                        <div class="item" data-value="Job5">Job Type 05</div>
                                                        <div class="item" data-value="Job6">Job Type 06</div>
                                                        <div class="item" data-value="Job7">Job Type 07</div>
                                                        <div class="item" data-value="Job8">Job Type 08</div>
                                                        <div class="item" data-value="Job9">Job Type 09</div>
                                                        <div class="item" data-value="Job10">Job Type 10</div>
                                                        <div class="item" data-value="Job11">Job Type 11</div>
                                                        <div class="item" data-value="Job12">Job Type 12</div>
                                                        <div class="item" data-value="Job13">Job Type 13</div>
                                                        <div class="item" data-value="Job14">Job Type 14</div>
                                                        <div class="item" data-value="Job15">Job Type 15</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="label15">Job Category*</label>
                                                <div class="ui fluid search selection dropdown skills-search">
                                                    <input name="tags" type="hidden" value="">
                                                    <i class="dropdown icon"></i>
                                                    <input class="search" autocomplete="off" tabindex="0">
                                                    <span class="sizer" style=""></span>
                                                    <div class="default text">Select Category</div>
                                                    <div class="menu transition hidden" tabindex="-1">
                                                        <div class="item selected" data-value="Job1">Category 01</div>
                                                        <div class="item" data-value="Category2">Category 02</div>
                                                        <div class="item" data-value="Category3">Category 03</div>
                                                        <div class="item" data-value="Category4">Category 04</div>
                                                        <div class="item" data-value="Category5">Category 05</div>
                                                        <div class="item" data-value="Category6">Category 06</div>
                                                        <div class="item" data-value="Category7">Category 07</div>
                                                        <div class="item" data-value="Category8">Category 08</div>
                                                        <div class="item" data-value="Category9">Category 09</div>
                                                        <div class="item" data-value="Category10">Category 10</div>
                                                        <div class="item" data-value="Category11">Category 11</div>
                                                        <div class="item" data-value="Category12">Category 12</div>
                                                        <div class="item" data-value="Category13">Category 13</div>
                                                        <div class="item" data-value="Category14">Category 14</div>
                                                        <div class="item" data-value="Category15">Category 15</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="label15">Availability*</label>
                                                <div class="ui fluid search selection dropdown skills-search">
                                                    <input name="tags" type="hidden" value="">
                                                    <i class="dropdown icon"></i>
                                                    <input class="search" autocomplete="off" tabindex="0">
                                                    <span class="sizer" style=""></span>
                                                    <div class="default text">I’m not sure</div>
                                                    <div class="menu transition hidden" tabindex="-1">
                                                        <div class="item selected" data-value="Availability1">Full Time
                                                        </div>
                                                        <div class="item selected" data-value="Availability2">Part Time
                                                        </div>
                                                        <div class="item selected" data-value="Availability3">Not
                                                            Available</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="label15">Experience Level*</label>
                                                <div class="ui fluid search selection dropdown skills-search">
                                                    <input name="tags" type="hidden" value="">
                                                    <i class="dropdown icon"></i>
                                                    <input class="search" autocomplete="off" tabindex="0">
                                                    <span class="sizer" style=""></span>
                                                    <div class="default text">Select Experience Level</div>
                                                    <div class="menu transition hidden" tabindex="-1">
                                                        <div class="item" data-value="level1">level 01</div>
                                                        <div class="item" data-value="level2">level 02</div>
                                                        <div class="item" data-value="level3">level 03</div>
                                                        <div class="item" data-value="level4">level 04</div>
                                                        <div class="item" data-value="level5">level 05</div>
                                                        <div class="item" data-value="level6">level 06</div>
                                                        <div class="item" data-value="level7">level 07</div>
                                                        <div class="item" data-value="level8">level 08</div>
                                                        <div class="item" data-value="level9">level 09</div>
                                                        <div class="item" data-value="level10">level 10</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="label15">Salary Min*</label>
                                                <div class="smm_input">
                                                    <input type="text" class="job-input" placeholder="Min">
                                                    <div class="mix_max">Usd</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="label15">Salary Max*</label>
                                                <div class="smm_input">
                                                    <input type="text" class="job-input" placeholder="Max">
                                                    <div class="mix_max">Usd</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="label15">Location*</label>
                                                <div class="smm_input">
                                                    <input type="text" class="job-input" placeholder="Type Address">
                                                    <div class="loc_icon"><i class="fas fa-map-marker-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="label15">Languages*</label>
                                                <div class="ui fluid search selection dropdown skills-search">
                                                    <input name="tags" type="hidden" value="">
                                                    <i class="dropdown icon"></i>
                                                    <input class="search" autocomplete="off" tabindex="0">
                                                    <span class="sizer" style=""></span>
                                                    <div class="default text">Select Language</div>
                                                    <div class="menu transition hidden" tabindex="-1">
                                                        <div class="item" data-value="lang1">English</div>
                                                        <div class="item" data-value="lang2">Hindi</div>
                                                        <div class="item" data-value="lang3">Punjabi</div>
                                                        <div class="item" data-value="lang4">Bengali</div>
                                                        <div class="item" data-value="lang5">Portuguese</div>
                                                        <div class="item" data-value="lang6">Russian</div>
                                                        <div class="item" data-value="lang7">Japanese</div>
                                                        <div class="item" data-value="lang8">Telugu</div>
                                                        <div class="item" data-value="lang9">French</div>
                                                        <div class="item" data-value="lang10">German</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="label15">Skills*</label>
                                                <div class="ui fluid multiple search selection dropdown skills-search">
                                                    <input name="tags" type="hidden" value="">
                                                    <i class="dropdown icon"></i>
                                                    <input class="search" autocomplete="off" tabindex="0"><span
                                                        class="sizer"></span><span class="sizer" style=""></span>
                                                    <div class="default text">Skills</div>
                                                    <div class="menu transition hidden" tabindex="-1">
                                                        <div class="item selected" data-value="angular">Angular</div>
                                                        <div class="item" data-value="css">CSS</div>
                                                        <div class="item" data-value="design">Graphic Design</div>
                                                        <div class="item" data-value="ember">Ember</div>
                                                        <div class="item" data-value="html">HTML</div>
                                                        <div class="item" data-value="ia">Information Architecture</div>
                                                        <div class="item" data-value="javascript">Javascript</div>
                                                        <div class="item" data-value="mech">Mechanical Engineering</div>
                                                        <div class="item" data-value="meteor">Meteor</div>
                                                        <div class="item" data-value="node">NodeJS</div>
                                                        <div class="item" data-value="plumbing">Plumbing</div>
                                                        <div class="item" data-value="python">Python</div>
                                                        <div class="item" data-value="rails">Rails</div>
                                                        <div class="item" data-value="react">React</div>
                                                        <div class="item" data-value="repair">Kitchen Repair</div>
                                                        <div class="item" data-value="ruby">Ruby</div>
                                                        <div class="item" data-value="ui">UI Design</div>
                                                        <div class="item" data-value="ux">User Experience</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="label15">Upload Files*</label>
                                                <div class="image-upload-wrap1">
                                                    <input class="file-upload-input1" id="file2" type="file"
                                                        onchange="readURL(this);" accept="image/*">
                                                    <div class="drag-text1">
                                                        Upload Files
                                                    </div>
                                                </div>
                                                <p class="upload_dt">Images, Pdf and MS Word Filess</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button class="post_jp_btn" type="submit">Post a Job</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="jb_frm">

                        <div class="row">
                            <div class="col-md-12">
                                <label class="label15">TITLE : </label>
                                <label class="label15" id="title"></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="label15">LOCATION : </label>
                                <label class="label15" id="location"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label15">USER : </label>
                                <label class="label15" id="user"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label15">REGISTRATION : </label>
                                <label class="label15" id="category"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label15">USER : </label>
                                <label class="label15">job_subcategory</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label15">Description : </label>
                                <label class="label15">job_subcategory</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label15">urgent_job OR SHEDUL : </label>
                                <label class="label15">job_subcategory</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label15">budget : </label>
                                <label class="label15">job_subcategory</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#accept_bt').click(function() {
                var orderId = $('#id').val();
                $.ajax({
                    url: '/serviceuser/accept-service',
                    type: 'POST',
                    data: {
                        id: orderId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toster(response.alerttype, response.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1400);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });



            $('#decline_bt').click(function() {
                var orderId = $('#id').val();
                $.ajax({
                    url: '/serviceuser/decline-service',
                    type: 'POST',
                    data: {
                        id: orderId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toster(response.alerttype, response.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1400);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
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
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.apled_btn124').click(function() {
                var id = $(this).closest('.applied_item').find('#order_id').val();
                console.log(id);

                $.ajax({
                    url: '/serviceuser/get-data',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        console.log(response);
                        $('#title').text(response.title);
                        $('#location').text(response.location);
                        $('#user').text(response.user.name);
                        $('#category').text(response.subcategory.name);
                        $('#budget').text(response.budget);



                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
