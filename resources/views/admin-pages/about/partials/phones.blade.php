<!-- Phones Card -->
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Phones</h3>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0" role="table" id="phonesTable">
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
    <div class="card-footer clearfix">
        <a href="javascript:void(0)" class="btn btn-sm btn-success float-start btn-add-new-phone">
            Add New Phone
        </a>
    </div>
</div>

<!-- Add Phone Modal -->
<div class="modal fade" id="addPhoneModal" tabindex="-1" aria-labelledby="addPhoneModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPhoneModalLabel">Add Phone</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPhoneForm">
                    <div class="mb-3">
                        <label for="addPhoneInput" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="addPhoneInput" name="phone" required
                            placeholder="+1 555-123-4567">
                        <div class="invalid-feedback" id="addPhoneError"></div>
                    </div>
                </form>
                <div class="alert alert-danger d-none" id="addPhoneServerError"></div>
                <div class="alert alert-success d-none" id="addPhoneServerSuccess"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="addPhoneBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="addPhoneSaveSpinner"></span>
                    Add
                </button>
            </div>
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
                        <input type="tel" class="form-control" id="phoneInput" name="phone" required
                            placeholder="+1 555-123-4567">
                        <div class="invalid-feedback" id="phoneError"></div>
                    </div>
                </form>
                <div class="alert alert-danger d-none" id="phoneServerError"></div>
                <div class="alert alert-success d-none" id="phoneServerSuccess"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="savePhoneBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="savePhoneSpinner"></span>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Confirm Delete Phone Modal -->
<div class="modal fade" id="deletePhoneModal" tabindex="-1" aria-labelledby="deletePhoneModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePhoneModalLabel">Delete Phone</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="deletePhoneIndex">
                <p class="mb-0">Are you sure you want to delete this phone?</p>
                <p class="fw-semibold mt-2" id="deletePhoneText"></p>
                <div class="alert alert-danger d-none" id="deletePhoneServerError"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeletePhoneBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="deletePhoneSpinner"></span>
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Phone Toast -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <div id="phoneToast" class="toast align-items-center text-bg-success border-0" role="status" aria-live="polite"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="phoneToastBody">Phone updated successfully.</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // Reuse global AJAX CSRF setup from your page if already defined
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        let addPhoneModal, editPhoneModal, deletePhoneModal;

        document.addEventListener('DOMContentLoaded', function() {
            addPhoneModal = new bootstrap.Modal(document.getElementById('addPhoneModal'));
            editPhoneModal = new bootstrap.Modal(document.getElementById('editPhoneModal'));
            deletePhoneModal = new bootstrap.Modal(document.getElementById('deletePhoneModal'));

            // Open Add Phone modal
            $(document).on('click', '.btn-add-new-phone', function() {
                $('#addPhoneInput').val('');
                resetField('#addPhoneInput', '#addPhoneError');
                hideAlerts(['#addPhoneServerError', '#addPhoneServerSuccess']);
                $('#addPhoneSaveSpinner').addClass('d-none');
                addPhoneModal.show();
            });

            // Save added phone
            $('#addPhoneBtn').on('click', function() {
                const phone = $('#addPhoneInput').val().trim();

                if (!phone) {
                    invalidate('#addPhoneInput', '#addPhoneError', 'Phone is required.');
                    return;
                }
                if (!isValidPhone(phone)) {
                    invalidate('#addPhoneInput', '#addPhoneError', 'Please enter a valid phone number.');
                    return;
                }

                resetField('#addPhoneInput', '#addPhoneError');
                $('#addPhoneSaveSpinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route('about.phones.create', $about->id) }}',
                    type: 'POST',
                    data: {
                        phone,
                        id: "{{ $about->id }}"
                    },
                    success: function(response) {
                        $('#addPhoneSaveSpinner').addClass('d-none');

                        if (response && response.success) {
                            const newIndex = (typeof response.index !== 'undefined') ?
                                response.index :
                                $('#phonesTable tbody tr').length;

                            const safePhone = $('<div>').text(response.phone).html();

                            const newRowHtml =
                                '<tr data-index="' + newIndex + '">' +
                                '<td class="row-number"></td>' +
                                '<td class="phone-cell">' + safePhone + '</td>' +
                                '<td class="text-end">' +
                                '<button type="button" class="btn btn-primary btn-sm btn-edit-phone me-1" data-index="' +
                                newIndex + '" data-phone="' + safePhone + '">Edit</button>' +
                                '<button type="button" class="btn btn-danger btn-sm btn-delete-phone" data-index="' +
                                newIndex + '" data-phone="' + safePhone + '">Delete</button>' +
                                '</td>' +
                                '</tr>';

                            $('#phonesTable tbody').append(newRowHtml);
                            reindexPhoneRows();
                            addPhoneModal.hide();
                            showPhoneToast('Phone added successfully.');
                        } else {
                            showServerError('#addPhoneServerError', response && response
                                .message ? response.message :
                                'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#addPhoneSaveSpinner').addClass('d-none');
                        handleAjaxPhoneError(xhr, '#addPhoneInput', '#addPhoneError',
                            '#addPhoneServerError');
                    }
                });
            });

            // Open Edit Phone modal
            $(document).on('click', '.btn-edit-phone', function() {
                const index = $(this).data('index');
                const phone = $(this).data('phone') ?? '';
                $('#phoneIndex').val(index);
                $('#phoneInput').val(phone);
                resetField('#phoneInput', '#phoneError');
                hideAlerts(['#phoneServerError', '#phoneServerSuccess']);
                $('#savePhoneSpinner').addClass('d-none');
                editPhoneModal.show();
            });

            // Save edited phone
            $('#savePhoneBtn').on('click', function() {
                const index = $('#phoneIndex').val();
                const phone = $('#phoneInput').val().trim();

                if (!phone) {
                    invalidate('#phoneInput', '#phoneError', 'Phone is required.');
                    return;
                }
                if (!isValidPhone(phone)) {
                    invalidate('#phoneInput', '#phoneError', 'Please enter a valid phone number.');
                    return;
                }

                resetField('#phoneInput', '#phoneError');
                $('#savePhoneSpinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route('about.phones.update', $about->id) }}',
                    type: 'PUT',
                    data: {
                        index,
                        phone
                    },
                    success: function(response) {
                        $('#savePhoneSpinner').addClass('d-none');

                        if (response && response.success) {
                            const row = $('#phonesTable tbody tr[data-index="' + response
                                .index + '"]');
                            if (row.length) {
                                row.find('.phone-cell').text(response.phone);
                                row.find('.btn-edit-phone').data('phone', response.phone);
                                row.find('.btn-delete-phone').data('phone', response.phone);
                            }
                            editPhoneModal.hide();
                            showPhoneToast('Phone updated successfully.');
                        } else {
                            showServerError('#phoneServerError', response && response.message ?
                                response.message : 'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#savePhoneSpinner').addClass('d-none');
                        handleAjaxPhoneError(xhr, '#phoneInput', '#phoneError',
                            '#phoneServerError');
                    }
                });
            });

            // Open Delete Phone modal
            $(document).on('click', '.btn-delete-phone', function() {
                const index = $(this).data('index');
                const phone = $(this).data('phone') ?? '';
                $('#deletePhoneIndex').val(index);
                $('#deletePhoneText').text(phone);
                hideAlerts(['#deletePhoneServerError']);
                $('#deletePhoneSpinner').addClass('d-none');
                deletePhoneModal.show();
            });

            // Confirm delete phone
            $('#confirmDeletePhoneBtn').on('click', function() {
                const index = $('#deletePhoneIndex').val();
                $('#deletePhoneSpinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route('about.phones.destroy', $about->id) }}',
                    type: 'DELETE',
                    data: {
                        index
                    },
                    success: function(response) {
                        $('#deletePhoneSpinner').addClass('d-none');

                        if (response && response.success) {
                            const row = $('#phonesTable tbody tr[data-index="' + response
                                .index + '"]');
                            row.remove();
                            reindexPhoneRows();
                            deletePhoneModal.hide();
                            showPhoneToast('Phone deleted successfully.');
                        } else {
                            showServerError('#deletePhoneServerError', response && response
                                .message ? response.message :
                                'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#deletePhoneSpinner').addClass('d-none');
                        const msg = xhr.responseJSON && xhr.responseJSON.message ?
                            xhr.responseJSON.message :
                            'An error occurred. Please try again.';
                        showServerError('#deletePhoneServerError', msg);
                    }
                });
            });

            // Modal cleanup
            $('#addPhoneModal').on('hidden.bs.modal', function() {
                resetField('#addPhoneInput', '#addPhoneError');
                hideAlerts(['#addPhoneServerError', '#addPhoneServerSuccess']);
                $('#addPhoneSaveSpinner').addClass('d-none');
                $('#addPhoneForm')[0].reset();
            });
            $('#editPhoneModal').on('hidden.bs.modal', function() {
                resetField('#phoneInput', '#phoneError');
                hideAlerts(['#phoneServerError', '#phoneServerSuccess']);
                $('#savePhoneSpinner').addClass('d-none');
                $('#editPhoneForm')[0].reset();
            });
            $('#deletePhoneModal').on('hidden.bs.modal', function() {
                hideAlerts(['#deletePhoneServerError']);
                $('#deletePhoneSpinner').addClass('d-none');
                $('#deletePhoneIndex').val('');
                $('#deletePhoneText').text('');
            });

            // Utilities
            function reindexPhoneRows() {
                $('#phonesTable tbody tr').each(function(i) {
                    $(this).attr('data-index', i);
                    $(this).find('.row-number').text(i + 1);
                    $(this).find('.btn-edit-phone').data('index', i);
                    $(this).find('.btn-delete-phone').data('index', i);
                });
            }

            function showPhoneToast(message) {
                const toastEl = document.getElementById('phoneToast');
                document.getElementById('phoneToastBody').innerText = message;
                new bootstrap.Toast(toastEl).show();
            }

            function handleAjaxPhoneError(xhr, inputSelector, feedbackSelector, serverSelector) {
                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                    const errs = xhr.responseJSON.errors;
                    if (errs.phone && errs.phone[0]) {
                        invalidate(inputSelector, feedbackSelector, errs.phone[0]);
                        return;
                    }
                }
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    showServerError(serverSelector, xhr.responseJSON.message);
                } else {
                    showServerError(serverSelector, 'An error occurred. Please try again.');
                }
            }

            function invalidate(inputSelector, feedbackSelector, message) {
                $(inputSelector).addClass('is-invalid');
                $(feedbackSelector).text(message).show();
            }

            function resetField(inputSelector, feedbackSelector) {
                $(inputSelector).removeClass('is-invalid');
                $(feedbackSelector).text('').hide();
            }

            function hideAlerts(selectors) {
                selectors.forEach(sel => $(sel).addClass('d-none').text(''));
            }

            function showServerError(selector, message) {
                $(selector).removeClass('d-none').text(message);
            }

            // Simple phone validator: digits, spaces, dashes, parentheses, leading +
            function isValidPhone(value) {
                const pattern = /^\+?[0-9()\-\s]{6,}$/;
                return pattern.test(value);
            }
        });
    </script>
@endpush
