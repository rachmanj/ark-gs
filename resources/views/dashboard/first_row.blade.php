<div class="card bg-transparent shadow-none mt-3 border border-secondary-light">
    <div class="card-content">
      <div class="row row-group m-0">
        <div class="col-12 col-lg-6 col-xl-3 border-secondary-dark">
          <div class="card-body">
            <div class="media">
              <div class="media-body text-left">
                <h4 class="text-info">{{ number_format($grpo_all_amount / $po_amount_all_this_month * 100, 2) }} %</h4>
                <span class="text-dark">GRPO vs PO Sent</span>
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
                <h4 class="text-success">{{ number_format($po_amount_all_this_month / $plant_budget_all_this_month * 100, 2) }} %</h4>
                <span class="text-dark">PO Sent vs Plant Budget</span>
              </div>
              <div class="align-self-center w-circle-icon rounded bg-success shadow-success">
                <i class="icon-wallet text-white"></i></div>
              </div>
            </div>
        </div>
     <div class="col-12 col-lg-6 col-xl-3 border-secondary-dark">
        <div class="card-body">
            <div class="media">
            <div class="media-body text-left">
              <h4 class="text-info">@if ($npi_incoming_all <> 0 | $npi_outgoing_all <> 0)
                {{ number_format($npi_incoming_all / $npi_outgoing_all, 2) }}
            @endif</h4>
              <span class="text-dark">NPI</span>
            </div>
            <div class="align-self-center w-circle-icon rounded bg-warning shadow-warning">
              <i class="icon-pie-chart text-white"></i></div>
          </div>
          </div>
     </div>
     <div class="col-12 col-lg-6 col-xl-3 border-secondary-dark">
        <div class="card-body">
            <div class="media">
            <div class="media-body text-left">
              <h4 class="text-warning">{{ number_format($mr_to_mi_all->avg('days'), 1) }} Days</h4>
              <span class="text-dark">Avg MR to MI</span>
            </div>
            <div class="align-self-center w-circle-icon rounded bg-danger shadow-danger">
              <i class="icon-user text-white"></i></div>
          </div>
          </div>
     </div>
   </div><!--End Row-->
    </div>
  </div><!--End Card-->