<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use Illuminate\Http\Request;

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
        return view('admin.classes.create', [
            'title' => 'Add Class',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAcademicClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'class_name' => 'required',
        ]);

        AcademicClass::create($validatedData);

        return redirect('/admin/classes')->with('success', 'Data successfully added!!');
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
    public function edit($id)
    {
        $class = AcademicClass::find($id);
        return view('admin.classes.edit', [
            'title' => 'Edit Class',
            'class' => $class
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcademicClassRequest  $request
     * @param  \App\Models\AcademicClass  $academicClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'class_name' => 'required'
        ]);

        $class = AcademicClass::find($id);

        $class->update(['class_name' => $request->class_name]);

        return redirect('/admin/classes')->with('success', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicClass  $academicClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = AcademicClass::find($id);
        $class->delete();
        return redirect('/admin/classes')->with('success', 'Data successfully deleted!');
    }
}
