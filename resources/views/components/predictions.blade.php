@if($predictions)
  <table class="table caption-top" style="width: 45%; float: right;">
    @unless(empty($week))
      <h4><span class="badge bg-secondary">{{ $week }}</span>
    @endunless
    <thead>
    {{ $predictions }}
    </thead>
    <tbody>
    </tbody>
  </table>
@endif

