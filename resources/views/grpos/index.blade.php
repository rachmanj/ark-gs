@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page  style="height:600px"-->
          <h3>GRPO</h3>
          <p><a href={{ route('grpos.this_month_index') }}>This Month</a> | <strong>THIS YEAR</strong></p>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              @if (session('message'))
                  <x-alert :type="session('type')" :message="session('message')"/>
                @endif
                {{-- <a href="{{ route('grpos.export_excel') }}" class="btn btn-outline-success btn-sm"><i class="fa fa-download"></i> Export Table</a> --}}
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="datatable-grpo" class="table table-bordered">
                <thead class="thead-primary">
                    <tr>
                        <th>#</th>
                        <th>GRPO No</th>
                        <th>Date</th>
                        <th>PO No</th>
                        <th>PO Date</th>
                        <th>DelivD</th>
                        <th>Project</th>
                        <th>Unit No</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>IDR</th>
                        {{-- <th>GRPO</th> --}}
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

  <!-- Import Excel -->

  <div class="modal fade" id="importExcel">
    <div class="modal-dialog">
      <div class="modal-content animated rollIn">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-star"></i> GRPO Upload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('grpos.import_excel') }}" enctype="multipart/form-data">
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
        
    $('#datatable-grpo').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('grpos.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'grpo_no'},
                {data: 'grpo_date'},
                {data: 'po_no'},
                {data: 'po_date'},
                {data: 'po_delivery_date'},
                {data: 'project_code'},
                {data: 'unit_no'},
                {data: 'item_code'},
                {data: 'qty'},
                {data: 'item_amount'},
                // {data: 'grpo_no'},
                {data: 'action'},
            ],
            columnDefs: [
              {
                "targets": 1,
                "className": "text-left"
              },
              {
                "targets": [9, 10],
                "className": "text-right"
              }
            ]
        });
    });
</script>
@endpush