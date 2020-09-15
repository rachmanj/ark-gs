@extends('templates.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Role
                    <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-outline-primary float-right">Create</a>
                </div>
                
                <div class="card-body">

                    @if (session('message'))
                    <x-alert :type="session('type')" :message="session('message')" />
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td>
                                    <form action="{{ route('admin.role.destroy', $role->id) }}" method="post">
                                        @method('DELETE') @csrf
                                        <div class="form-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                                            <button type="submit" onclick="return confirm('Are You sure?')" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection