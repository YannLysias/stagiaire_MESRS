<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use App\Models\Stage;
use App\Models\Stagiaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'Stagiaire') {
            $stagiaire = $user->stagiaire;
            $stage = $stagiaire->stages->first();
            $observations = Observation::where('stage_id', $stage->id)->get();
        } else {
            $observations = Observation::all();
        }
        return view('observation', ['observations' => $observations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $stage_id = $request->get('stage_id');
        $stage = Stage::findOrFail($stage_id);
        $stagiaires = $stage->stagiaires;
        return view('add_observation', ['stage' => $stage, 'stagiaires' => $stagiaires]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'description' => 'required|max:500',
        ]);
    
        $user = Auth::user();
        $stage = Stage::findOrFail($request->stage_id);
    
        Observation::create([
            'description' => $request->description,
            'user_id' => $user->id,
            'stage_id' => $stage->id,
        ]);
    
        return redirect()->route('observation.index')->with('success', 'Observation enregistrée avec succès.');
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
        $observation = Observation::where('id', (int) $id)->first();

        return view('edit_observation', compact('observation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'description' => 'required|max:500',
        ]);
       

        $observations = Observation::where('id', (int) $id)->first();

        $observations ->description = $request->description;

        $observations -> save();

        return redirect()->route('observation.index')->with('success', 'Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
