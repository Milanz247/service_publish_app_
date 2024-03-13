@extends('serviceuser.user_profile_master')
@section('profile')
    <div class="total_1254">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="collection_item">
                    <div class="coll_icon">
                        <i class="fas fa-suitcase col_icon1"></i>
                    </div>
                    <h4>Complete Jobs</h4>
                    <span>{{ $jobsCount }}</span>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="collection_item">
                    <div class="coll_icon">
                        <i class="fas fa-archive col_icon2"></i>
                    </div>
                    <h4>New Jobs</h4>
                    <span>{{ $newjobs }}</span>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="collection_item">
                    <div class="coll_icon">
                        <i class="fas fa-asterisk col_icon3"></i>
                    </div>
                    <h4>Review</h4>
                    <span>20</span>
                </div>
            </div>
        </div>
    </div>
@endsection
