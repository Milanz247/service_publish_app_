@extends('user.master')
@section('user')
    <div class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="title-bar-text">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Browser Companies</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <main class="browse-section">
        <div class="container">
            <form action="{{ route('filter.service') }}" method="GET">

                <div class="row">
                    <div class="filter-heading">
                        <div class="fh-left">
                            Filters
                        </div>
                        <div class="fh-right">
                            <a href="{{ route('view.user.service') }}">Clear All Filters</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="fltr-group">
                            <div class="fltr-items-heading">
                                <div class="fltr-item-left">
                                    <h6>Category</h6>
                                </div>
                            </div>
                            <select id="category-select" class="ui fluid search selection dropdown skills-search"
                                name="job_category">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="fltr-group">
                            <div class="fltr-items-heading">
                                <div class="fltr-item-left">
                                    <h6>Sub Category</h6>
                                </div>
                            </div>
                            <select id="subcategory-select" class="ui fluid search selection dropdown skills-search"
                                name="job_subcategory">
                                <option value="">Select Sub Category</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="fltr-group fltr-gend">
                            <div class="fltr-items-heading">
                                <div class="fltr-item-left">
                                    <h6>Location</h6>
                                </div>
                            </div>
                            <select id="location-select" class="ui fluid search selection dropdown skills-search"
                                name="service_location">
                                <option value="">Select Location</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location }}">{{ $location }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 text-center">
                        <div class="filter-button mt-6">
                            <button style="margin-top: 50px;" class="flr-btn">Search Now</button>
                        </div>
                    </div>
                </div>
            </form>


            <div class="row">
                <div class="col-lg-12 col-md-7 mainpage">

                    <div class="main-tabs">
                        <div class="res-tabs">
                            <div class="mtab-left">
                                <ul class="browsr-project">
                                    <li>
                                        <span class="nav-link">Search Results {{ $rowCount = count($foundUsers) }} </span>
                                        {{-- | <span>category</span> >
                                        <span>subcategory</span> > <span>location</span>  --}}
                                    </li>
                                </ul>
                            </div>
                            <div class="mtab-right">
                                <ul>
                                    <li class="bp-block">
                                        <div class="ui selection dropdown skills-search sort-dropdown" tabindex="0">
                                            <input name="gender" type="hidden" value="default">
                                            <i class="dropdown icon d-icon"></i>
                                            <div class="text">Sort By</div>
                                            <div class="menu" tabindex="-1">
                                                <div class="item" data-value="0">All</div>
                                                <div class="item" data-value="1">Top</div>
                                                <div class="item" data-value="2">Newest</div>
                                                <div class="item" data-value="3">Ranking</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="prjoects-content">
                            <div class="row view-group" id="freelancers">





                                @foreach ($foundUsers as $user)
                                    <div class="lg-item5 col-lg-4 col-xs-4 grid-group-item5">
                                        <div class="job-item mt-30">
                                            <div class="job-top-dt1 text-center">
                                                <div class="job-center-dt">
                                                    <img src="{{ asset('images/user_profile/' . $user->image) }}"
                                                        alt="">
                                                    <div class="job-urs-dts">
                                                        <a href="browse_companies.html#">
                                                            <h4>{{ $user->fname }} {{ $user->lname }}
                                                            </h4>
                                                        </a>
                                                        <span><i style="color: orangered" class="fas fa-map-marker-alt"></i>
                                                            {{ $user->location }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rating-location">
                                                <div class="left-rating">
                                                    <div class="rtitle">Job Count 34</div>
                                                    <div class="star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>4.9</span>
                                                    </div>
                                                </div>
                                                <div class="right-location">
                                                    <div class="text-left">
                                                        <div class="rtitle">Category</div>
                                                        <span>565775757</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-buttons">
                                                <ul class="link-btn">
                                                    <li class="cpy-btn"><a
                                                            href="{{ route('view.service.profile', $user->id) }}"
                                                            class="link-j1" title="View Profile">View Profile</a></li>

                                                    <li class="bkd-pm"><button class="bookmark1" title="bookmark"><i
                                                                class="fas fa-heart"></i></button></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


















                                <div class="col-12">
                                    <div class="main-p-pagination">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="browse_companies.html#"
                                                        aria-label="Previous">
                                                        PREV
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link active"
                                                        href="browse_companies.html#">1</a></li>
                                                <li class="page-item"><a class="page-link"
                                                        href="browse_companies.html#">2</a></li>
                                                <li class="page-item"><a class="page-link"
                                                        href="browse_companies.html#">...</a></li>
                                                <li class="page-item"><a class="page-link"
                                                        href="browse_companies.html#">24</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="browse_companies.html#" aria-label="Next">
                                                        NEXT
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
