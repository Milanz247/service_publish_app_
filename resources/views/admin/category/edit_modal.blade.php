    <!-- Modal -->
    <div class="modal fade" id="editmodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('category.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="category_id" value="">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Category Name</label>
                                <input type="text" name="category_name" value="" class="form-control"
                                    placeholder="Enter Name">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Category icon</label>
                                <input type="text" name="category_icon" value="" class="form-control"
                                    placeholder="Enter Icon">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#editmodal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var categoryId = button.data('category-id'); // Assuming you have a data attribute with category ID
                var modal = $(this);
                $.ajax({
                    url: '/admin/getCategoryData/' + categoryId,
                    type: 'GET',
                    success: function (response) {
                        var category = response.category;
                        modal.find('input[name="category_name"]').val(category.name);
                        modal.find('input[name="category_icon"]').val(category.icon);
                        modal.find('input[name="category_id"]').val(category.id);


                    },
                    error: function () {
                        alert('Error occurred while fetching category data.');
                    }
                });
            });
        });
    </script>
