<div class="col-lg-12">
    <h4 class="text-uppercase">Outstanding MR</h4>
    <p>This to show MR with Status Open</p>
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
                @foreach ($outs_mr_011 as $item)
                <th class="text-center">{{ $item->days }}</th>
                @endforeach
              </tr>
              <tr>
                  <th>Record</th>
                  @foreach ($outs_mr_011 as $item)
                <td class="text-center">{{ $item->record_count }}</td>
                @endforeach
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
              @foreach ($outs_mr_017 as $item)
              <th class="text-center">{{ $item->days }}</th>
              @endforeach
            </tr>
            <tr>
                <th>Record</th>
                @foreach ($outs_mr_017 as $item)
              <td class="text-center">{{ $item->record_count }}</td>
              @endforeach
            </tr>
        </table>
     </div>
    </div>
  </div>





  </div>