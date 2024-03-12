    <!-- Modal -->
    <div class="modal fade" id="basicModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Category Name</label>
                                <input type="text" name="category_name" class="form-control"
                                    placeholder="Enter Name">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Category icon</label>
                                <input type="text" name="category_icon" class="form-control"
                                    placeholder="Enter Icon">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
