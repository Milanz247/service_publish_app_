@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Category</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#basicModal">Add New</button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                                <table id="example3" class="display dataTable no-footer" style="min-width: 845px"
                                    aria-describedby="example3_info">
                                    <thead>
                                        <tr>

                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Email: activate to sort column ascending"
                                                style="width: 164.938px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Joining Date: activate to sort column ascending"
                                                style="width: 146.797px;">Category Icon</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 91.4531px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($catregory as $catregory)
                                            <tr class="odd">
                                                <td>{{ $catregory->name }}</td>
                                                <td>{{ $catregory->icon }}</td>

                                                <td>

                                                    <div class="d-flex">
                                                        <button type="submit" id="editbt"
                                                            data-category-id="{{ $catregory->id }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"
                                                            data-bs-toggle="modal" data-bs-target="#editmodal"><i
                                                                class="fas fa-pencil-alt"></i></button>

                                                        <a href="{{ route('category.delete', $catregory->id) }}"
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

    @include('admin.category.create_modal')
    @include('admin.category.edit_modal')
@endsection
