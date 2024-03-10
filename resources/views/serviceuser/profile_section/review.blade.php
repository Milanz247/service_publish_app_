@extends('serviceuser.user_profile_master')
@section('profile')
    <div class="view_chart">
        <div class="view_chart_header">
            <h4 class="mt-1">All Reviews</h4>
            <div class="review_right">

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
@endsection
