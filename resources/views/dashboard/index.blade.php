@extends('templates.default')


@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page-->
          <h3>Dashboard</h3>
          <h5>Last Posting date: {{ date('d-m-Y', strtotime($latest_record->wo_created)) }}</h5>
      </div>
    </div>
</div>

@include('dashboard.page_1.first_row')

<hr>

<div class="row">
  @include('dashboard.page_1.posent_vs_plantbudget')

  @include('dashboard.page_1.grpo_vs_posent')

</div>

<hr>

<div class="row">
  
  @include('dashboard.page_1.npi')
  
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