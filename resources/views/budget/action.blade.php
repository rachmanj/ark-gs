<form action="{{ route('budgets.destroy', $model) }}" method="POST">
    @csrf @method('DELETE')
    <a href="{{ route('budgets.edit', $model) }}" class="btn btn-outline-warning btn-sm"><i class="icon-pencil"></i></a>
    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="icon-trash"></i></button>
</form>