<div class="modal fade" id="addEmailModal" tabindex="-1" aria-labelledby="addEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmailModalLabel">Add New Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEmailForm">
                    <div class="mb-3">
                        <label for="addEmailInput" class="form-label">Email</label>
                        <input type="email" class="form-control" id="addEmailInput" name="email" required>
                        <div class="invalid-feedback" id="addEmailError"></div>
                    </div>
                </form>
                <div class="alert alert-danger d-none" id="addServerError"></div>
                <div class="alert alert-success d-none" id="addServerSuccess"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="addEmailBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="addSaveSpinner"></span>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
