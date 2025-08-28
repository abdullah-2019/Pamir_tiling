<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Company Logo</h3>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($about && $about->logo)
            <div class="mb-3">
                <p>Current Logo:</p>
                @if ($about->logo && \Storage::disk('public')->exists($about->logo))
                    <img src="{{ asset('storage/' . $about->logo) }}" alt="logo" width="120" loading="lazy">
                @else
                    {{-- fallback: no logo uploaded --}}
                    <img src="{{ asset('images/default-logo.png') }}" alt="logo" width="120" loading="lazy">
                @endif
            </div>
        @endif

        <form action="{{ route('about.logo.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="logo" class="form-label">Upload New Logo</label>
                <input type="file" name="logo" class="form-control" required
                    accept="image/png, image/jpeg, image/svg+xml, image/webp">
                <small>png,jpg,jpeg,svg,webp</small>
                @error('logo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Logo</button>
        </form>
    </div>
</div>
