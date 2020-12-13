<div class="container">
  @unless(empty($teams))
    <x-teams>
      <x-slot name="teams">
        @foreach ($teams as $team)
          <tr>
            <th scope="row">{{ $team->name }}</th>
            <td>{{ $team->points }}</td>
            <td>{{ $team->played }}</td>
            <td>{{ $team->won }}</td>
            <td>{{ $team->drawn }}</td>
            <td>{{ $team->lost }}</td>
            <td>{{ $team->gd }}</td>
          </tr>
        @endforeach
      </x-slot>
    </x-teams>
  @endunless
  @unless(empty($weeks))
    @foreach($weeks as $week)
      @unless(empty($week->results))
        <x-results>
          <x-slot name="week">
            <caption>
              <h4><span class="badge bg-secondary">{{$week->number}}th Week Match Results</span></h4>
            </caption>
          </x-slot>
          <x-slot name="results">
            @foreach ($week->results as $result)
              <tr>
                <td>{{ $result->homeTeam->name }}</td>
                <td>{{ $result->home_team_goals }} : {{ $result->away_team_goals }}</td>
                <td>{{ $result->awayTeam->name }}</td>
              </tr>
            @endforeach
          </x-slot>
        </x-results>
      @endunless
      @unless(empty($week->predictions))
        <x-predictions>
          <x-slot name="week">
            <caption>
              <h4><span class="badge bg-secondary">{{$week->number}}th Week Predictions of Championship</span></h4>
            </caption>
          </x-slot>
          <x-slot name="predictions">
            @foreach ($week->predictions as $prediction)
              <tr>
                <th scope="col">{{ $prediction->team->name }}</th>
                <th scope="col">{{ $prediction->probability }} %</th>
              </tr>
            @endforeach
          </x-slot>
        </x-predictions>
      @endunless
    @endforeach
  @endunless
</div>
