@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page  style="height:600px"-->
          <h3>PO With ETA</h3>
          <p>Query Name: po with time arrival</p>
          {{-- <p>Record date: {{ date('d-m-Y H:i:s', strtotime($latest_record->created_at)) }} </p> --}}

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              @role(['superadmin', 'admin'])
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#importExcel">
                    <i class="fa fa-upload"></i> Upload Excel
                </button>
                @endrole
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="datatable-powitheta" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PO</th>
                        <th>PostingD</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Project</th>
                        <th>GRPO</th>
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

  <!-- Import Excel -->

  <div class="modal fade" id="importExcel">
    <div class="modal-dialog">
      <div class="modal-content animated rollIn">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-star"></i> Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('powithetas.import_excel') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>
          
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Import</button>
                    </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('styles')
    <!--Data Tables -->
  <link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('script')
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
            ajax: '{{ route('powithetas.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'po_no'},
                {data: 'posting_date'},
                {data: 'item_code'},
                {data: 'qty'},
                {data: 'project_code'},
                {data: 'grpo_no'},
            ]
        });
    });
</script>
@endpush