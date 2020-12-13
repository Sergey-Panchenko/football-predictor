<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
  use HasFactory;

  protected $guarded = [];
  public $timestamps = false;


  public function homeTeam()
  {
    return $this->belongsTo(Team::class, 'home_team_id');
  }

  public function awayTeam()
  {
    return $this->belongsTo(Team::class, 'away_team_id');
  }

  public static function saveWeeekResult($game, $goals)
  {
    return Result::firstOrCreate([
      'home_team_id' => $game->homeTeam->id,
      'away_team_id' => $game->awayTeam->id,
      'home_team_goals' => $goals['home_goals'],
      'away_team_goals' => $goals['away_goals'],
      'week_number' => $game->week->id,
    ]);
  }


  public static function getAllResults()
  {
    return Result::query()->orderBy('week_number', 'asc')->get();
  }
}
