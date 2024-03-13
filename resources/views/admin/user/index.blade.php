@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">User Managment</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Users</h4>
                        {{-- <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#slidermodal">Add New</button> --}}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                                <table id="example3" class="display dataTable no-footer" style="min-width: 845px"
                                    aria-describedby="example3_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Joining Date: activate to sort column ascending"
                                                style="width: 146.797px;">image</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Email: activate to sort column ascending"
                                                style="width: 164.938px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Joining Date: activate to sort column ascending"
                                                style="width: 146.797px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Email: activate to sort column ascending"
                                                style="width: 164.938px;">Member Since</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Email: activate to sort column ascending"
                                                style="width: 164.938px;">phone</th>

                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Email: activate to sort column ascending"
                                                style="width: 164.938px;">User Type</th>

                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 91.4531px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $user)
                                            <tr class="odd">
                                                <td>
                                                    @if ($user->photo_name)
                                                        <img style="height: 2.8rem;
                                                        width: 2.8rem;
                                                        border-radius: 0.5rem;
                                                        margin-right: 0.8rem;"
                                                            src="{{ asset('images/user_profile/' . $user->image) }}"
                                                            class="img-thumbnail" alt="Cinque Terre">
                                                    @else
                                                        <img style="height: 2.8rem;
                                                        width: 2.8rem;
                                                        border-radius: 0.5rem;
                                                        margin-right: 0.8rem;"
                                                            src="{{ asset('images/profile/userd.png') }}"
                                                            class="img-thumbnail" alt="Cinque Terre">
                                                    @endif
                                                </td>
                                                <td>{{ $user->fname }} {{ $user->lname }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->member_since }}</td>
                                                <td>{{ $user->phone }}</td>

                                                <td>
                                                    @if ($user->usertype == 1)
                                                        <span class="badge badge-pill badge-secondary">Service User</span>
                                                    @else
                                                        <span class="badge badge-pill badge-dark">Normal User </span>
                                                    @endif
                                                </td>




                                                {{-- <td>
                                                    @if ($user->status == 1)
                                                        <button type="button" id="activateButton"
                                                            data-slider-id="{{ $user->id }}"
                                                            class="btn btn-success btn-xs">Active</button>
                                                    @else
                                                        <button type="button" id="inactivateButton"
                                                            data-slider-id="{{ $user->id }}"
                                                            class="btn btn-warning btn-xs">Inactive</button>
                                                    @endif


                                                </td> --}}
                                                <td>

                                                    <div class="d-flex">

                                                        <a href="{{ route('user.delete', $user->id) }}"
                                                            class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('admin.home_slider.create_modal')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('#activateButton, #inactivateButton').click(function(event) {
                var button = $(event.currentTarget);
                var sliderID = button.data('slider-id');
                var newStatus = button.attr('id') === 'activateButton' ? 0 : 1;

                // If inactivateButton is clicked, show confirmation dialog
                if (button.attr('id') === 'inactivateButton') {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You are about to active this. Are you sure you want to continue?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Active it!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            updateSliderStatus(sliderID, newStatus);
                        }
                    });
                } else {

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You are about to inactive this. Are you sure you want to continue?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, inactive it!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            updateSliderStatus(sliderID, newStatus);
                        }
                    });
                }
            });

            // Function to update slider status via AJAX
            function updateSliderStatus(sliderID, newStatus) {

                $.ajax({
                    url: '{{ route('slider.updateStatus') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: newStatus,
                        sliderID: sliderID
                    },
                    success: function(response) {
                        toster(response.alerttype, response.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 600);
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to update status');
                    }
                });
            }


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
    </script> --}}
@endsection
