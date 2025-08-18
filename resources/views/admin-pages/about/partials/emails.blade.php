
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

@include('admin-pages.about.partials.add-email-medal')

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
<div class="modal fade" id="deleteEmailModal" tabindex="-1" aria-labelledby="deleteEmailModalLabel" aria-hidden="true">
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
                const email = $(this).data('email');
                $('#emailIndex').val(index);
                $('#emailInput').val(email);
                $('#emailInput').removeClass('is-invalid');
                $('#emailError').text('').hide();
                $('#serverError').addClass('d-none').text('');
                $('#serverSuccess').addClass('d-none').text('');
                $('#saveSpinner').addClass('d-none');
                editModal.show();
            });

            // Save edited email
            $('#saveEmailBtn').on('click', function() {
                const index = $('#emailIndex').val();
                const email = $('#emailInput').val().trim();

                if (!email) {
                    $('#emailInput').addClass('is-invalid');
                    $('#emailError').text('Email is required.').show();
                    return;
                }
                $('#emailInput').removeClass('is-invalid');
                $('#emailError').text('').hide();
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
                            row.find('.email-cell').text(response.email);
                            row.find('.btn-edit-email').data('email', response.email);
                            row.find('.btn-delete-email').data('email', response.email);
                            editModal.hide();
                            showToast('Email updated successfully.');
                        } else {
                            $('#serverError').removeClass('d-none').text(
                                'Unexpected response from server.');
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
                const email = $(this).data('email');
                $('#deleteEmailIndex').val(index);
                $('#deleteEmailText').text(email);
                $('#deleteServerError').addClass('d-none').text('');
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
                            // Remove row
                            const row = $('#emailsTable tbody tr[data-index="' + response
                                .index + '"]');
                            row.remove();

                            // Re-index remaining rows' data-index and display numbers
                            reindexEmailRows();

                            deleteModal.hide();
                            showToast('Email deleted successfully.');
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
            
            // Open Add Email modal
            $(document).on('click', '.btn-add-new-email', function() {
                const email = $(this).data('email');
                $('#addEmailInput').val(email);
                $('#addEmailInput').removeClass('is-invalid');
                $('#addEmailError').text('').hide();
                $('#addServerError').addClass('d-none').text('');
                $('#addServerSuccess').addClass('d-none').text('');
                $('#addSaveSpinner').addClass('d-none');
                addModal.show();
            });

            // Save added email
            $('#addEmailBtn').on('click', function() {
                const email = $('#addEmailInput').val().trim();

                if (!email) {
                    $('#addEmailInput').addClass('is-invalid');
                    $('#addEmailError').text('Email is required.').show();
                    return;
                }
                $('#addEmailInput').removeClass('is-invalid');
                $('#addEmailError').text('').hide();
                $('#addSaveSpinner').removeClass('d-none');
                $.ajax({
                    url: '{{ route('about.emails.create', $about->id) }}',
                    type: 'POST',
                    data: {
                        email,
                        id: "{{$about->id}}"
                    },
                    success: function(response) {
                        $('#addSaveSpinner').addClass('d-none');

                        if (response && response.success) {
                            addModal.hide();
                            showToast('Email added successfully.');
                        } else {
                            $('#addServerError').removeClass('d-none').text(
                                'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#addSaveSpinner').addClass('d-none');
                        handleAjaxError(xhr, '#addEmailInput', '#addEmailError', '#addServerError');
                    }
                });
            });
            function reindexEmailRows() {
                $('#emailsTable tbody tr').each(function(i) {
                    // Update visible row number
                    $(this).find('.row-number').text(i + 1);
                    // Update data-index on row and buttons
                    $(this).attr('data-index', i);
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
                        $(inputSelector).addClass('is-invalid');
                        $(feedbackSelector).text(errs.email[0]).show();
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
