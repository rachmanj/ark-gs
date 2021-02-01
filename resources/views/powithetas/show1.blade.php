@extends('templates.default')

@section('content')
<h4 class="text-center">Data Detail</h4>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('budgets.index') }}" class="btn btn-outline-info btn-square pull-left"><i class="icon-action-undo"></i> Back</a>
         </div>
         <div class="card-body">
         <form>

            <div class="form-group row">
              <label for="po_no" class="col-sm-3 col-form-label">PO No</label>
              <div class="col-sm-8">
                <input type="text" id="po_no" name="po_no" value="{{ $powitheta->po_no }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="posting_date" class="col-sm-3 col-form-label">Posting Date</label>
              <div class="col-sm-8">
                <input type="date" id="posting_date" name="posting_date" value="{{ $powitheta->posting_date }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="vendor_code" class="col-sm-3 col-form-label">Vendor Code</label>
              <div class="col-sm-8">
                <input type="text" id="vendor_code" name="vendor_code" value="{{ $powitheta->vendor_code }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="item_code" class="col-sm-3 col-form-label">Item Code</label>
              <div class="col-sm-8">
                <input type="text" id="item_code" name="item_code" value="{{ $powitheta->item_code }}" class="form-control" readonly>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="description" class="col-sm-3 col-form-label">Item Description</label>
              <div class="col-sm-8">
                <input type="text" id="description" name="description" value="{{ $powitheta->description }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="uom" class="col-sm-3 col-form-label">UOM</label>
              <div class="col-sm-8">
                <input type="text" id="uom" name="uom" value="{{ $powitheta->uom }}" class="form-control" readonly>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="qty" class="col-sm-3 col-form-label">Qty</label>
              <div class="col-sm-8">
                <input type="text" id="qty" name="qty" value="{{ $powitheta->qty }}" class="form-control" readonly>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="project_code" class="col-sm-3 col-form-label">Project</label>
              <div class="col-sm-8">
                <input type="text" id="project_code" name="project_code" value="{{ $powitheta->project_code }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="dept_code" class="col-sm-3 col-form-label">Department Code</label>
              <div class="col-sm-8">
                <input type="text" id="dept_code" name="dept_code" value="{{ $powitheta->dept_code }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="po_currency" class="col-sm-3 col-form-label">Currency</label>
              <div class="col-sm-8">
                <input type="text" id="po_currency" name="po_currency" value="{{ $powitheta->po_currency }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="unit_price" class="col-sm-3 col-form-label">Unit Price</label>
              <div class="col-sm-8">
                <input type="text" id="unit_price" name="unit_price" value="{{ $powitheta->unit_price }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="item_amount" class="col-sm-3 col-form-label">Item Amount</label>
              <div class="col-sm-8">
                <input type="text" id="item_amount" name="item_amount" value="{{ $powitheta->item_amount }}" class="form-control" readonly>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="total_po_price" class="col-sm-3 col-form-label">Total Amount</label>
              <div class="col-sm-8">
                <input type="text" id="total_po_price" name="total_po_price" value="{{ $powitheta->total_po_price }}" class="form-control" readonly>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="po_status" class="col-sm-3 col-form-label">PO Status</label>
              <div class="col-sm-8">
                <input type="text" id="po_status" name="po_status" value="{{ $powitheta->po_status }}" class="form-control" readonly>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="po_delivery_status" class="col-sm-3 col-form-label">PO Delivery Status</label>
              <div class="col-sm-8">
                <input type="text" id="po_delivery_status" name="po_delivery_status" value="{{ $powitheta->po_delivery_status }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="po_delivery_date" class="col-sm-3 col-form-label">PO Delivery Date</label>
              <div class="col-sm-8">
                <input type="date" id="po_delivery_date" name="po_delivery_date" value="{{ $powitheta->po_delivery_date }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="po_eta" class="col-sm-3 col-form-label">PO ETA</label>
              <div class="col-sm-8">
                <input type="date" id="po_eta" name="po_eta" value="{{ $powitheta->po_eta }}" class="form-control" readonly>
              </div>
            </div>



            <div class="card-footer">
              <div class="form-group row">
                {{-- <button type="submit" class="btn btn-primary shadow-primary"><i class="icon-cup"></i> Save</button> --}}
              </div>
            </div>
         </form>
         </div>
      </div>
    </div>
  </div><!--End Row-->

@endsection

@push('styles')
    <!--Select Plugins-->
  <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
    <!--Select Plugins Js-->
  <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

  <script>
    $(document).ready(function() {
        $('.single-select').select2();
    });
  </script>
@endpush