<?php
// App\SubLoad

namespace App;
use Eloquent;

class SubLoad extends Eloquent {
  protected $connection = 'sisproto';
  public $table = 'sis_mobile_subjectsched';
}
