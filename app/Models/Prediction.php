<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
  use HasFactory;

  protected $guarded = [];
  public $timestamps = false;

  public function team()
  {
    return $this->belongsTo(Team::class);
  }

  public static function savePredictions()
  {

  }
}
