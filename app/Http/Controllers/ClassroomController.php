<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();

        return view('classroom.index', [ 'classrooms' => $classrooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Classroom::create([
            'nama' => $request -> nama,
            'created_at' => now(),
        ]);

        return redirect() -> route('classroom.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classroom = Classroom::whereId($id)->first();

        return view('classroom.edit', ['classroom' => $classroom]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Classroom::find($id)->update([
            'nama' => $request->nama,
            'updated_at' => now(),
        ]);

        return redirect()->route('classroom.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classroom::find($id)->delete();

        return redirect()->back();
    }
}
