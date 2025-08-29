<a href="{{ $edit }}" class="btn btn-sm btn-outline-primary">
    <i class="bi bi-pencil"></i>
</a>
<form action="{{ $delete }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger">
        <i class="bi bi-trash"></i>
    </button>
</form>