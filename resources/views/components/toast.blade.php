<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
    <div id="toast" class="toast align-items-center text-bg-{{ $type ?? 'success' }} border-0" role="status"
        aria-live="polite" aria-atomic="true" data-bs-delay="{{ $delay ?? 3000 }}">
        <div class="d-flex">
            <div class="toast-body">{{ $message }}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
