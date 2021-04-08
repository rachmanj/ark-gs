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
                <td class="text-right">{{ number_format($npi_incoming_011_this_year, 0) }}</td>
                <td class="text-right">{{ number_format($npi_outgoing_011_this_year, 0) }}</td>
                @if ($npi_incoming_011_this_year && $npi_outgoing_011_this_year)
                <td class="text-right">{{ number_format($npi_incoming_011_this_year / $npi_outgoing_011_this_year, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>017C</td>
                <td class="text-right">{{ number_format($npi_incoming_017_this_year, 0) }}</td>
                <td class="text-right">{{ number_format($npi_outgoing_017_this_year, 0) }}</td>
                @if ($npi_incoming_017_this_year && $npi_outgoing_017_this_year)
                <td class="text-right">{{ number_format($npi_incoming_017_this_year / $npi_outgoing_017_this_year, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>APS</td>
                <td class="text-right">{{ number_format($npi_incoming_APS_this_year, 0) }}</td>
                <td class="text-right">{{ number_format($npi_outgoing_APS_this_year, 0) }}</td>
                @if ($npi_incoming_APS_this_year && $npi_outgoing_APS_this_year)
                <td class="text-right">{{ number_format($npi_incoming_APS_this_year / $npi_outgoing_APS_this_year, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <th>Total</th>
                <th class="text-right">{{ number_format($npi_incoming_all_this_year, 0) }}</th>
                <th class="text-right">{{ number_format($npi_outgoing_all_this_year, 0) }}</th>
                <td class="text-right">@if ($npi_incoming_all_this_year && $npi_outgoing_all_this_year)
                    {{ number_format($npi_incoming_all_this_year / $npi_outgoing_all_this_year, 2) }}
                @endif</td>
                <td></td>
              </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>