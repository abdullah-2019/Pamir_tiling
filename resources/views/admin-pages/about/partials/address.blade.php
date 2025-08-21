<div class="card">
    <div class="card-header">
        <h3 class="card-title">Address</h3>
    </div>
    <div class="card-body">
        <div class="accordion" id="about_address_details">
            <!-- Country -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Country
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#about_address_details">
                    <div class="accordion-body d-flex align-items-start justify-content-between gap-3">
                        <div id="countryDisplay" class="flex-grow-1">{{ $about->country }}</div>
                        <button type="button" class="btn btn-sm btn-primary" id="btnEditCountry"
                            data-current="{{ $about->country }}">Edit</button>
                    </div>
                </div>
            </div>

            <!-- City -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        City
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#about_address_details">
                    <div class="accordion-body d-flex align-items-start justify-content-between gap-3">
                        <div id="cityDisplay" class="flex-grow-1">{{ $about->city }}</div>
                        <button type="button" class="btn btn-sm btn-primary" id="btnEditCity"
                            data-current="{{ $about->city }}">Edit</button>
                    </div>
                </div>
            </div>

            <!-- Location/Address -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Location
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#about_address_details">
                    <div class="accordion-body d-flex align-items-start justify-content-between gap-3">
                        <div id="addressDisplay" class="flex-grow-1">{{ $about->address ?? 'No address available' }}</div>
                        <button type="button" class="btn btn-sm btn-primary" id="btnEditAddress"
                            data-current="{{ $about->address }}">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reusable Edit Address Field Modal -->
<div class="modal fade" id="editAddressFieldModal" tabindex="-1" aria-labelledby="editAddressFieldModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAddressFieldModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAddressFieldForm">
                    <input type="hidden" id="fieldType" value="">
                    <div class="mb-3">
                        <label for="addressFieldInput" class="form-label" id="addressFieldLabel">Value</label>
                        <input type="text" class="form-control" id="addressFieldInput" required>
                        <div class="invalid-feedback" id="addressFieldError"></div>
                    </div>
                </form>
                <div class="alert alert-danger d-none" id="addressServerError"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveAddressFieldBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="saveAddressSpinner"></span>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <div id="addressToast" class="toast align-items-center text-bg-success border-0" role="status" aria-live="polite"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="addressToastBody">Updated successfully.</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    });

    let editAddrModal;

    document.addEventListener('DOMContentLoaded', function() {
        editAddrModal = new bootstrap.Modal(document.getElementById('editAddressFieldModal'));

        // Open modal handlers
        $('#btnEditCountry').on('click', function() {
            openEditModal('country', 'Country', $(this).data('current') ?? '');
        });

        $('#btnEditCity').on('click', function() {
            openEditModal('city', 'City', $(this).data('current') ?? '');
        });

        $('#btnEditAddress').on('click', function() {
            openEditModal('address', 'Location', $(this).data('current') ?? '');
        });

        // Save
        $('#saveAddressFieldBtn').on('click', function() {
            const type = $('#fieldType').val();
            const value = $('#addressFieldInput').val().trim();

            if (!value) {
                invalidate('#addressFieldInput', '#addressFieldError', 'This field is required.');
                return;
            }
            resetField('#addressFieldInput', '#addressFieldError');
            $('#saveAddressSpinner').removeClass('d-none');

            let url = '';
            if (type === 'country') {
                url = '{{ route('about.address.updateCountry', $about->id) }}';
            } else if (type === 'city') {
                url = '{{ route('about.address.updateCity', $about->id) }}';
            } else if (type === 'address') {
                url = '{{ route('about.address.updateAddress', $about->id) }}';
            } else {
                $('#saveAddressSpinner').addClass('d-none');
                return;
            }

            $.ajax({
                url: url,
                type: 'PUT',
                data: { value: value },
                success: function(response) {
                    $('#saveAddressSpinner').addClass('d-none');

                    if (response && response.success) {
                        const safeVal = $('<div>').text(response.value).html();
                        if (type === 'country') {
                            $('#countryDisplay').text(response.value);
                            $('#btnEditCountry').data('current', response.value);
                        } else if (type === 'city') {
                            $('#cityDisplay').text(response.value);
                            $('#btnEditCity').data('current', response.value);
                        } else if (type === 'address') {
                            $('#addressDisplay').text(response.value || 'No address available');
                            $('#btnEditAddress').data('current', response.value);
                        }
                        editAddrModal.hide();
                        showAddressToast('Updated successfully.');
                    } else {
                        showServerError('#addressServerError', response && response.message ? response.message : 'Unexpected response from server.');
                    }
                },
                error: function(xhr) {
                    $('#saveAddressSpinner').addClass('d-none');
                    if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors && xhr.responseJSON.errors.value) {
                        invalidate('#addressFieldInput', '#addressFieldError', xhr.responseJSON.errors.value[0]);
                    } else {
                        const msg = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred. Please try again.';
                        showServerError('#addressServerError', msg);
                    }
                }
            });
        });

        // Modal cleanup
        $('#editAddressFieldModal').on('hidden.bs.modal', function() {
            resetField('#addressFieldInput', '#addressFieldError');
            $('#addressServerError').addClass('d-none').text('');
            $('#saveAddressSpinner').addClass('d-none');
            $('#editAddressFieldForm')[0].reset();
            $('#fieldType').val('');
        });

        // Helpers
        function openEditModal(type, label, current) {
            $('#fieldType').val(type);
            $('#addressFieldLabel').text(label);
            $('#editAddressFieldModalLabel').text('Edit ' + label);
            $('#addressFieldInput').val(current || '');
            resetField('#addressFieldInput', '#addressFieldError');
            $('#addressServerError').addClass('d-none').text('');
            $('#saveAddressSpinner').addClass('d-none');
            editAddrModal.show();
        }

        function showAddressToast(message) {
            const toastEl = document.getElementById('addressToast');
            document.getElementById('addressToastBody').innerText = message;
            new bootstrap.Toast(toastEl).show();
        }

        function invalidate(inputSelector, feedbackSelector, message) {
            $(inputSelector).addClass('is-invalid');
            $(feedbackSelector).text(message).show();
        }
        function resetField(inputSelector, feedbackSelector) {
            $(inputSelector).removeClass('is-invalid');
            $(feedbackSelector).text('').hide();
        }
        function showServerError(selector, message) {
            $(selector).removeClass('d-none').text(message);
        }
    });
</script>
@endpush