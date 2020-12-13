<?php

namespace App\Http\Livewire;

use App\Models\Prediction;
use App\Models\Week;
use App\Services\FootballPredictor;
use Livewire\Component;
use App\Models\Team;
use App\Models\Result;

class Game extends Component
{
  public $teams = [];
  public $weeks = [];
  private $footballPredictor;

  public function __construct()
  {
    $this->footballPredictor = new FootballPredictor();
  }

  public function mount()
  {
    $this->updateState();
  }

  public function render()
  {
    return view('livewire.game');
  }

  function clear()
  {
    Week::reset();
    Team::reset();
    Result::truncate();
    Prediction::truncate();
    $this->updateState();
  }

  public function playAll()
  {
    foreach (Week::allNext() as $week) {
      $this->playGame($week);
    }
    $this->updateState(true);
  }

  public function playNext()
  {
    $this->playGame(Week::next());
    $this->updateState();
  }

  public function playGame($week)
  {
    if (!empty($week)) {
      $games = $week->games()->get();
      foreach ($games as $game) {
        $this->footballPredictor->playGame($game);
      }
      $this->footballPredictor->setPredictions($week);
    }
  }

  public function updateState($all = false)
  {
    $this->weeks = [Week::lastPlayed()] ?: [];
    if ($all) {
      $this->weeks = Week::allPlayed();
    }
    $this->teams = Team::getAllOrdered();
  }

}
