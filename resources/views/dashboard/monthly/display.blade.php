@extends('templates.default')


@section('content')
<h3>Dashboard</h3>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <form action="{{ route('dashboard.monthly_display') }}" method="POST">
          @csrf
          <div class="form-group row">
            <label for="basic-input" class="col-sm-2 col-form-label">Select Month</label>
            <div class="col-sm-3">
            <div class="input-group mb-3">
              <input type="month" class="form-control" name="month" value="{{ $date }}" >
              <div class="input-group-append">
              <button class="btn btn-outline-primary" type="submit">Submit</button>
              </div>
            </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
</div>

<hr>

<div class="row">
  @include('dashboard.monthly.posent_vs_plantbudget')

  @include('dashboard.monthly.grpo_vs_posent')

</div>

<hr>

<div class="row">
  
  @include('dashboard.monthly.npi')
  
  {{-- @include('dashboard.boto') --}}
    
</div>

@endsection

@push('styles')
    <!-- Vector CSS -->
  <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endpush

@push('script')
    <!-- Vector map JavaScript -->
  <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <!-- Chart js -->
  <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>
  <!-- Index js -->
  <script src="{{ asset('assets/js/index.js') }}"></script>
@endpush