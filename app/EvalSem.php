<?php
// App\EvalSem

namespace App;
use Eloquent;

class EvalSem extends Eloquent {
  protected $connection = 'sisproto';
  public $table = 'tblEvalSems';
}
