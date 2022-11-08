<?php

namespace App\Http\Controllers;

use App\Models\ClassHomeTeacher;
use Illuminate\Http\Request;

class ClassHomeTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.classes.homeroom', [
        //     'title' => 'Homeroom Teacher',
        //     'classes' => ClassHomeTeacher::all()
        // ]);
        return ClassHomeTeacher::with('teacher')->with('academicClassYear')->get();
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
     * @param  \App\Models\ClassHomeTeacher  $classHomeTeacher
     * @return \Illuminate\Http\Response
     */
    public function show(ClassHomeTeacher $classHomeTeacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassHomeTeacher  $classHomeTeacher
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassHomeTeacher $classHomeTeacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassHomeTeacher  $classHomeTeacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassHomeTeacher $classHomeTeacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassHomeTeacher  $classHomeTeacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassHomeTeacher $classHomeTeacher)
    {
        //
    }
}
