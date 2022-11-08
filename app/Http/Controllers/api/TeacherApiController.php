<?php

namespace App\Http\Controllers\api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\AcademicClass;
use App\Http\Controllers\Controller;

class TeacherApiController extends Controller
{
    public function index()
    {
        return response()->json(Teacher::all());
    }

    public function show(Teacher $teacher)
    {
      return response()->json($teacher);
    }

}
