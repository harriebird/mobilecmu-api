<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;

class StudCtrl extends Controller
{
  public function getInfo($id)
  {
    $studinfo = Student::where('StudentNo','=',$id)->orderBy('TermID')->get();
    return $studinfo->last();
  }

  public function getPic($id)
  {
    $picdata = file_get_contents('http://localhost/student-portal/userAccounts/Picture.ashx?studentno='.$id);
    return base64_encode($picdata);
  }
}
