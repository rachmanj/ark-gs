    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Plant Budget s/d Nov 2021</h5>
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Project</th>
                  <th scope="col" class="text-right">Budget (000)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>011C</td>
                  <td class="text-right">{{ number_format($plant_budgetnov21_011 / 1000, 2) }}</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>017C</td>
                  <td class="text-right">{{ number_format($plant_budgetnov21_017 / 1000, 2) }}</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>021C</td>
                  <td class="text-right">{{ number_format($plant_budgetnov21_021 / 1000, 2) }}</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>022C</td>
                  <td class="text-right">{{ number_format($plant_budgetnov21_022 / 1000, 2) }}</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>APS</td>
                  <td class="text-right">{{ number_format($plant_budgetnov21_APS / 1000, 2) }}</td>
                </tr>
                <tr>
                  <td></td>
                  <th>Total</th>
                  <td class="text-right">{{ number_format($plant_budgetnov21_all / 1000, 2) }}</td>
                </tr>
              </tbody>
            </table>
         </div>
        </div>
      </div>
    </div>