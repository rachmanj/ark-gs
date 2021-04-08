@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page  style="height:600px"-->
          <h3>PO With ETA</h3>
          <p><a href="{{ route('powithetas.index') }}">All Data</a> | <strong>This Month Data</strong></p>
          {{-- <p>Record date: {{ date('d-m-Y H:i:s', strtotime($latest_record->created_at)) }} </p> --}}

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              @if (session('message'))
                  <x-alert :type="session('type')" :message="session('message')"/>
                @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="datatable-powitheta" class="table table-bordered">
                <thead class="thead-primary">
                    <tr>
                        <th>#</th>
                        <th>PO</th>
                        <th>PostingD</th>
                        <th>Project</th>
                        <th>Unit No</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>IDR</th>
                        <th>GRPO</th>
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

    {{-- <script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#datatable-powitheta').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script> --}}

<script>
    $(function() {
        
    $('#datatable-powitheta').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('powithetas_this_month.data') }}',
            // dom: 'Bfrtip',
            // button: [
            //   {
            //     extend: 'pdf',
            //     oriented: 'portrait'
            //   },
            //   'csv', 'exce', 'print', 'copy'
            // ],
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'po_no'},
                {data: 'posting_date'},
                {data: 'project_code'},
                {data: 'unit_no'},
                {data: 'item_code'},
                {data: 'qty'},
                {data: 'item_amount'},
                {data: 'grpo_no'},
                {data: 'action'},
            ]
        });
    });
</script>
@endpush