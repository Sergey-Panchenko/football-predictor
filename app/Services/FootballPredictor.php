<?php
namespace App\Services;

use App\Models\Prediction;
use App\Models\Result;
use App\Models\Team;

class FootballPredictor
{

  private function getSortedByWinner($game)
  {
    $teams = [
      $game->homeTeam,
      $game->awayTeam,
    ];
    usort($teams, function ($a, $b) {
      if ($a->strength == $b->strength) {
        return 0;
      }
      return ($a->strength < $b->strength) ? 1 : -1;
    });
    return $teams;
  }

  public function playGame($game)
  {
    $teams = $this->getSortedByWinner($game);
    $teams = $this->assignResults($teams);
    $week = $game->week;
    $results = [
      'week_number' => $week->number,
    ];

    foreach ($teams as $team) {
      $team->played += 1;
      if ($team->id == $game->homeTeam->id) {
        $results['home_team_id'] = $team->id;
        $results['home_team_goals'] = (int)$team->goals;
      } else {
        $results['away_team_id'] = $team->id;
        $results['away_team_goals'] = (int)$team->goals;
      }
      unset($team->goals);
      $team->save();

    }
    Result::insert($results);
    $week->played = true;
    $week->save();
  }

  public function setPredictions($week) {
    $allPoints = Team::getAllPoints();
    foreach (Team::all() as $team) {
      Prediction::create([
        'week_number' => $week->number,
        'team_id' => $team->id,
        'probability' => ($team->points * 100) / $allPoints,
      ]);
    }
  }


  public function assignResults($teams)
  {
    $goals = rand(0, 7);
    if ($teams[0]->strength === $teams[1]->strength) {
      // drawn
      foreach ($teams as $team) {
        $team->points += 1;
        $team->drawn += 1;
        $team->goals;
      }
    } else {
      $gd = ceil(($teams[0]->strength - $teams[1]->strength) * 5 / 100);
      // won
      $teams[0]->points += 3;
      $teams[0]->won += 1;
      $teams[0]->gd += $gd;
      $teams[0]->goals = $goals + $gd;
      // lost
      $teams[1]->lost += 1;
      $teams[1]->gd -= $gd;
      $teams[1]->goals = $goals;
    }
    return $teams;
  }

}
