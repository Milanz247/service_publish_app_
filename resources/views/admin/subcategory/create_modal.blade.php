<!-- Modal -->
<div class="modal fade" id="basicModalsub">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Sub Category </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{ route('subcategory.store') }}" method="post">
                        @csrf
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Select Category</label>
                            <select class="form-control wide" name="category_id" id="category_select">
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="subcategory_name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Category icon</label>
                            <input type="text" name="subcategory_icon" class="form-control" placeholder="Enter Icon">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#basicModalsub').on('show.bs.modal', function(event) {
            $.ajax({
                url: "{{ route('category.get') }}",
                type: "GET",
                success: function(response) {
                    $('#category_select').empty(); // Clear the dropdown
                    $.each(response, function(index, category) {
                        $('#category_select').append('<option value="' + category
                            .id + '">' + category.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
