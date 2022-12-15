<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.students.index', [
            'title' => 'Students',
            'students' => Student::with('studentClasses.academicClassYear.academicClass')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create', [
            'title' => 'Register Student'
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
        $validatedData = $request->validate([
            'name' => 'required',
            'nisn' => 'required|unique:students',
            'gender' => 'required',
            'religion' => 'required',
            'birthday' => 'required',
            'birthplace' => 'required',
            'parent_name' => 'required',
            'parent_mobile' => 'required',
            'address' => 'required'
        ]);

        $birthday = strtotime($request->birthday);

        $validatedData['password'] = bcrypt($request->nisn);
        $validatedData['birth_place_and_date'] = $request->birthplace . ', ' . date('d M Y', $birthday);

        Student::create($validatedData);
        return redirect('/admin/students')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', [
          'title' => 'Edit Student',
          'student' => $student
        ]);
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
        $rules = [
          'name' => 'required',
          'gender' => 'required',
          'religion' => 'required',
          'birthday' => 'required',
          'birthplace' => 'required',
          'parent_name' => 'required',
          'parent_mobile' => 'required',
          'address' => 'required'
        ];

        if ($request->nisn != $request->old_nisn){
          $rules['nisn'] = 'required|unique:students';
        }

        $validatedData['password'] = bcrypt($request->nisn);
        $validatedData['birth_place_and_date'] = $request->birthplace . ', ' . $request->birthday;

        $validatedData = $request->validate($rules);

        $student->update($validatedData);

        return redirect('/admin/students')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/admin/students')->with('success', 'Data berhasil dihapus!');
    }

    public function assignClassIndex()
    {
        $students = Student::with('studentClasses.academicClassYear.academicClass')->get();

        return view('admin.students.assign-class', [
            'title' => 'Assign Class',
            'students' => $students
        ]);
    }

    public function assignClass(Request $request)
    {
        $validatedData = [
            'academic_class_year_id' => $request->academicClassYearId,
            'student_id' => $request->studentId
        ];
        StudentClass::create($validatedData);

        return redirect()->back();
    }
}
