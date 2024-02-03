<?php
// App\Semester

namespace App;
use Eloquent;

class Semester extends Eloquent {
  protected $connection = 'sisproto';
  public $table = 'tblSemesters';
}
