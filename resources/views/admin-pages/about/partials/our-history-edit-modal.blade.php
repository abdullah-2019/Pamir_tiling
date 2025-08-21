<div class="modal fade" id="ourHistoryEditModal" tabindex="-1" aria-labelledby="ourHistoryEditModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ourHistoryEditModalLabel">Update Our History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="our-history-update-form">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="input_our_history" name="input_our_history" placeholder=""
                            >{{ $about->our_history ?? '' }}</textarea>
                        <label for="input_our_history">Our History</label>
                        <div class="invalid-feedback" id="oh_Error"></div>
                    </div>
                </form>
                <div class="alert alert-danger d-none" id="oh-serverError"></div>
                <div class="alert alert-success d-none" id="oh-serverSuccess"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnSaveOurHistory">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="oh-saveSpinner"></span>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
