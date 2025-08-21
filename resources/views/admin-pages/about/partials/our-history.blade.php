<div class="card">
    <div class="card-header">
        <h3 class="card-title">Our History</h3>
    </div>
    <div class="card-body">
        <div class="accordion" id="about_our_history">
            <div class="accordion-body" id="about_our_history_detail">
                {{ $about->our_history }}
            </div>
        </div>
    </div>
    <div class="card-footer clearfix">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary float-start btn-edit-our-history">
            Edit
        </a>
    </div>
</div>

<!-- Edit other Modal -->
@include('admin-pages.about.partials.our-history-edit-modal')

<!-- Toasts -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <div id="ohToast" class="toast align-items-center text-bg-success border-0" role="status" aria-live="polite"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="ohToastBody">Data updated successfully.</div>
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
        let otherEditModal;
        document.addEventListener('DOMContentLoaded', function() {
            otherEditModal = new bootstrap.Modal(document.getElementById('ourHistoryEditModal'));
            // Open Edit modal
            $(document).on('click', '.btn-edit-our-history', function() {
                otherEditModal.show();
            });
            // Save more info to db
            $(document).on('click', '#btnSaveOurHistory', function() {
                const our_history = $("#input_our_history").val().trim();
                if (!our_history) {
                    $('#input_our_history').addClass('is-invalid');
                    $('#oh_Error').text('Company Creation Date is required.').show();
                    return;
                }
                $('#input_our_history').removeClass('is-invalid');
                $('#oh_Error').text('').hide();
                $('#oh-saveSpinner').removeClass('d-none');
                $.ajax({
                    url: '{{ route('about.our-history.update', $about->id) }}',
                    type: 'POST',
                    data: {
                        id: "{{ $about->id }}",
                        our_history
                    },
                    success: function(response) {
                        $('#oh-saveSpinner').addClass('d-none');

                        if (response && response.success) {
                            otherEditModal.hide();
                            $("#about_our_history_detail").text(our_history);
                            console.log(response.our_history);
                            showToast('Data updated successfully.');
                        } else {
                            $('#oh-serverError').removeClass('d-none').text(
                                'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#oh-saveSpinner').addClass('d-none');
                        handleAjaxError(xhr, '#input_our_history', '#oh_Error',
                            '#oh-serverError');
                    }
                });
            });

            function showToast(message) {
                const toastEl = document.getElementById('ohToast');
                document.getElementById('ohToastBody').innerText = message;
                new bootstrap.Toast(toastEl).show();
            }
        });
    </script>
@endpush
