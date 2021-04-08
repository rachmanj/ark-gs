@extends('templates.default')


@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page-->
          <h3>Dashboard</h3>
          <h5>Yearly</h5>
      </div>
    </div>
</div>

<hr>

<div class="row col-lg-12">
    <h4>This Year : {{ date_format($this_year, 'Y') }} </h4>
</div>

<div class="row">
  @include('dashboard.yearly.this_year_posent')
  @include('dashboard.yearly.this_year_npi')
</div>

<hr>

<div class="row col-lg-12">
    <h4>Last Year : {{ date_format($last_year, 'Y') }}</h4>
</div>

<div class="row">
  @include('dashboard.yearly.last_year_posent')
  @include('dashboard.yearly.last_year_npi')
</div>

<div class="row">
  {{-- @include('dashboard.page_2.mr_belum_iti') --}}
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