@extends('serviceuser.user_profile_master')
@section('profile')
    <div class="jobs_manage">
        <div class="row">
            <div class="col-lg-3">
                <div class="jobs_tabs">

                    <ul class="nav job_nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#post_project" id="manage-bids-tab"
                                data-toggle="tab">Registration</a>
                        </li>
                        <li class="nav-item job_nav_item">
                            <a class="nav-link" href="#applied_jobs" id="manage-bidders-tab" data-toggle="tab">Service
                                List</a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="post_project" role="tabpanel">
                        <div class="view_chart">
                            <div class="view_chart_header">
                                <h4>Service Registration</h4>
                            </div>
                            <div class="post_job_body">
                                <form action="{{ route('register.service') }}" method="POST" id="image-upload"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="label15">Location*</label>
                                                <input type="text" class="job-input" placeholder="Your Location"
                                                    name="service_location" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="label15">Phone*</label>
                                                <input type="text" class="job-input" placeholder="Your Phone"
                                                    name="phone" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="label15">Job Category*</label>
                                                <select required name="job_category"
                                                    class="ui fluid search selection dropdown skills-search">
                                                    <option value="">Select Job Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="label15">Job Sub Category*</label>
                                                <select required id="subcategory-select"
                                                    class="ui fluid search selection dropdown skills-search"
                                                    name="job_subcategory">
                                                    <option value="">Select Sub Category</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="label15">Service Description*</label>
                                                <textarea class="textarea_input" placeholder="Type Description" name="service_discription" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="label15">Upload Files*</label>
                                                <div class="image-upload-wrap1">
                                                    <input class="file-upload-input1" type="file" name="multi_img[]"
                                                        id="multiImg" multiple="">
                                                    <div class="drag-text1">
                                                        Upload Files
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="preview_img"></div>

                                        </div>
                                        <div class="col-lg-12">
                                            <button class="post_jp_btn" type="submit">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="applied_jobs">
                        <div class="view_chart">
                            <div class="view_chart_header">
                                <h4>Applied Service</h4>
                            </div>
                            <div class="job_bid_body">
                                <ul class="all_applied_jobs jobs_bookmarks">

                                    @foreach ($services as $services)
                                        <li>
                                            <div class="applied_item">
                                                <h4> {{ $services->category->name }} | {{ $services->subcategory->name }}
                                                </h4>
                                                <ul class="view_dt_job">
                                                    <li>
                                                        <div class="vw1254"><i
                                                                class="fas fa-map-marker-alt"></i>{{ $services->service_location }}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="vw1254"><i class="fas fa-briefcase"></i>12 JOBSdone
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="vw1254"><i
                                                                class="fas fa-phone-alt"></i>{{ $services->phone }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="vw1254"><i
                                                                class="far fa-clock"></i>{{ $services->created_at }}</div>
                                                    </li>
                                                </ul>
                                                <div class="btn_link23">
                                                    <form action="{{route('delete.service')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $services->id }}">
                                                        <button class="apled_btn50">Delete</button>

                                                    </form>
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
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img class ="m-1"/>').addClass('thumb')
                                        .attr('src', e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            // Function to handle change event on the job category select element
            $('select[name="job_category"]').change(function() {

                var categoryId = $(this).val();

                $.ajax({
                    url: '/get-subcategory',
                    type: 'GET',
                    data: {
                        category_id: categoryId
                    },
                    success: function(response) {

                        $('select[name="job_subcategory"]').empty();

                        $.each(response.subcategories, function(key, value) {

                            $('select[name="job_subcategory"]').append(
                                '<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {

                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
