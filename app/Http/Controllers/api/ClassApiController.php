<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AcademicClass;

class ClassApiController extends Controller {
  
  public function index()
  {
    return response()->json(AcademicClass::all());
  }

}