<?php

namespace App\Http\Controllers\staff\occupation;

use App\Http\Controllers\Controller;
use App\Models\staff\employee\Employee;
use App\Models\staff\occupation\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    //
    public function index()
    {
        $occupation = Occupation::all();
        return view('staff.occupation.index', ['occupations' => $occupation]);
    }
    public function create()
    {
        return view('staff.occupation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $occupation = new Occupation();
        $occupation->name = $request->name;
        $occupation->save();

        return redirect()->route('staff.occupation.index')->with('success', 'Ocupacion creada con éxito');
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
        $occupation = Occupation::find($id);
        return view('staff.occupation.edit', ['occupation' => $occupation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'name' => 'required',
        ]);
        $occupation = Occupation::find($id);
        $occupation->name = $request->name;
        $occupation->save();

        return redirect()->route('staff.occupation.index')->with('success', 'Ocupacion actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $occupation = Occupation::find($id);
        if ($occupation->id == 1) {
            return redirect()->back()->with('error', 'No puedes eliminar la ocupacion principal');
        }else{
            Employee::where('occupation_id', $id)->delete();
        $occupation->delete();

        return redirect()->back()->with('success', 'Ocupación eliminada con éxito');
        }
        // $occupation->save();
        
        // // Actualizar la categoría de los productos asociados
        // Employee::where('occupation_id', $id)->update(['occupation_id' => 1]);

        // return redirect()->back()->with('success', 'Ocupacion eliminada con éxito'); // Ejemplo de redirección con mensaje de éxito
    }
}
