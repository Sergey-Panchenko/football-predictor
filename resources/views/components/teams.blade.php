<table class="table table-bordered table-warning table-hover caption-top table-striped ">
  <caption><h4><span class="badge bg-secondary">League Table </span></h4>
  </caption>
  <thead>
  <tr class="table-info">
    <th scope="col">Teams</th>
    <th scope="col">PTS</th>
    <th scope="col">P</th>
    <th scope="col">W</th>
    <th scope="col">D</th>
    <th scope="col">L</th>
    <th scope="col">GD</th>
  </tr>
  </thead>
  <tbody>
    {{ $teams }}
  </tbody>
</table>
<button wire:click="clear" type="button" class="btn btn-info">Clear Progress</button>
<button wire:click="playAll" type="button" class="btn btn-info">Play All & Show</button>
<button wire:click="playNext" type="button" class="btn btn-warning">Next Week</button>
