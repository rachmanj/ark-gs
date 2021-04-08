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
                <td class="text-right">{{ number_format($npi_in_011, 2) }}</td>
                <td class="text-right">{{ number_format($npi_out_011, 2) }}</td>
                @if ($npi_in_011 && $npi_out_011)
                <td class="text-right">{{ number_format($npi_in_011 / $npi_out_011, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>017C</td>
                <td class="text-right">{{ number_format($npi_in_017, 2) }}</td>
                <td class="text-right">{{ number_format($npi_out_017, 2) }}</td>
                @if ($npi_in_017 && $npi_out_017)
                <td class="text-right">{{ number_format($npi_in_017 / $npi_out_017, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>APS</td>
                <td class="text-right">{{ number_format($npi_in_APS, 2) }}</td>
                <td class="text-right">{{ number_format($npi_out_APS, 2) }}</td>
                @if ($npi_in_APS && $npi_out_APS)
                <td class="text-right">{{ number_format($npi_in_APS / $npi_out_APS, 2) }}</td>
                @else
                <td class="text-right">na</td>
                @endif
                <td></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <th>Total</th>
                <th class="text-right">{{ number_format($npi_in_all, 2) }}</th>
                <th class="text-right">{{ number_format($npi_out_all, 2) }}</th>
                <td class="text-right">@if ($npi_in_all && $npi_out_all)
                    {{ number_format($npi_in_all / $npi_out_all, 2) }}
                @endif</td>
                <td></td>
              </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>