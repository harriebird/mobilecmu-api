<?php
// App\Cor

namespace App;
use Eloquent;

class Cor extends Eloquent {
  protected $connection = 'sisproto';
  public $table = 'sis_mobile_registrations';
}
