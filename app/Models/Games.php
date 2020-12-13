<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
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

  public function week()
  {
    return $this->belongsTo(Week::class, 'week_number');
  }

}
