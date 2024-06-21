<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use App\Models\Stagiaire;
use App\Models\User;
use App\Models\Stage;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function suivi(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Rechercher l'utilisateur par son email dans la table User
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email non trouvé.');
        }
        

        // Si l'utilisateur existe, récupérer le stagiaire associé
        $stagiaire = Stagiaire::where('user_id', $user->id)->first();

        if ($stagiaire) {
            return view('suivi')->with('stagiaire', $stagiaire);
        } else {
            return back()->with('error', 'Stagiaire non trouvé.');
        }
    }


    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'ChefService') {
            $stagiaires = Stagiaire::whereHas('stages', function ($query) {
                $query->where('etat', 'Validé');
            })->get();
        } else {
            $stagiaires = Stagiaire::all();
        }
    
        return view('stagiaire', [
            'stagiaires' => $stagiaires,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('add_stagiaire');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([

            'adresse'  => 'required|max:255',
            'ecole'     => 'required|max:255',
            'filiere'   => 'required|max:255',
            'niveau'   => 'required|max:255',

            'nom'  => 'required|max:255',
            'prenom'  => 'required|max:255',
            'sexe'  => 'required|max:255',
            'telephone'  => 'required|max:255',
            'email'  => 'required|max:255',
            'role'  => 'required|max:255',
            'structure_id' => 'required|max:255',
            'service_id' => 'required|max:255',
        ]);
    

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'role' => $request->role,
            
            'adresse' => $request->adresse,
            'filiere' => $request->filiere,
            'ecole' => $request->ecole,
            'niveau' => $request->niveau,

        ]);

        $stagiaire = Stagiaire::create([

            'adresse' => $request->adresse,

        ]);
    
        return redirect('stagiaire');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $observation = Observation::findOrFail($id);

        return view("add_observation", compact('observations'));
    }

    public function show1(string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);

        return view("stagiaire-profile", compact('stagiaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
