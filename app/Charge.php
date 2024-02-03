<?php
// App\Charge

namespace App;
use Eloquent;

class Charge extends Eloquent {
  protected $connection = 'sisproto';
  public $table = 'sis_mobile_ledgers';
}
