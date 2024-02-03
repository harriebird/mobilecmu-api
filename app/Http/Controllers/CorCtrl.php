<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cor;

use App\SubLoad;

use App\Charge;

class CorCtrl extends Controller
{
  public function getCorInfo($id, $reg) {
    $corinfo = Cor::where('RegID','=',$reg)->get();
    return $corinfo->first();
  }

  public function getCorLoad($id, $reg) {
    $corload = SubLoad::where('RegID','=',$reg)->get();
    return $corload;
  }

  public function getCorCharge($id, $sem) {
    // $corcharge = Charge::where('IDNo','=',$id)->where('TermID','=',$sem)->where('TransType','=','0')->where('NonLedger','=','0')->get();
    $corcharge = Charge::where('IDNo','=',$id)->where('TermID','=',$sem)->where('NonLedger','=','0')->where('TransType','=','0')->get();
    return $corcharge;
  }
}
