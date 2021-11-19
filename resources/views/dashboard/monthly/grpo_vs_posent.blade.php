<div class="col-lg-6">
    <h4 class="text-uppercase">GRPO vs PO Sent</h4>
    <p>This to show last month PO Sent vs last month GRPO of last month PO Sent</p>
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
                <td class="text-right">{{ number_format($po_amount_011_monthly / 1000, 2) }}</td>
                <td class="text-right">{{ number_format($grpo_011_amount / 1000, 2) }}</td>
                <td class="text-center">{{ $po_amount_011_monthly == 0 || $grpo_011_amount == 0 ? null : number_format( $grpo_011_amount / $po_amount_011_monthly * 100, 2) }}</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>017C</td>
                <td class="text-right">{{ number_format($po_amount_017_monthly / 1000, 2) }}</td>
                <td class="text-right">{{ number_format($grpo_017_amount / 1000, 2) }}</td>
                <td class="text-center">{{ $po_amount_017_monthly == 0 || $grpo_017_amount == 0 ? null : number_format( $grpo_017_amount / $po_amount_017_monthly * 100, 2) }}</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>021C</td>
                <td class="text-right">{{ number_format($po_amount_021_monthly / 1000, 2) }}</td>
                <td class="text-right">{{ number_format($grpo_021_amount / 1000, 2) }}</td>
                <td class="text-center">{{ $po_amount_021_monthly == 0 || $grpo_021_amount == 0 ? null : number_format( $grpo_021_amount / $po_amount_021_monthly * 100, 2) }}</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>022C</td>
                <td class="text-right">{{ number_format($po_amount_022_monthly / 1000, 2) }}</td>
                <td class="text-right">{{ number_format($grpo_022_amount / 1000, 2) }}</td>
                <td class="text-center">{{ $po_amount_022_monthly == 0 || $grpo_022_amount == 0 ? null : number_format( $grpo_022_amount / $po_amount_022_monthly * 100, 2) }}</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>APS</td>
                <td class="text-right">{{ number_format($po_amount_APS_monthly / 1000, 2) }}</td>
                <td class="text-right">{{ number_format($grpo_APS_amount / 1000, 2) }}</td>
                <td class="text-center">{{ $grpo_APS_amount == 0 ? ' - ' : number_format( $grpo_APS_amount / $po_amount_APS_monthly * 100, 2) }}</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <th>Total</th>
                <th class="text-right">{{ number_format($po_amount_all_monthly / 1000, 2) }}</th>
                <th class="text-right">{{ number_format($grpo_all_amount / 1000, 2) }}</th>
                <th class="text-center">{{ $grpo_all_amount == 0 ? ' - ' : number_format( $grpo_all_amount / $po_amount_all_monthly * 100, 2) }}</th>
              </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>