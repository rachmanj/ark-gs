@extends('templates.default')


@section('content')
<div class="row">
    <div class="col-lg-12">
      <div> <!--Please remove the height before using this page-->
          <h3>Dashboard</h3>
      </div>
    </div>
</div>

{{-- <div class="card bg-transparent shadow-none mt-3 border border-secondary-light">
  <div class="card-content">
    <div class="row row-group m-0">
      <div class="col-12 col-lg-6 col-xl-3 border-secondary-dark">
        <div class="card-body">
          <div class="media">
            <div class="media-body text-left">
              <h4 class="text-info">4500</h4>
              <span class="text-dark">Total Orders</span>
            </div>
            <div class="align-self-center w-circle-icon rounded bg-info shadow-info">
              <i class="icon-basket-loaded text-white"></i></div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-3 border-secondary-dark">
        <div class="card-body">
            <div class="media">
            <div class="media-body text-left">
              <h4 class="text-danger">7850</h4>
              <span class="text-dark">Total Expenses</span>
            </div>
            <div class="align-self-center w-circle-icon rounded bg-danger shadow-danger">
              <i class="icon-wallet text-white"></i></div>
            </div>
          </div>
      </div>
   <div class="col-12 col-lg-6 col-xl-3 border-secondary-dark">
      <div class="card-body">
          <div class="media">
          <div class="media-body text-left">
            <h4 class="text-success">87.5%</h4>
            <span class="text-dark">Total Revenue</span>
          </div>
          <div class="align-self-center w-circle-icon rounded bg-success shadow-success">
            <i class="icon-pie-chart text-white"></i></div>
        </div>
        </div>
   </div>
   <div class="col-12 col-lg-6 col-xl-3 border-secondary-dark">
      <div class="card-body">
          <div class="media">
          <div class="media-body text-left">
            <h4 class="text-warning">8400</h4>
            <span class="text-dark">New Users</span>
          </div>
          <div class="align-self-center w-circle-icon rounded bg-warning shadow-warning">
            <i class="icon-user text-white"></i></div>
        </div>
        </div>
   </div>
 </div><!--End Row-->
  </div>
</div><!--End Card--> --}}
<hr>
<div class="row">
  <div class="col-lg-6">
    <h4 class="text-uppercase">PO Sent Vs Plant Budget </h4>
    <p>Lorem insum dolor. Lorem insum dolor.Lorem insum dolor.Lorem insum dolor.Lorem insum dolor.Lorem insum dolor. </p>
    <hr>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Project</th>
                <th scope="col" class="text-right">IDR (000)</th>
                <th scope="col">%</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($po_sents as $po_sent)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $po_sent->project_code }}</td>
                <td class="text-right">{{ number_format($po_sent->po_amount/1000, 2) }}</td>
                <td></td>
              </tr>
              @endforeach
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <h4 class="text-uppercase">Plant Budget</h4>
    <p>Lorem insum dolor. Lorem insum dolor.Lorem insum dolor.Lorem insum dolor.Lorem insum dolor.Lorem insum dolor. </p>
    <hr>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Project</th>
                <th scope="col">Index</th>
                <th scope="col">%</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>011C</td>
                <td>2</td>
                <td>90%</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>017C</td>
                <td>2</td>
                <td>90%</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>APS</td>
                <td>2</td>
                <td>90%</td>
              </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-lg-6">
      <h3 class="text-uppercase">NPI</h3>
      <p>Lorem insum dolor. Lorem insum dolor.Lorem insum dolor.Lorem insum dolor.Lorem insum dolor.Lorem insum dolor. </p>
      <hr>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-secondary">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Project</th>
                  <th scope="col">Index</th>
                  <th scope="col">%</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>011C</td>
                  <td>2</td>
                  <td>90%</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>017C</td>
                  <td>2</td>
                  <td>90%</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>APS</td>
                  <td>2</td>
                  <td>90%</td>
                </tr>
              </tbody>
            </table>
         </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-6">
      <h3 class="text-uppercase">Plant Budget</h3>
      <p>Lorem insum dolor. Lorem insum dolor.Lorem insum dolor.Lorem insum dolor.Lorem insum dolor.Lorem insum dolor. </p>
      <hr>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-success">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Project</th>
                  <th scope="col">Index</th>
                  <th scope="col">%</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>011C</td>
                  <td>2</td>
                  <td>90%</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>017C</td>
                  <td>2</td>
                  <td>90%</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>APS</td>
                  <td>2</td>
                  <td>90%</td>
                </tr>
              </tbody>
            </table>
         </div>
        </div>
      </div>
    </div>
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