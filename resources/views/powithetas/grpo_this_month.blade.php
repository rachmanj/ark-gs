@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page  style="height:600px"-->
          <h3>PO With ETA</h3>
          <p><a href="{{ route('powithetas.index') }}">All Data</a> | <a href="{{ route('powithetas.this_month_index') }}">PO Sent This Month</a> | <strong>GRPO This Month</strong></p>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              @if (session('message'))
                  <x-alert :type="session('type')" :message="session('message')"/>
                @endif
                <a href="{{ route('powithetas.export_grpo_this_month') }}" class="btn btn-outline-success btn-sm"><i class="fa fa-download"></i> Export GRPO This Month</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="datatable-grpo" class="table table-bordered">
                <thead class="thead-primary">
                    <tr>
                        <th>#</th>
                        <th>PO</th>
                        <th>PostD</th>
                        <th>DelivD</th>
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

<script>
    $(function() {
        
    $('#datatable-grpo').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('grpo_this_month.data') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'po_no'},
                {data: 'posting_date'},
                {data: 'po_delivery_date'},
                {data: 'project_code'},
                {data: 'unit_no'},
                {data: 'item_code'},
                {data: 'qty'},
                {data: 'item_amount'},
                {data: 'grpo_no'},
                {data: 'action'},
            ],
            columnDefs: [
              {
                "targets": [7, 8],
                "className": "text-right"
              }
            ]
        });
    });
</script>
@endpush