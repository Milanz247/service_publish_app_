@extends('user.user_profile_master')
@section('profile')
    <div class="jobs_manage">
        <div class="row">
            <div class="col-lg-3">
                <div class="jobs_tabs">
                    <ul class="nav job_nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" href="#manage_jobs" id="manage-job-tab" data-toggle="tab">Applied
                                Services </a>
                        </li>
                        <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#applied_candidates" id="applied-job-tab" data-toggle="tab">Decline
                                Orders</a>
                        </li>

                        <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#post_job" id="post-job-tab" data-toggle="tab">Accepted</a>
                        </li>

                        <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#applied_jobs" id="applied-candidate-tab"
                                data-toggle="tab">Completed</a>
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
                                                                <img src="{{ $serviceUsers[$order->id]->image ? asset('images/user_profile/' . $serviceUsers[$order->id]->image) : asset('images/profile/userd.png') }}"
                                                                    alt="User Image" class="rounded-circle"
                                                                    style="width: 30px; height: 30px;">
                                                                <span>{{ $serviceUsers[$order->id]->fname }}</span>
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
                                                        {{-- <button id="accept_bt" class="apled_btn60">Edite</button> --}}
                                                        <button id="delete_bt" class="apled_btn123">Delete</button>
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
                                                                style="font-size: 12px;">Accepted
                                                                {{ $order->updated_at->diffInDays(now()) }} days ago
                                                            </span></div>

                                                    </div>

                                                    <br>

                                                    <ul class="view_dt_job">

                                                        <li>
                                                            <div class="vw1254">
                                                                <img src="{{ $serviceUsers[$order->id]->image ? asset('images/user_profile/' . $serviceUsers[$order->id]->image) : asset('images/profile/userd.png') }}"
                                                                    alt="User Image" class="rounded-circle"
                                                                    style="width: 30px; height: 30px;">
                                                                <span>{{ $serviceUsers[$order->id]->fname }}</span>
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
                                                    <input type="hidden" id="service" value="{{ $order->id }}">
                                                    <input type="hidden" id="service_user"
                                                        value="{{ $serviceUsers[$order->id]->id }}">

                                                    <div class="btn_link23">
                                                        @if ($reviewexist[$order->id])
                                                            <p class="alert alert-warning">A review has already been
                                                                submitted for this service.</p>
                                                        @else
                                                            <button id="review_bt" type="button"
                                                                data-toggle="modal" data-target="#exampleModal"
                                                                class="apled_btn60">Add Review</button>
                                                        @endif
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
                                                                <img src="{{ $serviceUsers[$order->id]->image ? asset('images/user_profile/' . $serviceUsers[$order->id]->image) : asset('images/profile/userd.png') }}"
                                                                    alt="User Image" class="rounded-circle"
                                                                    style="width: 30px; height: 30px;">
                                                                <span>{{ $serviceUsers[$order->id]->fname }}</span>
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
                                                                style="font-size: 12px;">Completed
                                                                {{ $order->updated_at->diffInDays(now()) }} days ago
                                                            </span></div>

                                                    </div>

                                                    <br>

                                                    <ul class="view_dt_job">

                                                        <li>
                                                            <div class="vw1254">
                                                                <img src="{{ $serviceUsers[$order->id]->image ? asset('images/user_profile/' . $serviceUsers[$order->id]->image) : asset('images/profile/userd.png') }}"
                                                                    alt="User Image" class="rounded-circle"
                                                                    style="width: 30px; height: 30px;">
                                                                <span>{{ $serviceUsers[$order->id]->fname }}</span>
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
    <style>
        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            text-align: center;
        }

        .rating input {
            display: none;
        }

        .rating label {
            display: inline-block;
            padding: 5px;
            font-size: 25px;
            color: #ddd;
            cursor: pointer;
        }

        .rating label:hover,
        .rating label:hover~label,
        .rating input:checked~label {
            color: #3c65f5;
        }

        .preview-images-zone {
            width: 100%;
            border: 1px dashed #ddd;
            min-height: 100px;
            padding: 20px;
            position: relative;
            overflow: auto;
        }

        .preview-images-zone .preview-image {
            width: 80px;
            /* Adjust image size here */
            height: 80px;
            /* Adjust image size here */
            border: 1px solid #ddd;
            margin-right: 5px;
            display: inline-block;
            vertical-align: top;
        }
    </style>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center p-3">
                        <h3>Write Something About Client</h3>

                    </div>
                    <form action="{{ route('add.review') }}" method="POST" id="reviewForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <div class="rating">
                                <input type="radio" id="star5" name="rating" value="5"><label
                                    for="star5"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star4" name="rating" value="4"><label
                                    for="star4"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star3" name="rating" value="3"><label
                                    for="star3"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star2" name="rating" value="2"><label
                                    for="star2"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star1" name="rating" value="1"><label
                                    for="star1"><i class="fas fa-star"></i></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="images">Images:</label>
                            <input type="file" class="form-control-file" name="multi_img[]" id="images" multiple
                                onchange="previewImages()">
                            <div class="preview-images-zone"></div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="submitReview" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Define the toster function in the global scope
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

        $(document).ready(function() {
            // Your existing code inside the document ready function
            $('#delete_bt').click(function() {
                var id = $('input[name="id"]').val();
                $.ajax({
                    url: '/user/delete-apply-service',
                    type: 'POST',
                    data: {
                        id: id,
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

            // Event listener for submitting reviews
            document.getElementById('submitReview').addEventListener('click', function() {
                var form = document.getElementById('reviewForm');
                var formData = new FormData(form);
                // Append the values of hidden inputs to the formData object
                var service = document.getElementById('service').value;
                var serviceUser = document.getElementById('service_user').value;
                formData.append('service', service);
                formData.append('service_user', serviceUser);
                // Send the form data using AJAX
                $.ajax({
                    url: form.action,
                    method: form.method,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        var myModal = document.getElementById('exampleModal');
                        myModal.classList.remove('show');
                        myModal.style.display = 'none';
                        document.body.classList.remove('modal-open');

                        toster(response.alerttype, response.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 800);
                        // You can redirect or show a success message here
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        function previewImages() {
            var previewZone = document.querySelector('.preview-images-zone');
            var files = document.getElementById('images').files;

            if (files.length > 0) {
                for (var i = 0; i < files.length; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        var img = document.createElement('img');
                        img.src = event.target.result;
                        img.className = 'preview-image';
                        previewZone.appendChild(img);
                    };

                    reader.readAsDataURL(files[i]);
                }
            }
        }
    </script>
@endsection
