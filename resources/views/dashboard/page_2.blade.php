@extends('templates.default')


@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page-->
          <h3>Dashboard</h3>
          <h5>Last Posting date: {{ date('d-m-Y', strtotime($latest_record->posting_date)) }}</h5>
      </div>
    </div>
</div>

<hr>
<div class="row">
  @include('dashboard.page_2.mr_to_pr')
  @include('dashboard.page_2.pr_to_po')
</div>

<hr>

<div class="row">
  @include('dashboard.page_2.poeta_to_grpo')
  @include('dashboard.page_2.grpo_to_iti')
</div>

<hr>

<div class="row">
  @include('dashboard.page_2.mr_to_mi')
  @include('dashboard.page_2.outs_mr')
  {{-- @include('dashboard.page_2.grpo_to_iti') --}}
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