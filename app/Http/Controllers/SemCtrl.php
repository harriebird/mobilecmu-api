<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Semester;

use App\EvalSem;

use DB;

class SemCtrl extends Controller
{
  public function getSems($id)
  {
    $sems = DB::connection('sisproto')->table('sis_mobile_registrations')->join('sis_mobile_semesters','sis_mobile_registrations.TermID','=','sis_mobile_semesters.TermID')->select('sis_mobile_semesters.TermID','sis_mobile_semesters.SchoolTerm','sis_mobile_semesters.AcademicYear','sis_mobile_registrations.RegID')->where('StudentNo','=', $id)->get();
    return $sems;
  }

  // public function getEvalSems()
  // {
  //   $sems = EvalSem::all();
  //   return $sems;
  // }
}
