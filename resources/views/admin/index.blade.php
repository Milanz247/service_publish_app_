@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row separate-row">
                                    @php
                                        use App\Models\User;
                                        use App\Models\ServiceRequest;
                                        use Illuminate\Support\Facades\Auth;

                                        $ruser = User::where('usertype', 1)->count();
                                        $user = User::where('usertype', 0)->count();

                                        $cout = ServiceRequest::count();

                                    @endphp
                                    <div class="col-sm-6">
                                        <div class="job-icon pb-4 d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h2 class="mb-0 lh-1">{{ $ruser }}</h2>
                                                </div>
                                                <span class="d-block mb-2">Registred Service Users</span>
                                            </div>
                                            <div id="NewCustomers"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="job-icon pb-4 pt-4 pt-sm-0 d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h2 class="mb-0 lh-1">{{ $user }}</h2>
                                                </div>
                                                <span class="d-block mb-2">Registred Users</span>
                                            </div>
                                            <div id="NewCustomers1"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="job-icon pt-4 pb-sm-0 pb-4 d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h2 class="mb-0 lh-1">{{ $cout }}</h2>
                                                </div>
                                                <span class="d-block mb-2">All Jobs Counts</span>
                                            </div>
                                            <div id="NewCustomers2"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="job-icon pt-4  d-flex justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <h2 class="mb-0 lh-1">437</h2>
                                                </div>
                                                <span class="d-block mb-2">Unread Messages</span>
                                            </div>
                                            <div id="NewCustomers3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
