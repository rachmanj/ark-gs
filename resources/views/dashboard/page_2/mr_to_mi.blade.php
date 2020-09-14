<div class="col-lg-6">
    <h5 class="text-uppercase">MR to MI Duration</h5>
    {{-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat molestiae consectetur molestias quisquam minima</p> --}}
    <hr>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Description</th>
                <th scope="col" class="text-right">011C</th>
                <th scope="col" class="text-right">017C</th>
                <th scope="col" class="text-right">All</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <tr>
                    <th>> 10 days</th>
                    <td class="text-right">{{ $mr_to_mi_011->where('days', '>', 10)->count() }}</td>
                    <td class="text-right">{{ $mr_to_mi_017->where('days', '>', 10)->count() }}</td>
                    <td class="text-right">{{ $mr_to_mi_all->where('days', '>', 10)->count() }}</td>
                  </tr>
                <th>5 - 10 days</th>
                <td class="text-right">{{ $mr_to_mi_011->where('days', '>', 5)->count() }}</td>
                <td class="text-right">{{ $mr_to_mi_017->where('days', '>', 5)->count() }}</td>
                <td class="text-right">{{ $mr_to_mi_all->where('days', '>', 5)->count() }}</td>
              </tr>
              <tr>
                <th>3, 4, 5 days </th>
                <td class="text-right">{{ $mr_to_mi_011->whereIn('days', [ 3, 4, 5])->count() }}</td>
                <td class="text-right">{{ $mr_to_mi_017->whereIn('days', [ 3, 4, 5])->count() }}</td>
                <td class="text-right">{{ $mr_to_mi_all->whereIn('days', [ 3, 4, 5])->count() }}</td>
              </tr>
              <tr>
                <th>0, 1, 2 days</th>
                <td class="text-right">{{ $mr_to_mi_011->whereIn('days', [ 0, 1, 2])->count() }}</td>
                <td class="text-right">{{ $mr_to_mi_017->whereIn('days', [ 0, 1, 2])->count() }}</td>
                <td class="text-right">{{ $mr_to_mi_all->whereIn('days', [ 0, 1, 2])->count() }}</td>
              </tr>
              <tr>
                <th>AVG</th>
                <td class="text-right">{{ number_format($mr_to_mi_011->avg('days'), 1) }}</td>
                <td class="text-right">{{ number_format($mr_to_mi_017->avg('days'), 1) }}</td>
                <td class="text-right">{{ number_format($mr_to_mi_all->avg('days'), 1) }}</td>
              </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>