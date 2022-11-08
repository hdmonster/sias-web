<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\AcademicScore;
use App\Models\AcademicClassYear;
use App\Http\Controllers\Controller;

class AcademicScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicScore  $academicScore
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicScore $academicScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicScore  $academicScore
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicScore $academicScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicScore  $academicScore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicScore $academicScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicScore  $academicScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicScore $academicScore)
    {
        //
    }

    public function updateScore(Request  $request){
        $validatedData = $request->validate([
            'subject_id' => 'required',
            'student_id' => 'required',
            'academic_class_year_id' => 'required',
            'score' => 'required',
            'score_type' => 'required'
        ]);

        $existingRecord = AcademicScore::where([
            'subject_id' => $request->subject_id,
            'student_id' => $request->student_id,
            'academic_class_year_id' => $request->academic_class_year_id,
            'score_type' => $request->score_type
        ]);

        $existingRecord->exists() ?
            $existingRecord->update(['score' => $request->score])
            :
            AcademicScore::create($validatedData);

        return redirect()->back();

        return $existingRecord->get();
    }

    public function academicClassYearScore($academicClassYearId, $subjectId)
    {
        $className = AcademicClassYear::find($academicClassYearId)
        ->with(['academicClass'])->first()->academicClass->class_name;
        
        $subjectName = Subject::find($subjectId)->subject_name;
        
        $students = StudentClass::where([
            'academic_class_year_id' => $academicClassYearId
        ])->with(['student'])->get();

        $studentScores = AcademicScore::where([
            'academic_class_year_id' => $academicClassYearId,
            'subject_id' => $subjectId
        ])
        ->orderBy('score_type')
        ->get()
        ->groupBy('student_id');
        
        return view('admin.academic-score.index', [
            'title' => 'Class '. $className .' - '. ucwords($subjectName),
            'academicClassYearId' => $academicClassYearId,
            'subjectId' => $subjectId,
            'subjectName' => $subjectName,
            'students' => $students,
            'studentScores' => $studentScores
        ]);
    }
}
