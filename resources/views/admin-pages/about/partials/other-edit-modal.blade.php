<div class="modal fade" id="editOtherModal" tabindex="-1" aria-labelledby="editOtherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOtherModalLabel">Update Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="other-info-update-form">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="input_ccd" name="input_ccd"
                            placeholder="" value="{{ $about->company_creation_date ?? '2010' }}" min="1900"
                            max="{{ date('Y') }}">
                        <label for="input_ccd">Company Creation Date</label>
                        <div class="invalid-feedback" id="ccd_Error"></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="input_award" placeholder=""
                            value="{{ $about->awards ?? 0 }}" min="0" name="input_award">
                        <label for="input_award">Awards</label>
                        <div class="invalid-feedback" id="award_Error"></div>
                    </div>
                </form>
                <div class="alert alert-danger d-none" id="oi-serverError"></div>
                <div class="alert alert-success d-none" id="oi-serverSuccess"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveOtherBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="oi-saveSpinner"></span>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
