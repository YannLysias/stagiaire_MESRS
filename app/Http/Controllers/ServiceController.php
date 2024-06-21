<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Structure;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $services = Service::all();
        return view('service', [
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $structures = Structure::all();

        return view('add_service', [
            'structures' => $structures,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([

            'code_service'  => 'required|max:255',
            'libelle' => 'required|max:255',
            'structure_id' => 'required|max:255',
            
        ]);
    
        $structure = Structure::findOrFail(intval($request->structure_id));

        $service = Service::create([
            'code_service' => $request->code_service,
            'libelle' => $request->libelle,
            'structure_id' => $structure->id,
        ]);

        $service->structures()->attach($structure->id);
    
        return redirect('service')->with('success', 'Votre enregistrement a été effectué avec succès.');
    
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
        $service = Service::where('id', (int) $id)->first();
        $structures = Structure::all();

        return view('edit_service', compact('service', 'structures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code_service'  => 'required|max:255',
            'libelle' => 'required|max:255',
            'structure_id' => 'required|max:255',
           
        ]);

        $services = Service::where('id', (int) $id)->first();

        $structure = Structure::findOrFail(intval($request->structure_id));

        
        $services ->libelle = $request->libelle;
        $services ->code_service = $request->code_service;
        $services ->structure_id = $structure->id;
       // $services ->user_id = $request->user_id;

        $services -> save();

        return redirect()->route('service.index')->with('success', 'Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
