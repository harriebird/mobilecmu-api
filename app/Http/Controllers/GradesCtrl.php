<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Grade;

class GradesCtrl extends Controller
{
  public function getSemGrades($id, $sem)
  {
    if($sem == 'inc')
      $grades = Grade::where('StudentNo','=',$id)->where('Final','=','INC')->get();
    else
      $grades = Grade::where('StudentNo','=',$id)->where('TermID','=',$sem)->get();
    return $grades;
  }

  public function getGrades($id)
  {
    $grades = Grade::where('StudentNo','=',$id)->get();
    return $grades;
  }
}
