<a href="{{ $view }}" class="btn btn-sm btn-outline-secondary">View</a>
<a href="{{ $edit }}" class="btn btn-sm btn-outline-primary">Edit</a>
<form action="{{ $delete }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this contact?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
</form>