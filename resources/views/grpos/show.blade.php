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
                    <th class="text-right">GRPO No</th>
                    <td>{{ $grpo->grpo_no }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">GRPO Date</th>
                    <td>{{ $grpo->grpo_date ? date('d M Y', strtotime($grpo->grpo_date)) : '' }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO No</th>
                    <td>{{ $grpo->po_no }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO Date</th>
                    <td>{{ date('d M Y', strtotime($grpo->po_date)) }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Unit No</th>
                    <td>{{ $grpo->unit_no }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Vendor Code</th>
                    <td>{{ $grpo->vendor_code }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Item Code</th>
                    <td>{{ $grpo->item_code }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Description</th>
                    <td>{{ $grpo->description }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">UOM</th>
                    <td>{{ $grpo->uom }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Qty</th>
                    <td>{{ $grpo->qty }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Project Code</th>
                    <td>{{ $grpo->project_code }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Dept Code</th>
                    <td>{{ $grpo->dept_code }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO Currency</th>
                    <td>{{ $grpo->grpo_currency }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Unit Price</th>
                    <td>{{ number_format($grpo->unit_price, 2) }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Item Amount</th>
                    <td>{{ number_format($grpo->item_amount, 2) }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO Delivery Status</th>
                    <td>{{ $grpo->po_delivery_status }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">PO Delivery Date</th>
                    <td>{{ date('d M Y', strtotime($grpo->po_delivery_date)) }}</td>
                  </tr>
                  <tr>
                    <th class="text-right">Remark</th>
                    <td>{{ $grpo->remarks }}</td>
                  </tr>
                  
                  {{-- <tr>
                    <th class="text-right">Upload at</th>
                    <td>{{ date('d M Y H:i:s', strtotime($grpo->created_at)) }}</td>
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