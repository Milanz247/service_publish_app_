    <!-- Modal -->
    <div class="modal fade" id="editmodalsub">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('subcategory.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="subcategory_id" value="">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Select Category</label>
                                <select class="form-control wide" name="category_id" id="editcategory_select">
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">SubCategory Name</label>
                                <input type="text" name="subcategory_name" value="" class="form-control"
                                    placeholder="Enter Name">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">SubCategory icon</label>
                                <input type="text" name="subcategory_icon" value="" class="form-control"
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
        $(document).ready(function() {
            $('#editmodalsub').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var subcategoryId = button.data(
                    'subcategory-id'); // Assuming you have a data attribute with category ID
                var modal = $(this);
                $.ajax({
                    url: '/admin/get-subcategory-data/' + subcategoryId,
                    type: 'GET',
                    success: function(response) {
                        var subcategory = response.subcategory;
                        modal.find('input[name="subcategory_name"]').val(subcategory.name);
                        modal.find('input[name="subcategory_icon"]').val(subcategory.icon);
                        modal.find('input[name="subcategory_id"]').val(subcategory.id);

                        var category = response.category;
                        $('#editcategory_select').empty();
                        $.each(category, function(index, category) {
                            $('#editcategory_select').append('<option value="' +
                                category
                                .id + '">' + category.name + '</option>');
                        });
                        $('#editcategory_select').val(subcategory.category_id);

                    },
                    error: function() {
                        alert('Error occurred while fetching category data.');
                    }
                });
            });
        });
    </script>
