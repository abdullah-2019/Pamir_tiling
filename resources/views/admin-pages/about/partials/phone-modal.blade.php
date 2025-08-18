<!-- Edit Phone Modal -->
<div class="modal fade" id="editEmailModal" tabindex="-1" aria-labelledby="editEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmailModalLabel">Edit Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editEmailForm">
                    <input type="hidden" name="index" id="emailIndex">
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailInput" name="email" required>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                </form>
                <div class="alert alert-danger d-none" id="serverError"></div>
                <div class="alert alert-success d-none" id="serverSuccess"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveEmailBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="saveSpinner"></span>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>