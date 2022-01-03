@extends('templates.default')


@section('content')
<h3>Dashboard</h3>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <form action="{{ route('dashboard.yearly_display') }}" method="POST">
          @csrf
          <div class="form-group row">
            {{-- <label for="basic-input" class="col-sm-2 col-form-label">Select Year</label> --}}
            <div class="col-sm-3">
            <div class="input-group mb-3">
              <select name="year" id="year" class="form-control">
                <option value="">-- Select Year --</option>
                <option value="this_year">This Year</option>
                @foreach ($years as $year)
                    <option value="{{ $year->date }}">{{ date('Y', strtotime($year->date)) }}</option>
                @endforeach
              </select>
              <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">Submit</button>
              </div>
            </div>
            </div>
          </div>
        </form>
        </div>

      </div>

      <div class="row col-lg-12">
        <h4>{{ $year_title === 'This Year' ? 'This Year' : $year_title }}</h4>
      </div>

      <div class="row">
        @include('dashboard.yearly.posent')
        @include('dashboard.yearly.grpo_vs_posent')
      </div>
      
      <div class="row">
        @include('dashboard.yearly.npi')
        {{-- @include('dashboard.yearly.budget_nov21') --}}
      </div>
    </div>
</div>

<hr>

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