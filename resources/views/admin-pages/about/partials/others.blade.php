<div class="container py-4">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Other</h3>
        </div>
        <div class="card-body">
            <div class="accordion" id="about_other_detials">
                <!-- Company Creation Date -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingDate">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Company Creation Date
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#about_other_detials">
                        <div class="accordion-body">

                            <div class="mb-2">
                                <strong>Current:</strong>
                                <span id="currentCompanyCreationDate">
                                    {{ $about->company_creation_date }}
                                </span>
                            </div>

                            <form id="companyCreationDateForm" class="row gy-2 gx-2 align-items-end">
                                @csrf
                                @method('PATCH')

                                <div class="col-12 col-sm-6">
                                    <label for="company_creation_date" class="form-label">New Date</label>
                                    <input type="number" class="form-control" id="company_creation_date"
                                        name="company_creation_date"
                                        value="{{ $about->company_creation_date ?? old('company_creation_date') }}" min="1900" max="{{date('Y')}}">
                                    <div class="invalid-feedback" id="company_creation_date_error"></div>
                                </div>

                                <div class="col-12 col-sm-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Save Date
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- Awards -->
                <div class="accordion-item mt-3">
                    <h2 class="accordion-header" id="headingAwards">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Awards
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#about_other_detials">
                        <div class="accordion-body">

                            <div class="mb-2">
                                <strong>Current:</strong>
                                <div id="currentAwards" class="border rounded p-2 bg-light">
                                    {!! nl2br(e($about->awards)) !!}
                                </div>
                            </div>

                            <form id="awardsForm" class="row gy-2 gx-2">
                                @csrf
                                @method('PATCH')

                                <div class="col-12">
                                    <label for="awards" class="form-label">Edit Awards</label>
                                    <input type="number" min="0" class="form-control" id="awards" name="awards" value="{{$about->awards ?? old('awards')}}">
                                    <div class="invalid-feedback" id="awards_error"></div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        Save Awards
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

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

</div>


@push('scripts')
    <script>
        // Helper to show Bootstrap 5 toast
        function showToast(message, type = 'success') {
            const toastEl = document.getElementById('otherToast');
            const toastBody = document.getElementById('otherToastBody');

            // Toggle contextual color
            toastEl.classList.remove('text-bg-success', 'text-bg-danger', 'text-bg-warning');
            toastEl.classList.add(type === 'success' ? 'text-bg-success' : (type === 'error' ? 'text-bg-danger' :
                'text-bg-warning'));

            toastBody.textContent = message;

            const toast = bootstrap.Toast.getOrCreateInstance(toastEl, {
                delay: 2500
            });
            toast.show();
        }

        function clearFieldError(inputId, errorId) {
            const input = document.getElementById(inputId);
            const error = document.getElementById(errorId);
            if (input) input.classList.remove('is-invalid');
            if (error) error.textContent = '';
        }

        function setFieldError(inputId, errorId, message) {
            const input = document.getElementById(inputId);
            const error = document.getElementById(errorId);
            if (input) input.classList.add('is-invalid');
            if (error) error.textContent = message;
        }

        // Submit Company Creation Date via AJAX
        document.getElementById('companyCreationDateForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            clearFieldError('company_creation_date', 'company_creation_date_error');

            const url = "{{ route('about.other.updateCompanyCreationDate') }}";
            const token = document.querySelector('input[name="_token"]').value;
            const methodField = this.querySelector('input[name="_method"]').value;
            const payload = new FormData(this);

            try {
                const res = await fetch(url, {
                    method: 'POST', // Laravel will treat with _method=PATCH
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json',
                    },
                    body: payload
                });

                if (res.status === 422) {
                    const data = await res.json();
                    const errs = data.errors || {};
                    if (errs.company_creation_date) {
                        setFieldError('company_creation_date', 'company_creation_date_error', errs
                            .company_creation_date[0]);
                    }
                    showToast('Please fix the errors and try again.', 'error');
                    return;
                }

                if (!res.ok) {
                    showToast('Something went wrong. Please try again.', 'error');
                    return;
                }

                const data = await res.json();
                document.getElementById('currentCompanyCreationDate').textContent = data.data
                    .company_creation_date;
                showToast(data.message || 'Updated successfully.', 'success');

            } catch (err) {
                console.error(err);
                showToast('Network error. Please try again.', 'error');
            }
        });

        // Submit Awards via AJAX
        document.getElementById('awardsForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            clearFieldError('awards', 'awards_error');

            const url = "{{ route('about.other.updateAwards') }}";
            const token = document.querySelector('input[name="_token"]').value;
            const payload = new FormData(this);

            try {
                const res = await fetch(url, {
                    method: 'POST', // Laravel will treat with _method=PATCH
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json',
                    },
                    body: payload
                });

                if (res.status === 422) {
                    const data = await res.json();
                    const errs = data.errors || {};
                    if (errs.awards) {
                        setFieldError('awards', 'awards_error', errs.awards[0]);
                    }
                    showToast('Please fix the errors and try again.', 'error');
                    return;
                }

                if (!res.ok) {
                    showToast('Something went wrong. Please try again.', 'error');
                    return;
                }

                const data = await res.json();

                // Update display block with line breaks
                const currentAwardsEl = document.getElementById('currentAwards');
                currentAwardsEl.innerHTML = (data.data.awards || '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/\n/g, '<br>');

                showToast(data.message || 'Updated successfully.', 'success');

            } catch (err) {
                console.error(err);
                showToast('Network error. Please try again.', 'error');
            }
        });
    </script>
@endpush
