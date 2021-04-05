@role(['superadmin', 'admin'])
<form action="{{ route('history.destroy', $model) }}" method="POST">
    @csrf @method('DELETE')
    <a href="{{ route('history.edit', $model) }}" class="btn btn-warning btn-sm btn-round waves-effect waves-light m-1"><i class="icon-pencil icon"></i></a>
    <button type="submit" class="btn btn-danger btn-sm btn-round waves-effect waves-light m-1" onclick="return confirm('Are you sure?')"><i class="icon-trash icon"></i></button>
</form>
@endrole