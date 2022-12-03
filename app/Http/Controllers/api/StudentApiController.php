<?php

namespace App\Http\Controllers\api;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\AcademicClass;
use App\Models\StudentClass;
use App\Models\AcademicScore;
use App\Http\Controllers\Controller;
use Auth;

class StudentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Student::with('studentClasses.academicClassYear.academicClass')->get());
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student = Student::where('id', $student->id)->with('studentClasses.academicClassYear.academicClass')->first();
        
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function performance($id)
    {
        $student = Student::find($id); 
        $studentClass = StudentClass::orderBy('id', 'desc')->where('student_id', $student->id)->first();
        $academicScore = AcademicScore::where('student_id',  '=', $student->id)->where('academic_class_year_id','=', $studentClass->academic_class_year_id)->get();
        $academicScoreFinal = [];
        $academicScoreMid = [];
        $academicScoreHomework = [];
        $academicScoreDailyTest = [];
        $academicScoreQuiz = [];
        $academicScoreOthers = [];
        $academicClasses = [];
        
        foreach ($academicScore as $score) {
            if(!in_array($score->subject->subject_name, $academicClasses)){
                array_push($academicClasses, $score->subject->subject_name);
            }
            
            if($score['score_type'] == 'mid term'){
                $academicScoreMid[$score->subject->subject_name] = $score->score;
            }
            if($score['score_type'] == 'final term'){
                $academicScoreFinal[$score->subject->subject_name] = $score->score;
            }
            if($score['score_type'] == 'homework'){
                $academicScoreHomework[$score->subject->subject_name] = $score->score;
            }
            if($score['score_type'] == 'daily test'){
                $academicScoreDailyTest[$score->subject->subject_name] = $score->score;
            }
            if($score['score_type'] == 'quiz'){
                $academicScoreQuiz[$score->subject->subject_name] = $score->score;
            }
        }

        // Count Others
        foreach ($academicClasses as $academicClass) {
            $countAverage = round(($academicScoreHomework[$academicClass] + $academicScoreDailyTest[$academicClass] + $academicScoreQuiz[$academicClass])/3, 0);
            $academicScoreOthers[$academicClass] = $countAverage;
        }
        $allAcademicScore = [
            'final_term' => $academicScoreFinal,
            'mid_term' => $academicScoreMid,
            'others' => $academicScoreOthers,
        ];
        
        return response()->json([
            'labels' => $academicClasses,
            'scores' => $allAcademicScore
        ]);
    }

    public function subject($id)
    {
        $student = Student::find($id); 
        $studentClass = StudentClass::orderBy('id', 'desc')->where('student_id', $student->id)->first();
        $academicScore = AcademicScore::where('student_id',  '=', $student->id)->where('academic_class_year_id','=', $studentClass->academic_class_year_id)->get();
        $academicScoreAverage = [];
        $academicClasses = [];
        
        foreach ($academicScore as $score) {
            if(!in_array($score->subject->subject_name, $academicClasses)){
                array_push($academicClasses, $score->subject->subject_name);
            }
        }

        // Count Others
        foreach ($academicClasses as $academicClass) {
            $total = 0;
            foreach ($academicScore as $value) {
                if($value->subject->subject_name == $academicClass){
                    $total += $value->score;
                    $academicScoreAverage[$academicClass] = $total;
                }
            }
            $academicScoreAverage[$academicClass] = $total/5;
        }
        
        return response()->json([
            'labels' => $academicClasses,
            'scores' => $academicScoreAverage
        ]);
    }

    public function allSubject(){
        $subjects = Subject::all();
        $academicScores = AcademicScore::all();
        $academicScoresAverage = [];

        // foreach ($academicScores as $academicScore) {
        //     $count = 0;
        //     foreach ($academicScore->pluck('score') as $value) {
        //         $count += $value;
        //     }
        //     $average = $count / count($academicScore->pluck('score'));
        //     $academicScoresAverage[$academicScore->pluck('subject_id')] = $average;
        //     // echo $academicScore->pluck('score') . '<br><br><br>';
        // }

        foreach ($subjects as $subject) {
            $i = 0;
            $count = 0;
            foreach ($subject->subjectScores as $value) {
                $count += $value->score;
                $i += 1;
                // echo $subject->subject_name . ' : ' .$value->score . '<br>';
            };

            if ($i == 0 && $count == 0){
                $average = 0;
            }else{
                $average = $count/$i;
            }
            array_push($academicScoresAverage, $average);
            // $academicScoresAverage = $average;
        }

        return response()->json([
            'labels' => $subjects->pluck('subject_name'),
            'scores' => $academicScoresAverage
        ]);
    }
}
