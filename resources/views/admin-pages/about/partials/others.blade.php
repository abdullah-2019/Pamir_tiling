<div class="card">
    <div class="card-header">
        <h3 class="card-title">Other</h3>
    </div>
    <div class="card-body">
        <div class="accordion" id="about_other_detials">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Company Creation Date
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#about_other_detials"
                    style="">
                    <div class="accordion-body">
                        {{ $about->company_creation_date }}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Awards
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#about_other_detials">
                    <div class="accordion-body">
                        {{ $about->awards }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer clearfix">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary float-start btn-edit-other">
            Edit
        </a>
    </div>
</div>

<!-- Edit other Modal -->
@include('admin-pages.about.partials.other-edit-modal')

<!-- Toasts -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <div id="otherToast" class="toast align-items-center text-bg-success border-0" role="status" aria-live="polite"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="otherToastBody">Data updated successfully.</div>
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
            otherEditModal = new bootstrap.Modal(document.getElementById('editOtherModal'));
            // Open Edit modal
            $(document).on('click', '.btn-edit-other', function() {
                otherEditModal.show();
            });
            // Save more info to db
            $(document).on('click', '#saveOtherBtn', function() {
                const company_creation_date = $("#input_ccd").val().trim();
                const awards = $("#input_award").val().trim();
                if (!company_creation_date) {
                    $('#input_ccd').addClass('is-invalid');
                    $('#ccd_Error').text('Company Creation Date is required.').show();
                    return;
                }
                if (!awards) {
                    $('#input_award').addClass('is-invalid');
                    $('#award_Error').text('Award is required.').show();
                    return;
                }
                $('#input_ccd').removeClass('is-invalid');
                $('#input_award').removeClass('is-invalid');
                $('#ccd_Error').text('').hide();
                $('#award_Error').text('').hide();
                $('#oi-saveSpinner').removeClass('d-none');
                $.ajax({
                    url: '{{ route('about.other-info.update', $about->id) }}',
                    type: 'POST',
                    data: {
                        id: "{{$about->id}}",
                        company_creation_date,
                        awards
                    },
                    success: function(response) {
                        $('#io-saveSpinner').addClass('d-none');

                        if (response && response.success) {
                            otherEditModal.hide();
                            showToast('Data updated successfully.');
                        } else {
                            $('#oi-serverError').removeClass('d-none').text(
                                'Unexpected response from server.');
                        }
                    },
                    error: function(xhr) {
                        $('#oi-saveSpinner').addClass('d-none');
                        handleAjaxError(xhr, '#input_ccd', '#ccd_Error', '#oi-serverError');
                    }
                });
            });
            function showToast(message) {
                const toastEl = document.getElementById('otherToast');
                document.getElementById('otherToastBody').innerText = message;
                new bootstrap.Toast(toastEl).show();
            }
        });
    </script>
@endpush
