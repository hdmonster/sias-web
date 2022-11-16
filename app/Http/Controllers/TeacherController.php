<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.teachers.index', [
            'title' => 'Teachers',
            'teachers' => Teacher::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.create', [
            'title' => 'Add Teacher'
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
            'nip' => 'required|unique:teachers',
            'password' => 'required',
            'gender' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        Teacher::create($validatedData);

        return redirect('/admin/teachers')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', [
            'title' => 'Edit Teacher',
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
      $rules = [
        'name' => 'required',
        'gender' => 'required'
      ];

      if ($request->nip != $request->old_nip){
        $rules['nip'] = 'required|unique:teachers';
      }

      $validatedData = $request->validate($rules);

      $teacher->update($validatedData); 

      return redirect('/admin/teachers')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->update(['status' => 'inactive']);

        return redirect('/admin/teachers')->with('success', 'Data berhasil di non-aktivasi!');
    }
}
