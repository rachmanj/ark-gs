<div class="col-lg-6">
    <h4 class="text-uppercase">GRPO vs PO Sent</h4>
    <p>This to show this month PO Sent vs this month GRPO of this month PO Sent</p>
    <hr>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Project</th>
                <th scope="col" class="text-right">PO (000)</th>
                <th scope="col" class="text-right">GRPO (000)</th>
                <th scope="col" class="text-center">%</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>011C</td>
                <td class="text-right">{{ number_format($po_amount_011_this_month / 1000, 2) }}</td>
                <td class="text-right">{{ number_format($grpo_011_amount / 1000, 2) }}</td>
                <td class="text-center">{{ number_format( $grpo_011_amount / $po_amount_011_this_month * 100, 2) }}</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>017C</td>
                <td class="text-right">{{ number_format($po_amount_017_this_month / 1000, 2) }}</td>
                <td class="text-right">{{ number_format($grpo_017_amount / 1000, 2) }}</td>
                <td class="text-center">{{ number_format( $grpo_017_amount / $po_amount_017_this_month * 100, 2) }}</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>APS</td>
                <td class="text-right">{{ number_format($po_amount_APS_this_month / 1000, 2) }}</td>
                <td class="text-right">{{ number_format($grpo_APS_amount / 1000, 2) }}</td>
                <td class="text-center">{{ $grpo_APS_amount == 0 ? ' - ' : number_format( $grpo_APS_amount / $po_amount_APS_this_month * 100, 2) }}</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <th>Total</th>
                <th class="text-right">{{ number_format($po_amount_all_this_month / 1000, 2) }}</th>
                <th class="text-right">{{ number_format($grpo_all_amount / 1000, 2) }}</th>
                <th class="text-center">{{ $grpo_all_amount == 0 ? ' - ' : number_format( $grpo_all_amount / $po_amount_all_this_month * 100, 2) }}</th>
              </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>