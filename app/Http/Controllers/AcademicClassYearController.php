<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\AcademicClass;
use App\Models\AcademicYear;
use App\Models\ClassHomeTeacher;
use App\Models\AcademicClassYear;
use App\Http\Controllers\Controller;

class AcademicClassYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicClassYears = AcademicClassYear::with([
            'studentClasses',
            'academicClass',
            'academicYear'
        ])->get();

        return view('admin.classes.index', [
            'title' => 'Academic Class',
            'classes' => $academicClassYears
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academicClasses = AcademicClass::all();
        $academicYears = AcademicYear::all();

        return view('admin.classes.academic.create', [
            'title' => 'Add Academic Class',
            'academicClasses' => $academicClasses,
            'academicYears' => $academicYears
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AcademicClassYear::create([
            'academic_class_id' => $request->academic_class_id,
            'academic_year_id'  => $request->academic_year_id
        ]);

        return redirect('/admin/academic-classes')->with('success', 'Data successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicClassYear  $academicClassYear
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicClassYear $academicClassYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicClassYear  $academicClassYear
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $academicClassYear = AcademicClassYear::find($id);
        // dd($academicClassYear);
        $academicClasses = AcademicClass::all();
        $academicYears = AcademicYear::all();

        return view('admin.classes.academic.edit', [
            'title' => 'Edit Academic Class',
            'academicClasses' => $academicClasses,
            'academicYears' => $academicYears,
            'academicClassYear' => $academicClassYear,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicClassYear  $academicClassYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $academicClassYear = AcademicClassYear::find($id);

        $academicClassYear->update([
            'academic_class_id' => $request->academic_class_id,
            'academic_year_id' => $request->academic_year_id,
        ]);

        return redirect('/admin/academic-classes')->with('success', 'Data successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicClassYear  $academicClassYear
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academicClassYear = AcademicClassYear::find($id);
        $academicClassYear->delete();

        return redirect('/admin/academic-classes')->with('success', 'Data successfully deleted!');
    }

    public function transfer()
    {
        $academicClassYears = AcademicClassYear::with([
            'studentClasses',
            'academicClass',
            'academicYear'
        ])->get();

        return view('admin.classes.transfer', [
            'title' => 'Class Transfer',
            'classes' => $academicClassYears
        ]);
    }

    public function transferClass(Request $request)
    {
        // dd($request->all());
        $students = StudentClass::where([
            'academic_class_year_id' => $request->academic_class_year_id_to_transfer,
        ])->get();

        // dd($students);
        foreach ($students as $student) {
            StudentClass::create([
                'academic_class_year_id' => $request->academic_class_year_id,
                'student_id' => $student->student_id
            ]);
        }

        return redirect()->back();
    }

    public function homeroom()
    {
        $academicClassYears = AcademicClassYear::with([
            'studentClasses',
            'homeroomTeachers.teacher',
            'academicClass',
            'academicYear'
        ])->get();

        return view('admin.classes.homeroom', [
            'title' => 'Homeroom Teacher',
            'classes' => $academicClassYears
        ]);
    }

    public function addHomeroom(Request $request)
    {
        $validatedData = $request->validate([
            'teacher_id' => 'required',
            'academic_class_year_id' => 'required'
        ]);

        $isCurrentTeacherExist = ClassHomeTeacher::where([
            'teacher_id' => $request->teacher_id,
            'academic_class_year_id' => $request->academic_class_year_id
        ])->exists();

        if (!$isCurrentTeacherExist) {
            ClassHomeTeacher::create($validatedData);
        }

        return redirect()->back();
    }

    public function removeHomeroom(Request $request)
    {
        ClassHomeTeacher::destroy([
            'teacher_id' => $request->teacher_id,
            'academic_class_year_id' => $request->academic_class_year_id
        ]);

        return redirect()->back();
    }
}
