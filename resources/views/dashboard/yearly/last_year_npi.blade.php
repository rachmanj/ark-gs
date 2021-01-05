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
                <th scope="col" class="text-right">Index</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>011C</td>
                @if ($npi_incoming_011_last_year && $npi_outgoing_011_last_year)
                <td class="text-right">{{ number_format($npi_incoming_011_last_year / $npi_outgoing_011_last_year, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>017C</td>
                @if ($npi_incoming_017_last_year && $npi_outgoing_017_last_year)
                <td class="text-right">{{ number_format($npi_incoming_017_last_year / $npi_outgoing_017_last_year, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>APS</td>
                @if ($npi_incoming_APS_last_year && $npi_outgoing_APS_last_year)
                <td class="text-right">{{ number_format($npi_incoming_APS_last_year / $npi_outgoing_APS_last_year, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <th>Total</th>
                <td class="text-right">@if ($npi_incoming_all_last_year && $npi_outgoing_all_last_year)
                    {{ number_format($npi_incoming_all_last_year / $npi_outgoing_all_last_year, 2) }}
                @endif</td>
                <td></td>
              </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>