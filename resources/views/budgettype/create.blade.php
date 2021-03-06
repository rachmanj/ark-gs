@extends('templates.default')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <h3>New Budget Type</h3>
        <div class="card">
            <div class="card-header">
                <div class="col-md-7 offset-md-3">
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('budgettypes.index') }}"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>

            <form method="POST" action="{{ route('budgettypes.store') }}">
                @csrf
                <div class="card-body">

                    <div class="form-group row @error('name') has-error @enderror">
                        <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                        <div class="col-lg-7">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus autocomplete="off">

                            @error('name')
                                <span class="help-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row @error('display_name') has-error @enderror">
                        <label for="display_name" class="col-md-3 col-form-label text-md-right">Display Name</label>

                        <div class="col-lg-7">
                            <input id="display_name" type="text" class="form-control" name="display_name" value="{{ old('display_name') }}">

                            @error('display_name')
                                <span class="help-block" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer  row mb-0">
                    <div class="col-md-7 offset-md-3">
                        <button type="submit" class="btn btn-outline-primary btn-sm">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection