<div class="col-lg-12">
    <h4 class="text-uppercase">MR Sudah GRPO Belum ITI</h4>
    <p>This to show MR have GRPO with no ITI</p>
    <hr>
    <div class="card">
        <div class="card-header">
            <h5>011C</h5>
        </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
              <tr>
                <th>Days</th>
                @foreach ($mr_belum_iti_011 as $item)
                <th class="text-right">{{ $item->days }}</th>
                @endforeach
                <th class="text-right">Total</th>
              </tr>
              <tr>
                  <th>Record</th>
                  @foreach ($mr_belum_iti_011 as $item)
                    <td class="text-right">{{ $item->record_count }}</td>
                    @endforeach
                    <td class="text-right">{{ $mr_belum_iti_011->sum('record_count') }}</td>
              </tr>
          </table>
       </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
          <h5>017C</h5>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
            <tr>
              <th>Days</th>
              @foreach ($mr_belum_iti_017 as $item)
              <th class="text-right">{{ $item->days }}</th>
              @endforeach
              <th class="text-right">Total</th>
            </tr>
            <tr>
                <th>Record</th>
                @foreach ($mr_belum_iti_017 as $item)
              <td class="text-right">{{ $item->record_count }}</td>
              @endforeach
              <td class="text-right">{{ $mr_belum_iti_017->sum('record_count') }}</td>
            </tr>
        </table>
     </div>
    </div>
  </div>





  </div>