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
                            <a class="nav-link" href="#applied_jobs" id="applied-job-tab" data-toggle="tab">Accept
                                Orders</a>
                        </li>
                        <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#applied_candidates" id="applied-candidate-tab"
                                data-toggle="tab">Decline Orders</a>
                        </li>
                        <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#post_job" id="post-job-tab" data-toggle="tab">My Complete Jobs</a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="manage_jobs" role="tabpanel">
                        <div class="view_chart">
                            <div class="job_bid_body">

                                @if (count($orders['new']) == 0)
                                    <div class="row">
                                        <div class="col d-flex align-items-center justify-content-center"
                                            style="height: 200px;">
                                            <span class="badge badge-secondary" style="font-size: 24px;">No data
                                                available</span>
                                        </div>
                                    </div>
                                @else
                                    <ul class="all_applied_jobs jobs_bookmarks">
                                        @foreach ($orders['new'] as $order)
                                            <li>
                                                <div class="applied_item">
                                                    <div class="row">
                                                        <div class="col-md-8"> <a
                                                                href="my_freelancer_jobs.html#"><b>{{ $order->title }}</b></a>
                                                            |
                                                            <span class="badge badge-warning"
                                                                style="font-size: 12px;">{{ $order->status }}</span>
                                                        </div>
                                                        <div class="col-md-4 text-right"> <span
                                                                class="badge badge-secondary" style="font-size: 12px;">
                                                                {{ $order->created_at->diffInDays(now()) }} days ago
                                                            </span></div>

                                                    </div>

                                                    <br>

                                                    <ul class="view_dt_job">

                                                        <li>
                                                            <div class="vw1254">
                                                                {{-- <i class="far fa-user"></i> --}}
                                                                <img src="{{ optional($order->user)->image ? asset('images/user_profile/' . $order->user->image) : asset('images/profile/userd.png') }}"
                                                                    alt="User Image" class="rounded-circle"
                                                                    style="width: 30px; height: 30px;">
                                                                <!-- Using optional() to safely access user's profile image URL -->
                                                                <span>{{ optional($order->user)->fname }}</span>
                                                                <!-- Using optional() to safely access user's name -->
                                                            </div>
                                                        </li>
                                                        @if ($order->urgent_job == 1)
                                                            <li>
                                                                <div class="vw1254">
                                                                    <i class="far fa-clock text-danger"></i>
                                                                    <span class="badge badge-danger">Urgent</span>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        @php
                                                            $date = $order->schedule_date;
                                                            $formatted_date = date('j F Y', strtotime($date));
                                                        @endphp
                                                        @if ($order->schedule_job == 1)
                                                            <li>
                                                                <div class="vw1254">
                                                                    <i class="far fa-clock"></i>
                                                                    <span>Scheduled Date: {{ $formatted_date }}</span>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        <li>
                                                            <div class="vw1254">
                                                                <i class="far fa-caret-square-right"></i>
                                                                <span>Category: {{ $order->subcategory->name }}</span>
                                                            </div>
                                                        </li>



                                                        <input type="hidden" value="{{ $order->id }}" name="id">
                                                    </ul>
                                                    <ul class="view_dt_job">
                                                        <li>
                                                            <p>{{ $order->description }}</p>
                                                        </li>
                                                    </ul>
                                                    <div class="btn_link23">
                                                        <button id="accept_bt" class="apled_btn60">Accept</button>
                                                        <button id="decline_bt" class="apled_btn123">Decline</button>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                @endif


                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="applied_jobs">
                        <div class="view_chart">

                            <div class="job_bid_body">

                                @if (count($orders['accept']) == 0)
                                    <div class="row">
                                        <div class="col d-flex align-items-center justify-content-center"
                                            style="height: 200px;">
                                            <span class="badge badge-secondary" style="font-size: 24px;">No data
                                                available</span>
                                        </div>
                                    </div>
                                @else
                                    <ul class="all_applied_jobs jobs_bookmarks">
                                        @foreach ($orders['accept'] as $order)
                                            <li>
                                                <div class="applied_item">
                                                    <div class="row">
                                                        <div class="col-md-8"> <a
                                                                href="my_freelancer_jobs.html#"><b>{{ $order->title }}</b></a>
                                                            |
                                                            <span class="badge badge-warning"
                                                                style="font-size: 12px;">{{ $order->status }}</span>
                                                        </div>
                                                        <div class="col-md-4 text-right"> <span
                                                                class="badge badge-secondary"
                                                                style="font-size: 12px;">Accepted
                                                                {{ $order->updated_at->diffInDays(now()) }} days ago
                                                            </span></div>

                                                    </div>

                                                    <br>

                                                    <ul class="view_dt_job">

                                                        <li>
                                                            <div class="vw1254">
                                                                <img src="{{ optional($order->user)->image ? asset('images/user_profile/' . $order->user->image) : asset('images/profile/userd.png') }}"
                                                                    alt="User Image" class="rounded-circle"
                                                                    style="width: 30px; height: 30px;">
                                                                {{-- <i class="far fa-user"></i> --}}

                                                                <span>{{ optional($order->user)->fname }}</span>
                                                            </div>
                                                        </li>
                                                        @if ($order->urgent_job == 1)
                                                            <li>
                                                                <div class="vw1254">
                                                                    <i class="far fa-clock text-danger"></i>
                                                                    <span class="badge badge-danger">Urgent</span>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        @php
                                                            $date = $order->schedule_date;
                                                            $formatted_date = date('j F Y', strtotime($date));
                                                        @endphp
                                                        @if ($order->schedule_job == 1)
                                                            <li>
                                                                <div class="vw1254">
                                                                    <i class="far fa-clock"></i>
                                                                    <span>Scheduled Date: {{ $formatted_date }}</span>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        <li>
                                                            <div class="vw1254">
                                                                <i class="far fa-caret-square-right"></i>
                                                                <span>Category: {{ $order->subcategory->name }}</span>
                                                            </div>
                                                        </li>
                                                        <input type="hidden" value="{{ $order->id }}"
                                                            name="completejbid">
                                                    </ul>
                                                    <ul class="view_dt_job">
                                                        <li>
                                                            <p>{{ $order->description }}</p>
                                                        </li>
                                                    </ul>
                                                    <div class="btn_link23">
                                                        <button id="complete_job_bt" class="apled_btn60">Complete
                                                            Job</button>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>


                                @endif

                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="applied_candidates">
                        <div class="view_chart">

                            <div class="job_bid_body">

                                @if (count($orders['decline']) == 0)
                                    <div class="row">
                                        <div class="col d-flex align-items-center justify-content-center"
                                            style="height: 200px;">
                                            <span class="badge badge-secondary" style="font-size: 24px;">No data
                                                available</span>
                                        </div>
                                    </div>
                                @else
                                    <ul class="all_applied_jobs jobs_bookmarks">
                                        @foreach ($orders['decline'] as $order)
                                            <li>
                                                <div class="applied_item">
                                                    <div class="row">
                                                        <div class="col-md-8"> <a
                                                                href="my_freelancer_jobs.html#"><b>{{ $order->title }}</b></a>
                                                            |
                                                            <span class="badge badge-warning"
                                                                style="font-size: 12px;">{{ $order->status }}</span>
                                                        </div>
                                                        <div class="col-md-4 text-right"> <span
                                                                class="badge badge-secondary"
                                                                style="font-size: 12px;">Declined
                                                                {{ $order->updated_at->diffInDays(now()) }} days ago
                                                            </span></div>

                                                    </div>

                                                    <br>

                                                    <ul class="view_dt_job">

                                                        <li>
                                                            <div class="vw1254">
                                                                {{-- <i class="far fa-user"></i> --}}
                                                                <img src="{{ optional($order->user)->image ? asset('images/user_profile/' . $order->user->image) : asset('images/profile/userd.png') }}"
                                                                    alt="User Image" class="rounded-circle"
                                                                    style="width: 30px; height: 30px;">
                                                                <!-- Using optional() to safely access user's profile image URL -->
                                                                <span>{{ optional($order->user)->fname }}</span>
                                                                <!-- Using optional() to safely access user's name -->
                                                            </div>
                                                        </li>
                                                        @if ($order->urgent_job == 1)
                                                            <li>
                                                                <div class="vw1254">
                                                                    <i class="far fa-clock text-danger"></i>
                                                                    <span class="badge badge-danger">Urgent</span>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        @php
                                                            $date = $order->schedule_date;
                                                            $formatted_date = date('j F Y', strtotime($date));
                                                        @endphp
                                                        @if ($order->schedule_job == 1)
                                                            <li>
                                                                <div class="vw1254">
                                                                    <i class="far fa-clock"></i>
                                                                    <span>Scheduled Date: {{ $formatted_date }}</span>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        <li>
                                                            <div class="vw1254">
                                                                <i class="far fa-caret-square-right"></i>
                                                                <span>Category: {{ $order->subcategory->name }}</span>
                                                            </div>
                                                        </li>



                                                        <input type="hidden" value="{{ $order->id }}"
                                                            name="completejbid">
                                                    </ul>
                                                    <ul class="view_dt_job">
                                                        <li>
                                                            <p>{{ $order->description }}</p>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                @endif





                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="post_job" role="tabpanel">
                        <div class="view_chart">

                            <div class="job_bid_body">


                                @if (count($orders['complete']) == 0)
                                    <div class="row">
                                        <div class="col d-flex align-items-center justify-content-center"
                                            style="height: 200px;">
                                            <span class="badge badge-secondary" style="font-size: 24px;">No data
                                                available</span>
                                        </div>
                                    </div>
                                @else
                                    <ul class="all_applied_jobs jobs_bookmarks">

                                        @foreach ($orders['complete'] as $order)
                                            <li>
                                                <div class="applied_item">
                                                    <div class="row">
                                                        <div class="col-md-8"> <a
                                                                href="my_freelancer_jobs.html#"><b>{{ $order->title }}</b></a>
                                                            |
                                                            <span class="badge badge-warning"
                                                                style="font-size: 12px;">{{ $order->status }}</span>
                                                        </div>
                                                        <div class="col-md-4 text-right"> <span
                                                                class="badge badge-secondary"
                                                                style="font-size: 12px;">Completed
                                                                {{ $order->updated_at->diffInDays(now()) }} days ago
                                                            </span></div>

                                                    </div>

                                                    <br>

                                                    <ul class="view_dt_job">

                                                        <li>
                                                            <div class="vw1254">
                                                                {{-- <i class="far fa-user"></i> --}}
                                                                <img src="{{ optional($order->user)->image ? asset('images/user_profile/' . $order->user->image) : asset('images/profile/userd.png') }}"
                                                                    alt="User Image" class="rounded-circle"
                                                                    style="width: 30px; height: 30px;">
                                                                <!-- Using optional() to safely access user's profile image URL -->
                                                                <span>{{ optional($order->user)->fname }}</span>
                                                                <!-- Using optional() to safely access user's name -->
                                                            </div>
                                                        </li>
                                                        @if ($order->urgent_job == 1)
                                                            <li>
                                                                <div class="vw1254">
                                                                    <i class="far fa-clock text-danger"></i>
                                                                    <span class="badge badge-danger">Urgent</span>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        @php
                                                            $date = $order->schedule_date;
                                                            $formatted_date = date('j F Y', strtotime($date));
                                                        @endphp
                                                        @if ($order->schedule_job == 1)
                                                            <li>
                                                                <div class="vw1254">
                                                                    <i class="far fa-clock"></i>
                                                                    <span>Scheduled Date: {{ $formatted_date }}</span>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        <li>
                                                            <div class="vw1254">
                                                                <i class="far fa-caret-square-right"></i>
                                                                <span>Category: {{ $order->subcategory->name }}</span>
                                                            </div>
                                                        </li>



                                                        <input type="hidden" value="{{ $order->id }}"
                                                            name="completejbid">
                                                    </ul>
                                                    <ul class="view_dt_job">
                                                        <li>
                                                            <p>{{ $order->description }}</p>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                @endif







                            </div>
                        </div>
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

            $('#accept_bt, #decline_bt, #complete_job_bt').click(function() {
                var action = '';
                var id = '';

                if ($(this).attr('id') === 'accept_bt') {
                    action = 'accept';
                    id = $('input[name="id"]').val();
                } else if ($(this).attr('id') === 'decline_bt') {
                    action = 'decline';
                    id = $('input[name="id"]').val();
                } else if ($(this).attr('id') === 'complete_job_bt') {
                    action = 'complete';
                    id = $('input[name="completejbid"]').val();
                }

                $.ajax({
                    url: '/serviceuser/update-service-status',
                    type: 'POST',
                    data: {
                        id: id,
                        status: action,
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
