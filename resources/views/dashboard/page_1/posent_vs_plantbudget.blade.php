
    <div class="col-lg-6">
      <h4 class="text-uppercase">PO Sent Vs Plant Budget </h4>
      <p>This month PO with Status Delivered vs this month Plant Budget </p>
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
                  <td class="text-right">{{ number_format($po_amount_011_this_month / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_011_this_month / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($po_amount_011_this_month / $plant_budget_011_this_month * 100, 2) }}</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>017C</td>
                  <td class="text-right">{{ number_format($po_amount_017_this_month / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_017_this_month / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($po_amount_017_this_month / $plant_budget_017_this_month * 100, 2) }}</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>APS</td>
                  <td class="text-right">{{ number_format($po_amount_APS_this_month / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_APS_this_month / 1000, 2) }}</td>
                  <td class="text-right">{{ ($plant_budget_APS_this_month == 0 ? ' - ' : number_format($po_amount_APS_this_month / $plant_budget_APS_this_month * 100, 2)) }}</td>
                </tr>
                <tr>
                  <td></td>
                  <th>Total</th>
                  <th class="text-right">{{ number_format($po_amount_all_this_month / 1000, 2) }}</th>
                  <th class="text-right">{{ number_format($plant_budget_all_this_month / 1000, 2) }}</th>
                  <th class="text-right">{{ ($plant_budget_all_this_month == 0 ? ' - ' : number_format($po_amount_all_this_month / $plant_budget_all_this_month * 100, 2)) }}</th>
                </tr>
              </tbody>
            </table>
         </div>
        </div>
      </div>
    </div>