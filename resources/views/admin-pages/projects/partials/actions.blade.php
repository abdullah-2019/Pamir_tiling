<a href="{{ $view }}" class="btn btn-sm btn-outline-secondary">
    <i class="bi bi-eye"></i>
</a>
<a href="{{ $edit }}" class="btn btn-sm btn-outline-primary">
    <i class="bi bi-pencil"></i>
</a>
<form action="{{ $delete }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this project?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger">
        <i class="bi bi-trash"></i>
    </button>
</form>