@extends('templates.default')

@section('content')
<h4>Budget Detail</h4>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('budgets.index') }}" class="btn btn-outline-info btn-square pull-left"><i class="icon-action-undo"></i> Back</a>
         </div>
         <div class="card-body">
         <form action="{{ route('budgets.update', $budget->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group row">
              <label for="date" class="col-sm-3 col-form-label">Date</label>
              <div class="col-sm-4">
                <input type="date" id="date" name="date" value="{{ old('date', $budget->date) }}" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="budgettype" class="col-sm-3 col-form-label">Budget Type</label>
              <div class="col-sm-4">
                <input type="text" id="budgettype" name="budgettype" value="{{ $budgettype->display_name }}" class="form-control" readonly>
              </div>
            </div>
            
            <div class="form-group row">
                <label for="project_code" class="col-sm-3 col-form-label">Project Code</label>
                <div class="col-sm-4">
                  <input type="text" id="project_code" name="project_code" value="{{ $budget->project_code }}" class="form-control" readonly>
                </div>
              </div>
                       
            <div class="form-group row">
              <label for="amount" class="col-sm-3 col-form-label">Amount IDR</label>
              <div class="col-sm-9">
                <input type="text" id="amount" name="amount" value="{{ number_format($budget->amount, 2) }}" class="form-control form-control-square" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="remarks" class="col-sm-3 col-form-label">Remarks</label>
              <div class="col-sm-9">
              <textarea rows="4" class="form-control" name="remarks" id="remarks" readonly>{{ $budget->remarks }}</textarea>
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