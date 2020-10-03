@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page  style="height:600px"-->
        <h3>Budget Type</h3>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                @if (session('message'))
                    <x-alert :type="session('type')" :message="session('message')"/>
                @endif
                  <a href="{{ route('budgettype.create') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i> Budget Type</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($budgettypes as $budgettype)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $budgettype->name }}</td>
                                    <td>
                                        <form action="{{ route('budgettype.destroy', $budgettype->id) }}">
                                            <a href="{{ route('budgettype.edit', $budgettype->id) }}" class="btn btn-sm btn-outline-info"><i class="icon-pencil"></i></a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="icon-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
              <div class="card-footer">
                  {{ $budgettypes->links() }}
              </div>
            </div>
          </div>
        </div><!-- End Row-->

      </div>
    </div>
  </div>

@endsection
