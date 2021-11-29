<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">PO Sent vs GRPO</h5>
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
    
              <th scope="row">1</th>
              <td>011C</td>
              <td class="text-right">{{ number_format($po_sent_011 / 1000, 2) }}</td>
              <td class="text-right">{{ number_format($grpo_amount_011 / 1000, 2) }}</td>
              <td class="text-center">{{ $po_sent_011 == 0 || $grpo_amount_011 == 0 ? null : number_format( $grpo_amount_011 / $po_sent_011 * 100, 2) }}</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>017C</td>
              <td class="text-right">{{ number_format($po_sent_017 / 1000, 2) }}</td>
              <td class="text-right">{{ number_format($grpo_amount_017 / 1000, 2) }}</td>
              <td class="text-center">{{ $po_sent_017 == 0 || $grpo_amount_017 == 0 ? null : number_format( $grpo_amount_017 / $po_sent_017 * 100, 2) }}</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>021C</td>
              <td class="text-right">{{ number_format($po_sent_021 / 1000, 2) }}</td>
              <td class="text-right">{{ number_format($grpo_amount_021 / 1000, 2) }}</td>
              <td class="text-center">{{ $po_sent_021 == 0 || $grpo_amount_021 == 0 ? null : number_format( $grpo_amount_021 / $po_sent_021 * 100, 2) }}</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>022C</td>
              <td class="text-right">{{ number_format($po_sent_022 / 1000, 2) }}</td>
              <td class="text-right">{{ number_format($grpo_amount_022 / 1000, 2) }}</td>
              <td class="text-center">{{ $po_sent_022 == 0 || $grpo_amount_022 == 0 ? null : number_format( $grpo_amount_022 / $po_sent_022 * 100, 2) }}</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>APS</td>
              <td class="text-right">{{ number_format($po_sent_APS / 1000, 2) }}</td>
              <td class="text-right">{{ number_format($grpo_amount_APS / 1000, 2) }}</td>
              <td class="text-center">{{ $grpo_amount_APS == 0 ? ' - ' : number_format( $grpo_amount_APS / $po_sent_APS * 100, 2) }}</td>
            </tr>
            <tr>
              <th scope="row"></th>
              <th>Total</th>
              <th class="text-right">{{ number_format($po_sent_all / 1000, 2) }}</th>
              <th class="text-right">{{ number_format($grpo_amount_all / 1000, 2) }}</th>
              <th class="text-center">{{ $grpo_amount_all == 0 ? ' - ' : number_format( $grpo_amount_all / $po_sent_all * 100, 2) }}</th>
            </tr>
          </tbody>
        </table>
     </div>
    </div>
  </div>
</div>