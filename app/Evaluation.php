<?php
// App\Evaluation

namespace App;
use Eloquent;

class Evaluation extends Eloquent {
  protected $connection = 'sisproto';
  public $table = 'tblEvals';
}
