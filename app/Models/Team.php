<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  use HasFactory;

  protected $guarded = [];
  public $timestamps = false;

  public static function getAllOrdered()
  {
    return Team::orderBy('points', 'desc')->orderBy('gd', 'desc')->get();
  }

  public static function reset()
  {
    Team::query()->update([
      'points' => 0,
      'played' => 0,
      'won' => 0,
      'drawn' => 0,
      'lost' => 0,
      'gd' => 0,
    ]);
  }

  public static function getAllPoints()
  {
    $points = 0;
    foreach (self::all() as $team) {
      $points += $team->points;
    }
    return $points;
  }
}
