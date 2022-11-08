<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Http\Requests\StoreAcademicClassRequest;
use App\Http\Requests\UpdateAcademicClassRequest;

class AcademicClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.classes.index-unassigned', [
            'title' => 'All Class',
            'classes' => AcademicClass::all()
        ]);
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
     * @param  \App\Http\Requests\StoreAcademicClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcademicClassRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicClass  $academicClass
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = AcademicClass::find($id);
        return response()->json($class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicClass  $academicClass
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicClass $academicClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcademicClassRequest  $request
     * @param  \App\Models\AcademicClass  $academicClass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcademicClassRequest $request, AcademicClass $academicClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicClass  $academicClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicClass $academicClass)
    {
        //
    }
}
