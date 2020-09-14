<div class="col-lg-6">
    <h5 class="text-uppercase">MR to PR duration</h5>
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
                <th>> 5 days</th>
                <td class="text-right">{{ $mr_to_pr_011->where('days', '>', 5)->count() }}</td>
                <td class="text-right">{{ $mr_to_pr_017->where('days', '>', 5)->count() }}</td>
                <td class="text-right">{{ $mr_to_pr_all->where('days', '>', 5)->count() }}</td>
              </tr>
              <tr>
                <th>3, 4, 5 days </th>
                <td class="text-right">{{ $mr_to_pr_011->whereIn('days', [ 3, 4, 5])->count() }}</td>
                <td class="text-right">{{ $mr_to_pr_017->whereIn('days', [ 3, 4, 5])->count() }}</td>
                <td class="text-right">{{ $mr_to_pr_all->whereIn('days', [ 3, 4, 5])->count() }}</td>
              </tr>
              <tr>
                <th>0, 1, 2 days</th>
                <td class="text-right">{{ $mr_to_pr_011->whereIn('days', [ 0, 1, 2])->count() }}</td>
                <td class="text-right">{{ $mr_to_pr_017->whereIn('days', [ 0, 1, 2])->count() }}</td>
                <td class="text-right">{{ $mr_to_pr_all->whereIn('days', [ 0, 1, 2])->count() }}</td>
              </tr>
              <tr>
                <th>AVG</th>
                <td class="text-right">{{ number_format($mr_to_pr_011->avg('days'), 1) }}</td>
                <td class="text-right">{{ number_format($mr_to_pr_017->avg('days'), 1) }}</td>
                <td class="text-right">{{ number_format($mr_to_pr_all->avg('days'), 1) }}</td>
              </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
  </div>