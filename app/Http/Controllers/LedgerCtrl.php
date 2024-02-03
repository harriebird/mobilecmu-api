<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ledger;

use DB;

class LedgerCtrl extends Controller
{
  public function getLedgerInfo($id, $sem) {
    //$ledgerinfo = Ledger::where('IDNo','=',$id)->where('TermID','=',$sem)->where('NonLedger','=',0)->groupBy('ReferenceNo')->get();
    $collection = DB::connection('sisproto')->table('sis_mobile_ledgers')->selectRaw('ReferenceNo, SUM(Debit) AS Debit, SUM(Credit) AS Credit, MIN(TransDate) AS TransDate, TransType, NonLedger')->where('IDNo','=',$id)->where('TermID','=',$sem)->where('NonLedger','=',0)->where('TransType','!=',15)->groupBy('ReferenceNo','TransType','NonLedger')->orderBy('TransDate')->get();
    $col = collect($collection)->filter(function($trans) {
      if($trans->TransType == '1' && $trans->Credit == '0')
        return false;
      else
        return true;
    });
    $col = array_values($col->toArray());
    return $col;
  }
}
