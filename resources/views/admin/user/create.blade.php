@extends('templates.default')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-sm" href="{{ route('admin.user.index') }}"><i class="fa fa-undo"></i> Back</a>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.user.store') }}">
                    @csrf

                    <div class="form-group row @error('name') has-error @enderror">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-7">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                            @error('name')
                                <span class="help-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('username') has-error @enderror">
                        <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>

                        <div class="col-md-7">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autocomplete="off">

                            @error('username')
                                <span class="help-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('email') has-error @enderror">
                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off">

                            @error('email')
                                <span class="help-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('password') has-error @enderror">
                        <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-7">
                            <input id="password" type="password" class="form-control" name="password" autocomplete="off">

                            @error('password')
                            <span class="help-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row @error('password_confirmation') has-error @enderror">
                        <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-7">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row @error('role_id') has-error @enderror">
                        <label for="role_id" class="col-md-3 col-form-label text-md-right">{{ __('Role') }}</label>

                        <div class="col-md-7">
                            <select name="role_id" id="role_id" class="form-control">
                                @if (count($roles))
                                <option value="">-- select --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                                @endif
                            </select>

                            @error('role_id')
                            <span class="help-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-footer row mb-0">
                        <div class="col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection