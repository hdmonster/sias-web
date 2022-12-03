<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\AcademicScore;
use App\Models\AcademicClassYear;
use App\Http\Controllers\Controller;
use Auth;

class StudentAcademicScoreController extends Controller
{
    public function rapor($academicClassYearId)
    {
        $academicClasses = [];
        $studentId = Auth::guard('student')->user()->id;

        $subjects = Subject::all();

        $className = AcademicClassYear::find($academicClassYearId)
        ->with(['academicClass'])->first()->academicClass->class_name;
                
        $studentScores = AcademicScore::where([
            'academic_class_year_id' => $academicClassYearId,
            'student_id' => $studentId
        ])
        ->orderBy('score_type')
        ->get()
        ->groupBy('subject_id');
        
        foreach ($studentScores as $studentScore) {
            foreach ($studentScore as $value) {
                if(!in_array($value->subject->subject_name, $academicClasses)){
                    array_push($academicClasses, $value->subject->subject_name);
                }
            }
        }

        return view('student.rapor.index', [
            'title' => 'Class  ' . $className . ' Score',
            'academicClassYearId' => $academicClassYearId,
            'className' => $className,
            'studentScores' => $studentScores,
            'subjects' => $subjects,
            'academicClasses' => $academicClasses,
        ]);
    }

    public function performance($academicClassYearId)
    {
        $className = AcademicClassYear::find($academicClassYearId)
        ->with(['academicClass'])->first()->academicClass->class_name;
        
        return view('student.rapor.performance', [
            'title' => 'Class  ' . $className . ' Performance'
        ]);
    }
}
