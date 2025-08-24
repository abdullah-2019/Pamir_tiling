<div class="actions-group">
    <a href="{{ $view }}" class="btn btn-sm btn-outline-secondary" title="View">
        <i class="bi bi-eye"></i>
    </a>

    <button type="button"
            class="btn btn-sm btn-outline-primary btn-toggle-status"
            data-url="{{ $toggleStatus }}"
            title="{{ $row->status ? 'Mark as Unread' : 'Mark as Read' }}">
        @if ($row->status)
            <i class="bi bi-envelope-open"></i>
        @else
            <i class="bi bi-envelope"></i>
        @endif
    </button>

    <form action="{{ $delete }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this contact?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</div>