<div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">NPI</h5>
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Project</th>
                <th scope="col" class="text-right">In</th>
                <th scope="col" class="text-right">Out</th>
                <th scope="col" class="text-right">Index</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>011C</td>
                <td class="text-right">{{ number_format($incoming_qty_011, 0) }}</td>
                <td class="text-right">{{ number_format($outgoing_qty_011, 0) }}</td>
                @if ($incoming_qty_011 && $outgoing_qty_011)
                <td class="text-right">{{ number_format($incoming_qty_011 / $outgoing_qty_011, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>017C</td>
                <td class="text-right">{{ number_format($incoming_qty_017, 0) }}</td>
                <td class="text-right">{{ number_format($outgoing_qty_017, 0) }}</td>
                @if ($incoming_qty_017 && $outgoing_qty_017)
                <td class="text-right">{{ number_format($incoming_qty_017 / $outgoing_qty_017, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>APS</td>
                <td class="text-right">{{ number_format($incoming_qty_APS, 0) }}</td>
                <td class="text-right">{{ number_format($outgoing_qty_APS, 0) }}</td>
                @if ($incoming_qty_APS && $outgoing_qty_APS)
                <td class="text-right">{{ number_format($incoming_qty_APS / $outgoing_qty_APS, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <th>Total</th>
                <th class="text-right">{{ number_format($incoming_qty_three, 0) }}</th>
                <th class="text-right">{{ number_format($outgoing_qty_three, 0) }}</th>
                <td class="text-right">@if ($incoming_qty_three && $outgoing_qty_three)
                    {{ number_format($incoming_qty_three / $outgoing_qty_three, 2) }}
                @endif</td>
                <td></td>
              </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>