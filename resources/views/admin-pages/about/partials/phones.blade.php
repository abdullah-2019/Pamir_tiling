<!-- Phone Card -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Phones</h3>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0" role="table" id="phoneTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Phone</th>
                        <th scope="col" class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (is_array($about->phones))
                        @foreach ($about->phones as $index => $phone)
                            <tr data-index="{{ $index }}">
                                <td class="row-number">{{ $loop->iteration }}</td>
                                <td class="phone-cell">{{ $phone }}</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-primary btn-sm btn-edit-phone me-1"
                                        data-index="{{ $index }}" data-phone="{{ $phone }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete-phone"
                                        data-index="{{ $index }}" data-phone="{{ $phone }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Phone Modal -->
<div class="modal fade" id="editPhoneModal" tabindex="-1" aria-labelledby="editPhoneModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPhoneModalLabel">Edit Phone</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPhoneForm">
                    <input type="hidden" name="index" id="phoneIndex">
                    <div class="mb-3">
                        <label for="phoneInput" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phoneInput" name="phone" required>
                        <div class="invalid-feedback" id="phoneError"></div>
                    </div>
                </form>
                <div class="alert alert-danger d-none" id="serverError"></div>
                <div class="alert alert-success d-none" id="serverSuccess"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="savePhoneBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="saveSpinner"></span>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="deletePhoneModal" tabindex="-1" aria-labelledby="deletePhoneModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePhoneModalLabel">Delete Phone</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="deletephoneIndex">
                <p class="mb-0">Are you sure you want to delete this phone?</p>
                <p class="fw-semibold mt-2" id="deletePhoneText"></p>
                <div class="alert alert-danger d-none" id="deleteServerError"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtnPhone">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="deleteSpinner"></span>
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toasts -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <div id="phoneToast" class="toast align-items-center text-bg-success border-0" role="status" aria-live="polite"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastBody">Phone updated successfully.</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        let editPhoneModal, deletePhoneModal;
        document.addEventListener('DOMContentLoaded', function() {
            editPhoneModal = new bootstrap.Modal(document.getElementById('editPhoneModal'));
            deletePhoneModal = new bootstrap.Modal(document.getElementById('deletePhoneModal'));

            // Open Edit modal
            $(document).on('click', '.btn-edit-phone', function() {
                const index = $(this).data('index');
                const phone = $(this).data('phone');
                $('#phoneIndex').val(index);
                $('#phoneInput').val(phone);
                $('#phoneInput').removeClass('is-invalid');
                $('#phoneError').text('').hide();
                $('#serverError').addClass('d-none').text('');
                $('#serverSuccess').addClass('d-none').text('');
                $('#saveSpinner').addClass('d-none');
                editPhoneModal.show();
            });

            // Save edited phone
            $('#savePhoneBtn').on('click', function() {
                const index = $('#phoneIndex').val();
                const phone = $('#phoneInput').val().trim();

                if (!phone) {
                    $('#phoneInput').addClass('is-invalid');
                    $('#phoneError').text('Phone is required.').show();
                    return;
                }
                $('#phoneInput').removeClass('is-invalid');
                $('#phoneError').text('').hide();
                $('#saveSpinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route('about.phones.update', $about->id) }}',
                    type: 'PUT',
                    data: {
                        index,
                        phone
                    },
                    success: function(response) {
                        $('#saveSpinner').addClass('d-none');

                        if (response && response.success) {
                            const row = $('#phoneTable tbody tr[data-index="' + response
                                .index + '"]');
                            row.find('.phone-cell').text(response.phone);
                            row.find('.btn-edit-phone').data('phone', response.phone);
                            row.find('.btn-delete-phone').data('phone', response.phone);
                            editPhoneModal.hide();
                            showToast('Phone updated successfully.');
                        } else {
                            $('#serverError').removeClass('d-none').text(
                                'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#saveSpinner').addClass('d-none');
                        handleAjaxError(xhr, '#phoneInput', '#phoneError', '#serverError');
                    }
                });
            });

            // Open Delete modal
            $(document).on('click', '.btn-delete-phone', function() {
                const index = $(this).data('index');
                const phone = $(this).data('phone');
                $('#deletephoneIndex').val(index);
                $('#deletePhoneText').text(phone);
                $('#deleteServerError').addClass('d-none').text('');
                $('#deleteSpinner').addClass('d-none');
                deletePhoneModal.show();
            });

            // Confirm delete
            $('#confirmDeleteBtnPhone').on('click', function() {
                const index = $('#deletephoneIndex').val();
                $('#deleteSpinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route('about.phones.destroy', $about->id) }}',
                    type: 'DELETE',
                    data: {
                        index
                    },
                    success: function(response) {
                        $('#deleteSpinner').addClass('d-none');

                        if (response && response.success) {
                            // Remove row
                            const row = $('#phoneTable tbody tr[data-index="' + response
                                .index + '"]');
                            row.remove();

                            // Re-index remaining rows' data-index and display numbers
                            reindexPhoneRows();

                            deletePhoneModal.hide();
                            showToast('Phone deleted successfully.');
                        } else {
                            $('#deleteServerError').removeClass('d-none').text(response
                                .message || 'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#deleteSpinner').addClass('d-none');
                        const msg = xhr.responseJSON && xhr.responseJSON.message ?
                            xhr.responseJSON.message :
                            'An error occurred. Please try again.';
                        $('#deleteServerError').removeClass('d-none').text(msg);
                    }
                });
            });

            function reindexPhoneRows() {
                $('#phoneTable tbody tr').each(function(i) {
                    // Update visible row number
                    $(this).find('.row-number').text(i + 1);
                    // Update data-index on row and buttons
                    $(this).attr('data-index', i);
                    $(this).find('.btn-edit-phone').data('index', i);
                    $(this).find('.btn-delete-phone').data('index', i);
                });
            }

            function showToast(message) {
                const toastEl = document.getElementById('phoneToast');
                document.getElementById('toastBody').innerText = message;
                new bootstrap.Toast(toastEl).show();
            }

            function handleAjaxError(xhr, inputSelector, feedbackSelector, serverSelector) {
                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                    const errs = xhr.responseJSON.errors;
                    if (errs.phone && errs.phone[0]) {
                        $(inputSelector).addClass('is-invalid');
                        $(feedbackSelector).text(errs.phone[0]).show();
                        return;
                    }
                }
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    $(serverSelector).removeClass('d-none').text(xhr.responseJSON.message);
                } else {
                    $(serverSelector).removeClass('d-none').text('An error occurred. Please try again.');
                }
            }
        });
    </script>
@endpush
