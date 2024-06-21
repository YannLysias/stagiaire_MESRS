<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structures = Structure::all();
        return view('structure', [
            'structures' => $structures,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_structure');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([

            'code_structure'  => 'required|max:255',
            'libelle' => 'required|max:255',
            
        ]);
    
 
        $structure = Structure::create([
            'code_structure' => $request->code_structure,
            'libelle' => $request->libelle,
            //'user_id' => $request->user_id,
        ]);
    
        return redirect('structure')->with('success', 'Votre enregistrement a été effectué avec succès.');
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
        $structure = Structure::where('id', (int) $id)->first();

        return view('edit_structure', compact('structure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'libelle' => 'required|max:255',
            'code_structure' => 'required|max:255',
           
        ]);
        $structures = Structure::where('id', (int) $id)->first();

        $structures ->libelle = $request->libelle;
        $structures ->code_structure = $request->code_structure;

        $structures -> save();

        return redirect()->route('structure.index')->with('success', 'Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
