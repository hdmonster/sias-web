<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;

class AcademicYearApiController extends Controller {
  
  public function index()
  {
    return response()->json(AcademicYear::all());
  }

}