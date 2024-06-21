<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Structure;
use App\Models\User;
use App\Notifications\NewCollaborateur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     

     public function activate($id)
    {
        dd('tyghjh');
        $personnel = User::findOrFail($id);
        $personnel->statut = true;
        $personnel->save();

        return response()->json(['success' => 'Personnel activé']);
    }

    public function deactivate($id)
    {
        $personnel = user::findOrFail($id);
        $personnel->status = false;
        $personnel->save();

        return response()->json(['success' => 'Personnel désactivé']);
    }

    public function index()
    {

        $user = Auth::user();

        // Query de base pour exclure les stagiaires
        $query = User::with('structure')->where('role', '!=', 'stagiaire');

        // Exclure l'utilisateur connecté
        $query->where('id', '!=', $user->id);

        if ($user->role === 'Directeur') {
            $query->where('role', '!=', 'Directeur')
                  ->where('role', '!=', 'Administrateur');
        }

        $personnels = $query->get();

        return view('personnels', compact('personnels'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $structures = Structure::all();
        $services = Service::all();

        return view('add_personnel', [
            'structures' => $structures,
            'services' => $services,
        ]);
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([

            'nom'  => 'required|max:255',
            'prenom'  => 'required|max:255',
            'sexe'  => 'required|max:255',
            'telephone'  => 'required|max:255',
            'email'  => 'required|max:255',
            'role'  => 'required|max:255',
            'structure_id' => 'required|max:255',
            'service_id' => 'required|max:255',
        ]);
        
        
        $structure = Structure::findOrFail(intval($request->structure_id));
        $service = Service::findOrFail(intval($request->service_id));

        $generated_password = Str::random(10);

        $personnel = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'role' => $request->role,
            'structure_id' => $structure->id,
            'service_id' => $service->id,
        ]);
        
        $personnel->password = $generated_password;

        $personnel->save();
        
        Notification::send($personnel, new NewCollaborateur([
            'email' => $personnel->email,
            'password' => $generated_password,
        ]));

        
    
        return redirect('personnels');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personnel = User::findOrFail($id);

        return view("personnel-profile", compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', (int) $id)->first();
        $structures = Structure::all();
        $services = Service::all();

        return view('edit_personnel', compact('user','structures','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            
            'nom'  => 'required|max:255',
            'prenom'  => 'required|max:255',
            'sexe'  => 'required|max:255',
            'telephone'  => 'required|max:255',
            'email'  => 'required|max:255',
            'role'  => 'required|max:255',
            'structure_id' => 'required|max:255',
            'service_id' => 'required|max:255',
           
        ]);
        $user = User::where('id', (int) $id)->first();

        $structure = Structure::findOrFail(intval($request->structure_id));
        $service = Service::findOrFail(intval($request->service_id));

        $user ->nom = $request->nom;
        $user ->prenom = $request->prenom;
        $user ->sexe = $request->sexe;
        $user ->telephone = $request->telephone;
        $user ->email = $request->email;
        $user ->role = $request->role;
        $user ->structure_id = $structure->structure_id;
        $user ->service_id = $service->service_id;

        $user -> save();

        return redirect()->route('personnels.index')->with('success', 'Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
