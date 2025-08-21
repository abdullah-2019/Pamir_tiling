<!-- Emails Card -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Emails</h3>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0" role="table" id="emailsTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (is_array($about->emails))
                        @foreach ($about->emails as $index => $email)
                            <tr data-index="{{ $index }}">
                                <td class="row-number">{{ $loop->iteration }}</td>
                                <td class="email-cell">{{ $email }}</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-primary btn-sm btn-edit-email me-1"
                                        data-index="{{ $index }}" data-email="{{ $email }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete-email"
                                        data-index="{{ $index }}" data-email="{{ $email }}">
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
        <a href="javascript:void(0)" class="btn btn-sm btn-success float-start btn-add-new-email">
            Add New Email
        </a>
    </div>
</div>

<!-- Add Email Modal (ensure this partial either matches IDs or include it here) -->
<div class="modal fade" id="addEmailModal" tabindex="-1" aria-labelledby="addEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmailModalLabel">Add Email</h5>
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
                <button type="button" class="btn btn-success" id="addEmailBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="addSaveSpinner"></span>
                    Add
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Email Modal -->
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

<!-- Confirm Delete Modal -->
<div class="modal fade" id="deleteEmailModal" tabindex="-1" aria-labelledby="deleteEmailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEmailModalLabel">Delete Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="deleteEmailIndex">
                <p class="mb-0">Are you sure you want to delete this email?</p>
                <p class="fw-semibold mt-2" id="deleteEmailText"></p>
                <div class="alert alert-danger d-none" id="deleteServerError"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="deleteSpinner"></span>
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toasts -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <div id="emailToast" class="toast align-items-center text-bg-success border-0" role="status" aria-live="polite"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastBody">Email updated successfully.</div>
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

        let editModal, deleteModal, addModal;

        document.addEventListener('DOMContentLoaded', function() {
            editModal = new bootstrap.Modal(document.getElementById('editEmailModal'));
            deleteModal = new bootstrap.Modal(document.getElementById('deleteEmailModal'));
            addModal = new bootstrap.Modal(document.getElementById('addEmailModal'));

            // Open Edit modal
            $(document).on('click', '.btn-edit-email', function() {
                const index = $(this).data('index');
                const email = $(this).data('email') ?? '';
                $('#emailIndex').val(index);
                $('#emailInput').val(email);
                resetField('#emailInput', '#emailError');
                hideAlerts(['#serverError', '#serverSuccess']);
                $('#saveSpinner').addClass('d-none');
                editModal.show();
            });

            // Save edited email
            $('#saveEmailBtn').on('click', function() {
                const index = $('#emailIndex').val();
                const email = $('#emailInput').val().trim();

                if (!email) {
                    invalidate('#emailInput', '#emailError', 'Email is required.');
                    return;
                }
                resetField('#emailInput', '#emailError');
                $('#saveSpinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route('about.emails.update', $about->id) }}',
                    type: 'PUT',
                    data: {
                        index,
                        email
                    },
                    success: function(response) {
                        $('#saveSpinner').addClass('d-none');

                        if (response && response.success) {
                            const row = $('#emailsTable tbody tr[data-index="' + response
                                .index + '"]');
                            if (row.length) {
                                row.find('.email-cell').text(response.email);
                                row.find('.btn-edit-email').data('email', response.email);
                                row.find('.btn-delete-email').data('email', response.email);
                            }
                            editModal.hide();
                            showToast('Email updated successfully.');
                        } else {
                            showServerError('#serverError', response && response.message ?
                                response.message : 'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#saveSpinner').addClass('d-none');
                        handleAjaxError(xhr, '#emailInput', '#emailError', '#serverError');
                    }
                });
            });

            // Open Delete modal
            $(document).on('click', '.btn-delete-email', function() {
                const index = $(this).data('index');
                const email = $(this).data('email') ?? '';
                $('#deleteEmailIndex').val(index);
                $('#deleteEmailText').text(email);
                hideAlerts(['#deleteServerError']);
                $('#deleteSpinner').addClass('d-none');
                deleteModal.show();
            });

            // Confirm delete
            $('#confirmDeleteBtn').on('click', function() {
                const index = $('#deleteEmailIndex').val();
                $('#deleteSpinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route('about.emails.destroy', $about->id) }}',
                    type: 'DELETE',
                    data: {
                        index
                    },
                    success: function(response) {
                        $('#deleteSpinner').addClass('d-none');

                        if (response && response.success) {
                            const row = $('#emailsTable tbody tr[data-index="' + response
                                .index + '"]');
                            row.remove();
                            reindexEmailRows();
                            deleteModal.hide();
                            showToast('Email deleted successfully.');
                        } else {
                            showServerError('#deleteServerError', response && response.message ?
                                response.message : 'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#deleteSpinner').addClass('d-none');
                        const msg = xhr.responseJSON && xhr.responseJSON.message ?
                            xhr.responseJSON.message :
                            'An error occurred. Please try again.';
                        showServerError('#deleteServerError', msg);
                    }
                });
            });

            // Open Add Email modal
            $(document).on('click', '.btn-add-new-email', function() {
                $('#addEmailInput').val('');
                resetField('#addEmailInput', '#addEmailError');
                hideAlerts(['#addServerError', '#addServerSuccess']);
                $('#addSaveSpinner').addClass('d-none');
                addModal.show();
            });

            // Save added email
            $('#addEmailBtn').on('click', function() {
                const email = $('#addEmailInput').val().trim();

                if (!email) {
                    invalidate('#addEmailInput', '#addEmailError', 'Email is required.');
                    return;
                }
                resetField('#addEmailInput', '#addEmailError');
                $('#addSaveSpinner').removeClass('d-none');

                $.ajax({
                    url: '{{ route('about.emails.create', $about->id) }}',
                    type: 'POST',
                    data: {
                        email,
                        id: "{{ $about->id }}"
                    },
                    success: function(response) {
                        $('#addSaveSpinner').addClass('d-none');

                        if (response && response.success) {
                            // If server returns the new index and email, append a new row
                            // Fallback: compute index from current row count
                            const newIndex = (typeof response.index !== 'undefined') ?
                                response.index :
                                $('#emailsTable tbody tr').length;

                            const safeEmail = $('<div>').text(response.email)
                        .html(); // ensure text
                            const newRowHtml =
                                '<tr data-index="' + newIndex + '">' +
                                '<td class="row-number"></td>' +
                                '<td class="email-cell">' + safeEmail + '</td>' +
                                '<td class="text-end">' +
                                '<button type="button" class="btn btn-primary btn-sm btn-edit-email me-1" data-index="' +
                                newIndex + '" data-email="' + safeEmail + '">Edit</button>' +
                                '<button type="button" class="btn btn-danger btn-sm btn-delete-email" data-index="' +
                                newIndex + '" data-email="' + safeEmail + '">Delete</button>' +
                                '</td>' +
                                '</tr>';

                            $('#emailsTable tbody').append(newRowHtml);
                            reindexEmailRows(); // ensure proper numbering and indices
                            addModal.hide();
                            showToast('Email added successfully.');
                        } else {
                            showServerError('#addServerError', response && response.message ?
                                response.message : 'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#addSaveSpinner').addClass('d-none');
                        handleAjaxError(xhr, '#addEmailInput', '#addEmailError',
                            '#addServerError');
                    }
                });
            });

            // When modals hide, reset forms and alerts
            $('#editEmailModal').on('hidden.bs.modal', function() {
                resetField('#emailInput', '#emailError');
                hideAlerts(['#serverError', '#serverSuccess']);
                $('#saveSpinner').addClass('d-none');
                $('#editEmailForm')[0].reset();
            });
            $('#addEmailModal').on('hidden.bs.modal', function() {
                resetField('#addEmailInput', '#addEmailError');
                hideAlerts(['#addServerError', '#addServerSuccess']);
                $('#addSaveSpinner').addClass('d-none');
                $('#addEmailForm')[0].reset();
            });
            $('#deleteEmailModal').on('hidden.bs.modal', function() {
                hideAlerts(['#deleteServerError']);
                $('#deleteSpinner').addClass('d-none');
                $('#deleteEmailIndex').val('');
                $('#deleteEmailText').text('');
            });

            function reindexEmailRows() {
                $('#emailsTable tbody tr').each(function(i) {
                    $(this).attr('data-index', i);
                    $(this).find('.row-number').text(i + 1);
                    $(this).find('.btn-edit-email').data('index', i);
                    $(this).find('.btn-delete-email').data('index', i);
                });
            }

            function showToast(message) {
                const toastEl = document.getElementById('emailToast');
                document.getElementById('toastBody').innerText = message;
                new bootstrap.Toast(toastEl).show();
            }

            function handleAjaxError(xhr, inputSelector, feedbackSelector, serverSelector) {
                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                    const errs = xhr.responseJSON.errors;
                    if (errs.email && errs.email[0]) {
                        invalidate(inputSelector, feedbackSelector, errs.email[0]);
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
        });
    </script>
@endpush
