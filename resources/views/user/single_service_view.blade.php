@extends('user.master')
@section('user')
    <div class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="title-bar-text">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Other Freelancer Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <main class="browse-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="account_dt_left">
                        <div class="job-center-dt">

                            <input type="hidden" name="suserid" value="{{ $user->id }}">

                            <img src="{{ asset('images/user_profile/' . $user->image) }}" alt="">


                            <div class="job-urs-dts">

                                <h4>{{ $user->fname }} {{ $user->lname }}</h4>


                                <span>Member since {{ $user->member_since }}
                                </span>



                                <div class="avialable">{{ $user->availability }}</div>


                            </div>
                            <ul class="user_btns">
                                <li> <button type="button" class="hire_btn" data-toggle="modal"
                                        data-target="#exampleModalScrollable">
                                        Hire Me
                                    </button></li>
                                <li><button class="hire_btn" type="button">Message</button></li>
                            </ul>
                        </div>
                        <div class="my_websites">
                            <ul>
                                <li><a href="other_freelancer_profile.html#" class="web_link"><i
                                            class="fas fa-phone"></i>{{ $user->phone }}</a></li>
                                <li><a href="other_freelancer_profile.html#" class="web_link"><i
                                            class="far fa-edit"></i>www.blogsite.com</a></li>
                            </ul>
                        </div>

                        <div class="rlt_section">
                            <div class="rtl_left">
                                <h6>Rating</h6>
                            </div>
                            <div class="rtl_right">
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
                        <div class="rlt_section">
                            <div class="rtl_left">
                                <h6>Location</h6>
                            </div>
                            <div class="rtl_right">
                                <span><i class="fas fa-map-marker-alt lc_icon"></i>{{ $user->location }}</span>
                            </div>

                            <ul class="rlt_section2">
                                <li>
                                    <div class="rtl_left2">
                                        <h6>Hourly Rate</h6>
                                    </div>
                                    <div class="rtl_right2">
                                        <span>$50 / hr</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="rtl_left2">
                                        <h6>Age</h6>
                                    </div>
                                    @php
                                        use Illuminate\Support\Carbon;
                                        $userBirthday = Auth::user()->dob;
                                        $userAge = Carbon::parse($userBirthday)->age;
                                    @endphp
                                    <div class="rtl_right2">
                                        <span>{{ $userAge }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="rtl_left2">
                                        <h6>Experenice</h6>
                                    </div>
                                    <div class="rtl_right2">
                                        <span>5 Year</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="rtl_left2">
                                        <h6>Job Done</h6>
                                    </div>
                                    <div class="rtl_right2">
                                        <span>85</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="social_section3 mb80">
                            <div class="social_leftt3">
                                <h6>Contact Social Account</h6>
                            </div>
                            <ul class="social_accounts">
                                <li><a href="other_freelancer_profile.html#" class="social_links"><i
                                            class="fab fa-facebook-f f1"></i>http://facebook.com/johndoe</a></li>
                                <li><a href="other_freelancer_profile.html#" class="social_links"><i
                                            class="fab fa-twitter t1"></i>http://twitter.com/johndoe</a></li>
                                <li><a href="other_freelancer_profile.html#" class="social_links"><i
                                            class="fab fa-linkedin-in l1"></i>http://linkedin.com/johndoe</a></li>

                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-9 col-md-8 mainpage">
                    <div class="account_tabs">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">

                                <a class="nav-link active" href="#Profile" id="manage-bids-tab"
                                    data-toggle="tab">Profile</a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="#Portfolio" id="manage-bidders-tab" data-toggle="tab">Services
                                </a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="#Reviews" id="manage-bidders-tab" data-toggle="tab">Reviews </a>
                            </li>
                        </ul>

                    </div>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="Profile" role="tabpanel">
                            <div class="view_chart">
                                <div class="view_chart_header">
                                    <h4>DESCRIPTION</h4>
                                </div>
                                <div class="view_chart_body">
                                    <p class="user_about_des">
                                        {{ $user->description }}
                                    </p>
                                </div>

                            </div>
                            <div class="view_chart">
                                <div class="view_chart_header">
                                    <h4>REGISTRATIONS</h4>
                                </div>
                                <div class="view_chart_body">

                                    <div class="job-skills">
                                        {{-- @foreach (json_decode($query->user->skill_categories, true) as $skill)
                                            <a href="my_freelancer_profile.html#">{{ $skill }}</a>
                                        @endforeach --}}

                                    </div>

                                </div>
                            </div>
                            <div class="view_chart">
                                <div class="view_chart_header">
                                    <h4>Language</h4>
                                </div>
                                <div class="view_chart_body">
                                    <div class="job-skills">

                                        @if (isset($user->languages))
                                            @foreach (json_decode($user->languages, true) ?? [] as $lang)
                                                <a class="more-skills"
                                                    data-value="{{ $lang }}">{{ $lang }}</a>
                                            @endforeach
                                        @endif



                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="Portfolio">
                            <div class="portfolio_heading">
                                <div class="portfolio_left">
                                    <div class="account_tabs">
                                        <ul class="nav nav-tabs">
                                            @foreach ($services as $service)
                                                <li class="nav-item">
                                                    @php
                                                        $tabId = str_replace(' ', '', $service->subcategory->name);
                                                    @endphp
                                                    <a class="nav-link @if ($loop->first) active @endif"
                                                        href="#{{ $tabId }}"
                                                        data-toggle="tab">{{ $service->subcategory->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content">
                                @foreach ($services as $service)
                                    @php
                                        $tabId = str_replace(' ', '', $service->subcategory->name);
                                    @endphp
                                    <div class="tab-pane fade @if ($loop->first) show active @endif"
                                        id="{{ $tabId }}" role="tabpanel">
                                        <div class="view_chart">
                                            <div class="view_chart_header">
                                                <h4>LOCATION</h4>
                                            </div>
                                            <div class="view_chart_body">
                                                <p class="user_about_des">
                                                    {{ $service->service_location }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="view_chart">
                                            <div class="view_chart_header">
                                                <h4>DESCRIPTION</h4>
                                            </div>
                                            <div class="view_chart_body">
                                                <p class="user_about_des">
                                                    {{ $service->description }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="portfolio_heading">
                                            <div class="portfolio_left">
                                                <h4>Portfolio</h4>
                                            </div>
                                        </div>
                                        <div class="dsh150 p-4">
                                            <div class="row">

                                                @foreach ($service->serviceImages as $img)
                                                    <div class="col-lg-4">
                                                        <div class="portfolio_item">
                                                            <div class="portfolio_img">
                                                                <img style="width: 260px; height:193px;"
                                                                    src="{{ asset($img->photo_name) }}" alt="">

                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="tab-pane fade" id="Reviews">
                            <div class="view_chart">
                                <div class="view_chart_header">
                                    <h4 class="mt-1">All Reviews</h4>
                                    <div class="review_right">
                                        <button class="add_review_btn" type="button" data-toggle="modal"
                                            data-target="#addreviewModal">Add Review</button>
                                    </div>
                                </div>
                                <div class="job_bid_body">
                                    <ul class="all_applied_jobs jobs_bookmarks">
                                        @foreach ($reviews as $review)
                                        <li>
                                            <div class="applied_candidates_item">
                                                <div class="row">
                                                    <div class="col-xl-7">
                                                        <div class="applied_candidates_dt">
                                                            <div class="candi_img">
                                                                @if ($review->user->image)
                                                                    <img src="{{ asset('images/user_profile/' . $review->user->image) }}"
                                                                        class="img-thumbnail" alt="Cinque Terre">
                                                                @else
                                                                    <img src="{{ asset('images/profile/userd.png') }}" class="img-thumbnail"
                                                                        alt="Cinque Terre">
                                                                @endif
                                                            </div>

                                                            <div class="candi_dt">
                                                                <a href="my_freelancer_reviews.html#">{{ $review->user->fname }}
                                                                    {{ $review->user->lname }}</a>
                                                                <div class="candi_cate"><span class="badge badge-secondary"
                                                                        style="font-size: 12px;">Reviewed
                                                                        {{ $review->created_at->diffInDays(now()) }} days ago
                                                                    </span></div>

                                                                <div class="rating_candi">Rating
                                                                    <div class="star">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= $review->rating)
                                                                                <i class="fas fa-star"></i>
                                                                            @else
                                                                                <i class="far fa-star"></i>
                                                                            @endif
                                                                        @endfor
                                                                        <span>{{ $review->rating }}</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn_link24 review_user">
                                                    @if ($review->description)
                                                        <p>{{ $review->description }}</p>
                                                    @else
                                                        <div class="text-center">
                                                            <span class="badge badge-dark" style="font-size: 13px; width:300px;">No
                                                                Comments</span>

                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                {{-- <div class="col-lg-9 col-md-8 mainpage">
                    <div class="account_tabs">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="other_freelancer_profile.html">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="other_freelancer_portfolio.html">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="other_freelancer_reviews.html">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="view_chart">
                        <div class="view_chart_header">
                            <h4>About</h4>
                        </div>
                        <div class="view_chart_body">
                            <p class="user_about_des">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis
                                accumsan mi. Nam nulla lorem, consectetur eu augue nec, laoreet viverra augue. Curabitur
                                quis nisi nec enim tempor tincidunt sit amet eu elit. Aliquam metus massa, vehicula vel nisi
                                quis, eleifend hendrerit velit. Maecenas nunc nunc, ultricies non accumsan sit amet, varius
                                non dui. Pellentesque ipsum justo, mollis et posuere at, viverra porta nisl. Cras accumsan
                                cursus tellus luctus congue. Maecenas sed feugiat dolor. In ipsum sapien, congue vitae
                                congue ac, cursus nec mauris. Integer fringilla mi urna, id efficitur ligula interdum quis.
                                Ut vehicula imperdiet elit, quis condimentum est aliquam ac. Nunc tortor elit, imperdiet ac
                                tellus ut, accumsan interdum dui. Duis fermentum tincidunt massa, sodales tempus sapien
                                euismod quis. Vestibulum suscipit ex ex, nec euismod leo eleifend eget. Interdum et
                                malesuada fames ac ante ipsum primis in faucibus. Integer tincidunt sodales augue, ut
                                consequat libero blandit non. Suspendisse id dolor vel lorem bibendum luctus sit amet a
                                odio. Vestibulum varius viverra ipsum quis rhoncus. Praesent bibendum dictum ex. Quisque eu
                                laoreet leo.</p>
                        </div>
                    </div>
                    <div class="view_chart">
                        <div class="view_chart_header">
                            <h4>Skills</h4>
                        </div>
                        <div class="view_chart_body">
                            <div class="job-skills">
                                <a href="other_freelancer_profile.html#">HTML</a>
                                <a href="other_freelancer_profile.html#">CSS</a>
                                <a href="other_freelancer_profile.html#">Wordpress</a>
                                <a href="other_freelancer_profile.html#">Javascript</a>
                                <a href="other_freelancer_profile.html#">Jquery</a>
                                <a href="other_freelancer_profile.html#">Plugins</a>
                            </div>
                        </div>
                    </div>
                    <div class="view_chart">
                        <div class="view_chart_header">
                            <h4>Language</h4>
                        </div>
                        <div class="view_chart_body">
                            <div class="job-skills">
                                <a href="other_freelancer_profile.html#" class="more-skills">English</a>
                                <a href="other_freelancer_profile.html#" class="more-skills">Punjabi</a>
                                <a href="other_freelancer_profile.html#" class="more-skills">Hindi</a>
                            </div>
                        </div>
                    </div>
                </div> --}}


            </div>
        </div>
    </main>

    <!-- Modal -->
    <form action="{{ route('hireme.store') }}" method="post">
        @csrf
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="label15">Select Registration*</label>

                            <select id="category-select" class="ui fluid search selection dropdown skills-search"
                                name="job_subcategory">
                                <option value="">Select Registration</option>

                            </select>
                        </div>

                        <div class="form-group pt-2">
                            <label class="label15">Title*</label>
                            <input type="title" name="title" class="job-input" placeholder="Enter  ">
                        </div>
                        <div class="form-group pt-2">
                            <label class="label15">Location*</label>
                            <input type="title" class="job-input" name="location" placeholder="Enter  ">
                        </div>
                        <div class="form-group">
                            <label class="label15">Description*</label>
                            <textarea name="description" class="note-input" placeholder="Enter your Job details here"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="ui form">
                                <div class="grouped fields d-flex justify-content-between">
                                    <div class="field fltr-radio">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="schedule_job" id="schedule_job" tabindex="0"
                                                class="hidden">
                                            <label style="font-size: 15px; font-weight:bold;">Schedule
                                                Job</label>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            <input type="radio" checked="checked" name="urgent_job" id="urgent_job"
                                                tabindex="0" class="hidden">
                                            <label style="font-size: 15px; font-weight:bold;">Urgent Job
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="smm_input" id="date_input" style="display: none;">
                                <input value="" name="schedule_date" type="date"
                                    class="job-input datepicker-here" data-language="en" placeholder="Date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label15">Budget *</label>
                            <div class="smm_input">
                                <input type="text" name="budget" class="job-input" placeholder="0.00">
                                <div class="mix_max">LKR</div>
                            </div>
                        </div>

                        <input type="hidden" value="{{ $user->id }}" name="service_user_id">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.hire_btn').click(function() {

                var userId = $('input[name="suserid"]').val(); // Get the user ID from the hidden input

                $.ajax({
                    url: '{{ route('get.registration') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        userId: userId
                    }, // Pass the user ID as a parameter
                    success: function(data) {
                        // Populate the select dropdown with fetched job subcategories
                        var select = $('#category-select');
                        select.empty();
                        $.each(data, function(key, value) {
                            select.append('<option value="' + value.subcategory.id +
                                '">' + value.subcategory.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var scheduleJobRadio = document.getElementById("schedule_job");
            var urgentJobRadio = document.getElementById("urgent_job");
            var dateInput = document.getElementById("date_input");

            scheduleJobRadio.addEventListener("change", function() {
                if (scheduleJobRadio.checked) {
                    urgentJobRadio.checked = false;
                    dateInput.style.display = "block";
                }
            });

            urgentJobRadio.addEventListener("change", function() {
                if (urgentJobRadio.checked) {
                    scheduleJobRadio.checked = false;
                    dateInput.style.display = "none";
                }
            });
        });
    </script>
@endsection
