<?php
// App\Legder

namespace App;
use Eloquent;

class Ledger extends Eloquent {
  protected $connection = 'sisproto';
  public $table = 'sis_mobile_ledgers';
}
