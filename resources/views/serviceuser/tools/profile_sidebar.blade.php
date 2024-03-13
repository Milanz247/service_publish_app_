<div class="col-lg-3 col-md-4">
    <div class="account_dt_left">
        <div class="job-center-dt">
            @if (Auth::user()->image)
                <img src="{{ asset('images/user_profile/' . Auth::user()->image) }}" class="img-thumbnail"
                    alt="Cinque Terre">
            @else
                <img src="{{ asset('images/profile/userd.png') }}" class="img-thumbnail" alt="Cinque Terre">
            @endif
            <div class="job-urs-dts">

                <h4>
                    {{ Auth::user()->fname && Auth::user()->lname
                        ? Auth::user()->fname . ' ' . Auth::user()->lname
                        : Auth::user()->name }}
                </h4> <span></span>
                <div class="avialable">Available Full Time<a href="my_freelancer_dashboard.html#"><i
                            class="far fa-edit"></i></a></div>
            </div>
        </div>
        <div class="my_websites">
            <ul>
                <li>
                    <a href="my_freelancer_profile.html#" class="web_link">
                        <i class="fab fa-whatsapp"></i>{{ Auth::user()->phone }} </a>
                </li>
                <li><a href="my_freelancer_profile.html#" class="web_link"><i
                            class="far fa-user"></i>{{ Auth::user()->phone }}</a></li>
            </ul>
        </div>
        <div class="group_skills_bar">
            <h6>Profile Completeness</h6>
            <div class="group_bar1">

                {{-- @php
                    use App\Models\User; // Assuming your Review model is located at app/Models/Review.php

                    // Retrieve the row from the database
                    $row = User::find(Auth::user()->id);

                    $nullColumnsCount = 0;

                    // Loop through the attributes of the row
                    foreach ($row->getAttributes() as $attribute => $value) {
                        // Check if the value is null
                        if ($value === null) {
                            $nullColumnsCount++;
                        }
                    }

                @endphp

                {{ $nullColumnsCount }} --}}
                <span>85%</span>
                <div class="progress skill_process">
                    <div class="progress-bar progress_bar_skills" role="progressbar" style="width: 85%;"
                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <a href="my_freelancer_dashboard.html#" class="skiils_button">Complete Required Skills</a>
        </div>
        <div class="rlt_section">
            <div class="rtl_left">
                <h6>Rating</h6>
            </div>
            @php
                use App\Models\Review;
                use Illuminate\Support\Facades\Auth; 
                $count = 0;
                $rating = 0;
                $reviewsCount = Review::where('service_user_id', Auth::user()->id)->count();

                if ($reviewsCount > 0 && $reviewsCount < 2) {
                    $count = 1;
                    $rating = 1;
                } elseif ($reviewsCount > 2 && $reviewsCount < 5) {
                    $count = 2;
                    $rating = 2;
                } elseif ($reviewsCount > 5 && $reviewsCount < 7) {
                    $count = 3;
                    $rating = 3;
                } elseif ($reviewsCount > 7 && $reviewsCount < 9) {
                    $count = 4;
                    $rating = 4;
                } elseif ($reviewsCount > 9) {
                    $count = 5;
                    $rating = 4.9;
                }
            @endphp
            <div class="rtl_right">
                <div class="star">
                    @for ($i = 0; $i < $count; $i++)
                        <i class="fas fa-star"></i>
                    @endfor

                    <span>{{ $rating }}</span>
                </div>
            </div>
        </div>
        <div class="rlt_section">
            <div class="rtl_left">
                <h6>Location</h6>
            </div>
            <div class="rtl_right">
                <span><i class="fas fa-map-marker-alt lc_icon"></i>{{ Auth::user()->location }}</span>
            </div>

            <ul class="rlt_section2">
                <li>
                    <div class="rtl_left2">
                        <h6>Hourly Rate</h6>
                    </div>
                    <div class="rtl_right2">
                        <span>{{ Auth::user()->pay_rate }} / hr</span>
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
                    @php
                        use App\Models\ServiceRequest;
                        $jobdone = ServiceRequest::where('service_user_id', Auth::user()->id)->count();

                    @endphp
                    <div class="rtl_left2">
                        <h6>Job Done</h6>
                    </div>
                    <div class="rtl_right2">
                        <span>{{ $jobdone }}</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="social_section3 mb80">
            <div class="social_leftt3">
                <h6>Contact Social Account</h6>
            </div>

            <ul class="social_accounts">
                <li><a href="my_freelancer_dashboard.html#" class="social_links"><i
                            class="fab fa-facebook-f f1"></i>http://facebook.com/johndoe</a></li>
                <li><a href="my_freelancer_dashboard.html#" class="social_links"><i
                            class="fab fa-twitter t1"></i>http://twitter.com/johndoe</a></li>
                <li><a href="my_freelancer_dashboard.html#" class="social_links"><i
                            class="fab fa-linkedin-in l1"></i>http://linkedin.com/johndoe</a></li>

            </ul>
        </div>
    </div>
</div>
