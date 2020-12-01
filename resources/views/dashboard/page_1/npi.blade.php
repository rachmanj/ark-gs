<div class="col-lg-6">
    <h3 class="text-uppercase">NPI</h3>
    <p>This to show Index of incoming inventory (GRPO, GR, MRet) vs Outcoming Inventory (MI, GI)</p>
    <hr>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Project</th>
                <th scope="col" class="text-right">Index</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>011C</td>
                @if ($npi_incoming_011 && $npi_outgoing_011)
                <td class="text-right">{{ number_format($npi_incoming_011 / $npi_outgoing_011, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>017C</td>
                @if ($npi_incoming_017 && $npi_outgoing_017)
                <td class="text-right">{{ number_format($npi_incoming_017 / $npi_outgoing_017, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>APS</td>
                @if ($npi_incoming_APS && $npi_outgoing_APS)
                <td class="text-right">{{ number_format($npi_incoming_APS / $npi_outgoing_APS, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <th>Total</th>
                <td class="text-right">@if ($npi_incoming_all && $npi_outgoing_all)
                    {{ number_format($npi_incoming_all / $npi_outgoing_all, 2) }}
                @endif</td>
                <td></td>
              </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>