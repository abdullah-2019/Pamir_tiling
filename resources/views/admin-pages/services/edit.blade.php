@extends('layouts.app')

@section('title', 'Edit Service')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            @if (session('status'))
                <div class="col-12">
                    <div class="callout callout-info">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data"
                id="service-form">
                @csrf
                @method('PUT')

                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="title" id="title" class="form-control"
                                            maxlength="255" required value="{{ old('title', $service->title) }}">
                                        <label for="title">Title</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            maxlength="255" required value="{{ old('slug', $service->slug) }}">
                                        <label for="slug" class="form-label">Slug</label>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <textarea name="desc" id="desc" class="form-control w-100" rows="10" required>{{ trim(old('desc', $service->desc)) }}</textarea>
                                            <label for="desc" class="form-label">Description</label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        @if (!empty($service->image))
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image"
                                                    class="img-fluid mb-2" style="max-height: 200px;" loading="lazy">
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    id="remove_image" name="remove_image">
                                                <label class="form-check-label" for="remove_image">Remove current
                                                    image</label>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="file" name="image" id="image" class="form-control"
                                            accept="image/*">
                                        <label class="input-group-text" for="image">Upload New Image</label>
                                    </div>
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Features</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Feature</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="features-tbody">
                                            @php
                                                $features = is_array($service->features)
                                                    ? $service->features
                                                    : (array) ($service->features ?? []);
                                            @endphp

                                            @if (count($features))
                                                @foreach ($features as $feature)
                                                    <tr data-value="{{ $feature }}">
                                                        <td>{{ $feature }}</td>
                                                        <td class="text-end">
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger remove-feature-btn">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </td>
                                                        <input type="hidden" name="features[]"
                                                            value="{{ $feature }}">
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="dummy-row" style="display:none">
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer d-flex gap-2">
                                    <button type="button" class="btn btn-primary flex-grow-1" id="add-feature-btn">Add New
                                        Feature</button>
                                    <button type="button" class="btn btn-outline-danger" id="clear-features-btn"
                                        title="Remove all features">Clear All</button>
                                </div>
                            </div>
                        </div>

                        <div class="col text-center mt-5">
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection

@section('js')

    <script>
        (function() {

            // Basic boot log

            console.log('[Service Edit] Script loading...');

            function qs(id) {
                return document.getElementById(id);
            }

            // Slug

            try {

                const titleEl = qs('title');

                const slugEl = qs('slug');

                if (titleEl && slugEl) {

                    titleEl.addEventListener('input', function() {

                        const value = this.value.toLowerCase()

                            .replace(/[^a-z0-9\s]/g, '')

                            .replace(/\s+/g, '_');

                        slugEl.value = value;

                    });

                }

            } catch (e) {
                console.error('Slug handler error', e);
            }

            document.addEventListener('DOMContentLoaded', function() {

                console.log('[Service Edit] DOM ready');

                const form = qs('service-form');

                const addBtn = qs('add-feature-btn');

                const clrBtn = qs('clear-features-btn');

                const tbody = qs('features-tbody');

                if (!form || !tbody) {

                    console.error('[Service Edit] Form or tbody not found.');

                    return;

                }

                function removeDummyIfPresent() {

                    const dummy = tbody.querySelector('.dummy-row');

                    if (dummy) dummy.remove();

                }

                function addDummyIfEmpty() {

                    // if no visible rows at all

                    if (!tbody.querySelector('tr')) {

                        const dummy = document.createElement('tr');

                        dummy.className = 'dummy-row';

                        dummy.style.display = 'none';

                        dummy.innerHTML = '<td></td><td></td>';

                        tbody.appendChild(dummy);

                    }

                }

                function ensureEmptyArrayWhenNoFeatures() {

                    // Remove any existing sentinel

                    form.querySelectorAll('input[name="features[]"][data-empty-sentinel="1"]').forEach(n => n
                        .remove());

                    // Count actual hidden feature inputs inside tbody

                    const current = tbody.querySelectorAll('input[name="features[]"]');

                    if (current.length === 0) {

                        const sentinel = document.createElement('input');

                        sentinel.type = 'hidden';

                        sentinel.name = 'features[]';

                        sentinel.value = '';

                        sentinel.setAttribute('data-empty-sentinel', '1');

                        form.appendChild(sentinel);

                    }

                }

                function createFeatureRow(name) {

                    const tr = document.createElement('tr');

                    const tdName = document.createElement('td');

                    tdName.textContent = name;

                    const tdAction = document.createElement('td');

                    tdAction.className = 'text-end';

                    const rm = document.createElement('button');

                    rm.type = 'button';

                    rm.className = 'btn btn-sm btn-danger remove-feature-btn';

                    rm.innerHTML = '<i class="bi bi-trash"></i>';

                    const hidden = document.createElement('input');

                    hidden.type = 'hidden';

                    hidden.name = 'features[]';

                    hidden.value = name;

                    tdAction.appendChild(rm);

                    tr.appendChild(tdName);

                    tr.appendChild(tdAction);

                    tr.appendChild(hidden);

                    return tr;

                }

                if (addBtn) {

                    addBtn.addEventListener('click', function(e) {

                        e.preventDefault();

                        const name = prompt('Enter feature name:');

                        if (!name || name.trim() === '') return;

                        removeDummyIfPresent();

                        const tr = createFeatureRow(name.trim());

                        tbody.appendChild(tr);

                        ensureEmptyArrayWhenNoFeatures();

                    });

                }

                if (clrBtn) {

                    clrBtn.addEventListener('click', function(e) {

                        e.preventDefault();

                        const rows = Array.from(tbody.querySelectorAll('tr'));

                        rows.forEach(tr => {

                            const original = tr.dataset.value;

                            if (original) {

                                const delInput = document.createElement('input');

                                delInput.type = 'hidden';

                                delInput.name = 'deleted_features[]';

                                delInput.value = original;

                                form.appendChild(delInput);

                            }

                            tr.remove();

                        });

                        addDummyIfEmpty();

                        ensureEmptyArrayWhenNoFeatures();

                    });

                }

                // Delegate remove single

                tbody.addEventListener('click', function(e) {

                    const btn = e.target.closest('.remove-feature-btn');

                    if (!btn) return;

                    e.preventDefault();

                    const tr = btn.closest('tr');

                    if (!tr) return;

                    const original = tr.dataset.value;

                    if (original) {

                        const delInput = document.createElement('input');

                        delInput.type = 'hidden';

                        delInput.name = 'deleted_features[]';

                        delInput.value = original;

                        form.appendChild(delInput);

                    }

                    tr.remove();

                    addDummyIfEmpty();

                    ensureEmptyArrayWhenNoFeatures();

                });

                // Final guard on submit

                form.addEventListener('submit', function() {

                    ensureEmptyArrayWhenNoFeatures();

                });

                console.log('[Service Edit] Handlers attached');

            });

        })();
    </script>

@endsection
