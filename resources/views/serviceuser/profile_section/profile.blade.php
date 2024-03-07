@extends('serviceuser.user_profile_master')
@section('profile')
    <a href="{{route('view.susetting')}}" class="edit_link_profile"><i class="far fa-edit"></i>Edit Profile</a>
    <div class="view_chart">
        <div class="view_chart_header">
            <h4>About</h4>
        </div>
        <div class="view_chart_body">
            <p class="user_about_des">
                @if (Auth::user()->description)
                    {{ Auth::user()->description }}
                @else
                    <div class="text-center">
                        <span class="badge light badge-danger">
                            <i class="fa fa-circle text-danger me-1"></i>
                            Complete Your Profile add Description
                        </span>
                    </div>
                @endif
            </p>
        </div>
    </div>

    <div class="view_chart">
        <div class="view_chart_header">
            <h4>Skill Category</h4>
        </div>
        <div class="view_chart_body">
            <div class="job-skills">
                @if (Auth::user()->skill_categories)
                    @foreach (json_decode(Auth::user()->skill_categories, true) as $skill_categories)
                        <a href="my_freelancer_profile.html#">{{ $skill_categories }}</a>
                    @endforeach
                @else
                    <div class="text-center">
                        <span class="badge light badge-danger">
                            <i class="fa fa-circle text-danger me-1"></i>
                            Complete Your Profile add skill Categories
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="view_chart">
        <div class="view_chart_header">
            <h4>Language</h4>
        </div>
        <div class="view_chart_body">
            <div class="job-skills">
                @if (Auth::user()->languages)
                    @foreach (json_decode(Auth::user()->languages, true) as $languages)
                        <a href="my_freelancer_profile.html#" class="more-skills">{{ $languages }}</a>
                    @endforeach
                @else
                    <div class="text-center">
                        <span class="badge light badge-danger">
                            <i class="fa fa-circle text-danger me-1"></i>
                            Complete Your Profile add Languages
                        </span>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
