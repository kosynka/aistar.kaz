<form action="{{ route($route . '.destroy', $item->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-xs">
        <i class="bx bx-trash"></i>
    </button>
</form>
