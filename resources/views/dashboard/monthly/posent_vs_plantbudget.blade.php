    <div class="col-lg-6">
      <h4 class="text-uppercase">PO Sent Vs Plant Budget </h4>
      <p>Last month PO with Status Sent vs last month Plant Budget </p>
      <hr>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Project</th>
                  <th scope="col" class="text-right">PO Sent (000)</th>
                  <th scope="col" class="text-right">Budget (000)</th>
                  <th class="text-right">%</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>011C</td>
                  <td class="text-right">{{ number_format($po_amount_011_monthly / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_011_monthly / 1000, 2) }}</td>
                  <td class="text-right">{{ $po_amount_011_monthly === 0 || $plant_budget_011_monthly === 0 ? ' - ' :  number_format($po_amount_011_monthly / $plant_budget_011_monthly * 100, 2) }}</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>017C</td>
                  <td class="text-right">{{ number_format($po_amount_017_monthly / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_017_monthly / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($po_amount_017_monthly / $plant_budget_017_monthly * 100, 2) }}</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>021C</td>
                  <td class="text-right">{{ number_format($po_amount_021_monthly / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_021_monthly / 1000, 2) }}</td>
                  <td class="text-right">{{ ($plant_budget_021_monthly == 0 ? ' - ' : number_format($po_amount_021_monthly / $plant_budget_021_monthly * 100, 2)) }}</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>022C</td>
                  <td class="text-right">{{ number_format($po_amount_022_monthly / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_022_monthly / 1000, 2) }}</td>
                  <td class="text-right">{{ ($plant_budget_022_monthly == 0 ? ' - ' : number_format($po_amount_022_monthly / $plant_budget_022_monthly * 100, 2)) }}</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>APS</td>
                  <td class="text-right">{{ number_format($po_amount_APS_monthly / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_APS_monthly / 1000, 2) }}</td>
                  <td class="text-right">{{ ($plant_budget_APS_monthly == 0 ? ' - ' : number_format($po_amount_APS_monthly / $plant_budget_APS_monthly * 100, 2)) }}</td>
                </tr>
                <tr>
                  <td></td>
                  <th>Total</th>
                  <th class="text-right">{{ number_format($po_amount_all_monthly / 1000, 2) }}</th>
                  <th class="text-right">{{ number_format($plant_budget_all_monthly / 1000, 2) }}</th>
                  <th class="text-right">{{ ($plant_budget_all_monthly == 0 ? ' - ' : number_format($po_amount_all_monthly / $plant_budget_all_monthly * 100, 2)) }}</th>
                </tr>
              </tbody>
            </table>
         </div>
        </div>
      </div>
    </div>