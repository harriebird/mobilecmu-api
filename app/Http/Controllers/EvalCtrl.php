<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Evaluation;

class EvalCtrl extends Controller
{
  public function getSubs($id, $sem)
  {
    $eval = Evaluation::where('studno','=',$id)->where('semid','=',$sem)->get();
    return $eval;
  }
}
