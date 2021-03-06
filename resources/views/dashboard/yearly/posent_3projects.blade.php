    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">PO Sent vs Plant Budget</h5>
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
                  <td class="text-right">{{ number_format($po_sent_011 / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_011 / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($po_sent_011 / $plant_budget_011 * 100, 2) }}</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>017C</td>
                  <td class="text-right">{{ number_format($po_sent_017 / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_017 / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($po_sent_017 / $plant_budget_017 * 100, 2) }}</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>APS</td>
                  <td class="text-right">{{ number_format($po_sent_APS / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_APS / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($po_sent_APS / $plant_budget_APS * 100, 2) }}</td>
                </tr>
                <tr>
                  <td></td>
                  <th>Total</th>
                  <td class="text-right">{{ number_format($po_sent_three / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($plant_budget_three / 1000, 2) }}</td>
                  <td class="text-right">{{ number_format($po_sent_three / $plant_budget_three * 100, 2) }}</td>
                </tr>
              </tbody>
            </table>
         </div>
        </div>
      </div>
    </div>