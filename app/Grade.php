<?php
// App\Grade

namespace App;
use Eloquent;

class Grade extends Eloquent {
  protected $connection = 'sisproto';
  public $table = 'sis_mobile_grades';
}
