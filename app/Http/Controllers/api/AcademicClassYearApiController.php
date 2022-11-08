<?php

namespace App\Http\Controllers\api;

use App\Models\ClassHomeTeacher;
use App\Models\AcademicClassYear;
use App\Http\Controllers\Controller;

class AcademicClassYearApiController extends Controller {
  
  public function index()
  {
    return response()->json(AcademicClassYear::with(['academicClass', 'academicYear'])->get());
  }

  public function homeroomTeachers($id)
  {
    $homeroomTeachers = ClassHomeTeacher::where([
      'academic_class_year_id' => $id
    ])->with('teacher')->get();
        
    return response()->json($homeroomTeachers);
  }

}