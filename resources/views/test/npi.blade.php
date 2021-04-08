<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>ARK - GS | TEST</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- animate CSS-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Sidebar CSS-->
    <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet"/>
    <!-- Custom Style-->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>
    
  </head>
<body>

  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">NPI</h5>
    <div class="table-responsive">
           <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Project</th>
                  <th class="text-right" scope="col">In</th>
                  <th class="text-right" scope="col">Out</th>
                  <th class="text-right" scope="col">Index</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>011C</td>
                  <td class="text-right">{{ number_format($in_011, 0) }}</td>
                  <td class="text-right">{{ number_format($out_011, 0) }}</td>
                  <td class="text-right">{{ number_format($in_011 / $out_011, 2) }}</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>017C</td>
                  <td class="text-right">{{ number_format($in_017, 0) }}</td>
                  <td class="text-right">{{ number_format($out_017, 0) }}</td>
                  <td class="text-right">{{ number_format($in_017 / $out_017, 2) }}</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>APS</td>
                  <td class="text-right">{{ number_format($in_aps, 0) }}</td>
                  <td class="text-right">{{ number_format($out_aps, 0) }}</td>
                  <td class="text-right">{{ number_format($in_aps / $out_aps, 2) }}</td>
                </tr>
              </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bordered Table</h5>
    <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </div><!--End Row-->
  
</body>
</html>







