    <!-- Modal -->
    <div class="modal fade" id="slidermodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control"
                                    placeholder="Enter Name">
                            </div>
                            <div class="mb-3 col-md-12">

                                <label class="form-label"> Upload Files</label>
                                <input class="form-control" type="file" name="image" id="inputImage">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
