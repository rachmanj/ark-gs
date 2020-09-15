@extends('templates.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Users
                    <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-outline-primary float-right">Create</a>
                </div>

                <div class="card-body">

                    @if (session('message'))
                        <x-alert :type="session('type')" :message="session('message')"/>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{$role->display_name}}
                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                        @method('DELETE') @csrf
                                        <div class="form-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection