<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
  use HasFactory;

  protected $guarded = [];
  public $timestamps = false;

  public function results()
  {
    return $this->hasMany(Result::class, 'week_number');
  }

  public function predictions()
  {
    return $this->hasMany(Prediction::class, 'week_number');
  }

  public function games()
  {
    return $this->hasMany(Games::class, 'week_number');
  }


  public static function lastPlayed()
  {
    return Week::where('played', true)->orderBy('number', 'desc')->first();
  }

  public static function next()
  {
    return Week::where('played', false)->first();
  }

  public static function reset()
  {
    Week::query()->update([
      'played' => false,
    ]);
  }

  public static function allNext()
  {
    return Week::where('played', false)->get();
  }

  public static function allPlayed()
  {
    return Week::where('played', true)->orderBy('number', 'asc')->get();
  }
}
