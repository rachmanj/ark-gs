@extends('templates.default')

@section('content')
<h3>Edit Budget Data</h3>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
         <div class="card-header text-uppercase">
             <a href="{{ route('budgets.index') }}" class="btn btn-outline-primary btn-sm"><i class="icon-action-undo"></i> Back</a>
         </div>
         <div class="card-body">
         <form action="{{ route('budgets.update', $budget->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group row">
              <label for="date" class="col-sm-3 col-form-label">Date</label>
              <div class="col-sm-4">
                <input type="date" id="date" name="date" value="{{ old('date', $budget->date) }}" class="form-control">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="budgettype_id" class="col-sm-3 col-form-label">Budget Type</label>
              <div class="col-sm-6">
                <select id="budgettype_id" name="budgettype_id" class="form-control single-select">
                    @foreach ($budgettypes as $budgettype)
                        <option value="{{ $budgettype->id }}" @if ($budgettype->id == $budget->budgettype_id)
                            selected
                        @endif>{{ $budgettype->display_name }}</option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
                <label for="project_code" class="col-sm-3 col-form-label">Project Code</label>
                <div class="col-sm-6">
                  <select name="project_code" id="project_code" class="form-control single-select">
                    <option value="011C" @if ($budget->project_code == '011C') selected @endif>011C</option>
                    <option value="017C" @if ($budget->project_code == '017C') selected @endif>017C</option>
                    <option value="APS" @if ($budget->project_code == 'APS') selected @endif>APS</option>
                  </select>
                </div>
              </div>
                       
            <div class="form-group row">
              <label for="amount" class="col-sm-3 col-form-label">Amount</label>
              <div class="col-sm-6">
                <input type="text" id="amount" name="amount" value="{{ old('amount', $budget->amount) }}" class="form-control form-control-square">
              </div>
            </div>
            
            <div class="form-group row">
                <label for="input-1" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-6">
                  <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-cup"></i> Save</button>
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