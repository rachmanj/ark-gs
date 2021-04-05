@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page  style="height:600px"-->
          <h3>History</h3>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              @if (session('message'))
                  <x-alert :type="session('type')" :message="session('message')"/>
                @endif
                @role(['superadmin', 'admin'])
                <a href="{{ route('history.create') }}" class="btn btn-outline-success btn-sm"><i class="icon-plus"></i> History</a>
                @endrole
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="datatable-history" class="table table-bordered">
                <thead class="thead-primary">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Period</th>
                        <th>GS Type</th>
                        <th>Project</th>
                        <th>Amount</th>
                        <th>action</th>
                    </tr>
                </thead>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->

      </div>
    </div>
  </div>

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
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function() {
      $('#datatable-history').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{{ route('history.data') }}',
              columns: [
                  {data: 'DT_RowIndex', orderable: false, searchable: false},
                  {data: 'date'},
                  {data: 'periode'},
                  {data: 'gs_type'},
                  {data: 'project_code'},
                  {data: 'amount'},
                  {data: 'action'},
              ]
          });
      });
</script>
@endpush