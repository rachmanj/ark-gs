@extends('templates.default')

@section('content')
<h3>Budget</h3>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        @if (session('message'))
            <x-alert :type="session('type')" :message="session('message')"/>
        @endif
          <a href="{{ route('budgets.create') }}" class="btn btn-sm btn-outline-primary"><i class="icon-plus"></i> Budget</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table id="datatable-budget" class="table table-bordered">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Budget Name</th>
                  <th>Project</th>
                  <th class="text-center">Amount</th>
                  <th>Action</th>
              </tr>
          </thead>
      </table>
      </div>
      </div>
    </div>
  </div>
</div><!-- End Row-->
@endsection

@push('styles')
    <!--Data Tables -->
  <link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
    <!--Data Tables js-->
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(function() {
        
    $('#datatable-budget').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('budgets.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'date'},
                {data: 'budget_type'},
                {data: 'project_code'},
                {data: 'amount'},
                {data: 'action'},
            ],
            columnDefs: [
              {
                "targets": 4,
                "className": "text-right"
              }
            ],
        });
    });
</script>
@endpush