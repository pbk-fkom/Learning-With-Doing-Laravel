<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Classroom;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::all();

        // $dosens = Dosen::orderBy('id', 'DESC');
        // $dosens = Dosen::latest();


        return view("hello", ["dosens" => $dosens]);

        // return view("hello", compact("dosens"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        return view("createDosen", ['classrooms' => $classrooms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama' => 'required|min:3',
            'pengampu'=> ['required', 'min:3', 'max:20'],
            'classroom_id' => 'required',
            // php artisan make:request DosenRequest
        ]);

        //dd($request->hasFile("foto));
        //unicid();

        $namaFile = "dosen_" . uniqid() . "." . $request -> file("foto")->getClientOriginalExtension();

        $request->file("foto")->storeAs("image", $namaFile, "public");

        Dosen::create([
            'nama' => $request->nama,
            'foto' => $namaFile,
            'pengampu' => $request->pengampu,
            'classroom_id' => $request->classroom_id,
            'created_at' => now(),
        ]);

        return redirect()->route('dosen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dosen = Dosen::whereId($id) -> first();
        return view('dosenShow', ['dosen' => $dosen]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = Dosen::whereId($id) -> first();
        return view('dosenEdit', ['dosen' => $dosen]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Dosen::find($id)->update([
            'nama' => $request->nama,
            'pengampu' => $request->pengampu
        ]);
        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Dosen::find($id)->delete();
        return redirect()->back();
    }
}
