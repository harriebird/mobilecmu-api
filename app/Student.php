<?php
// App\Student

namespace App;
use Eloquent;

class Student extends Eloquent {
  protected $connection = 'sisproto';
  public $table = 'sis_mobile_students';
}
