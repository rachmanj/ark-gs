<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>ARK - GS | Detail</title>
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
    
    <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Detail</h5>
            <div class="table-responsive">
             <table class="table table-striped">
                <tbody>
                  <tr>
                    <th class="text-right">PO No</th>
                    <td>{{ $powitheta->po_no }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO Posting Date</th>
                    <td>{{ date('d M Y', strtotime($powitheta->posting_date)) }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Unit No</th>
                    <td>{{ $powitheta->unit_no }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Vendor Code</th>
                    <td>{{ $powitheta->vendor_code }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Item Code</th>
                    <td>{{ $powitheta->item_code }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Description</th>
                    <td>{{ $powitheta->description }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">UOM</th>
                    <td>{{ $powitheta->uom }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Qty</th>
                    <td>{{ $powitheta->qty }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Project Code</th>
                    <td>{{ $powitheta->project_code }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Dept Code</th>
                    <td>{{ $powitheta->dept_code }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO Currency</th>
                    <td>{{ $powitheta->po_currency }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Unit Price</th>
                    <td>{{ number_format($powitheta->unit_price, 2) }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Item Amount</th>
                    <td>{{ number_format($powitheta->item_amount, 2) }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO Amount</th>
                    <td>{{ number_format($powitheta->total_po_price, 2) }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO Status</th>
                    <td>{{ $powitheta->po_status }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO Delivery Status</th>
                    <td>{{ $powitheta->po_delivery_status }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO Delivery Date</th>
                    <td>{{ date('d M Y', strtotime($powitheta->po_delivery_date)) }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO ETA</th>
                    <td>{{ date('d M Y', strtotime($powitheta->po_eta)) }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Remark</th>
                    <td>{{ $powitheta->remarks }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">GRPO No</th>
                    <td>{{ $powitheta->grpo_no }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">GRPO Date</th>
                    <td>{{ date('d M Y', strtotime($powitheta->grpo_date)) }}</td>
                  </tr>
                  {{-- <tr>
                    <th class="text-right">Upload at</th>
                    <td>{{ date('d M Y H:i:s', strtotime($powitheta->created_at)) }}</td>
                  </tr> --}}
                </tbody>
              </table>
          </div>
          </div>
        </div>
      </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    
    <!-- simplebar js -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
    <!-- waves effect js -->
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('assets/js/app-script.js') }}"></script>      
</body>
</html>