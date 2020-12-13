@if(!empty($results))
  <table class="table caption-top table-success" style="width: 45%; float: left">
    @unless(empty($week))
      <h4><span class="badge bg-secondary">{{ $week }}</span></h4>
    @endunless
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">--</th>
      <th scope="col">#</th>
    </tr>
    </thead>
    <tbody>
    {{ $results }}
    </tbody>
  </table>
@endif
