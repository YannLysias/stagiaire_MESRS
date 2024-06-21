<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\Service;
use App\Models\Stage;
use App\Models\Stagiaire;
use App\Models\Structure;
use App\Models\User;
use App\Notifications\NewCode;
use Carbon\Carbon;
use App\Notifications\StageRejection;
use App\Notifications\StageValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $stages = Stage::orderBy('created_at', 'desc')->get();

        return view('stage', compact('stages'));
    }



    public function reject(Request $request, $id)
    {
        $stage = Stage::findOrFail($id);

        $stage->etat = 'Rejeté';
        
        $stage->remarque = $request->remarque;

        $stage->save();

        $stagiaires = $stage->stagiaires; // Obtenez tous les stagiaires associés au stage

        foreach ($stagiaires as $stagiaire) {
            // Envoyer la notification de rejet à chaque stagiaire
            Notification::send($stagiaire->user, new StageRejection($request->remarque, $stage->id));
    }

    // Retournez une réponse JSON ou redirigez l'utilisateur si nécessaire
    return redirect()->back()->with('success', 'Rejet effectué avec succès.');
}
    public function validate(Request $request)
    {
        $stage = Stage::findOrFail($request->id);

        $stage->etat = 'Validé';

    if ($request->has('date_debut')) {
        $stage->date_debut = Carbon::createFromFormat('Y-m-d', $request->date_debut);
        $stage->date_fin = $stage->date_debut->copy()->addMonths($stage->mois)->subDay();

        // Vérifier si la date actuelle est entre date_debut et date_fin
        if (Carbon::now()->between($stage->date_debut, $stage->date_fin)) {
            $stage->statut = true;
        } else {
            $stage->statut = false;
        }

        $stagiaires = $stage->stagiaires; // Obtenez tous les stagiaires associés au stage

        foreach ($stagiaires as $stagiaire) {
            $user = $stagiaire->user;
            $structure = Structure::findOrFail($request->structure_id);
            $service = Service::findOrFail($request->service_id);
            $user->structure_id = $structure->id;
            $user->service_id = $service->id;

            $generated_password = Str::random(10);
            $user->password = $generated_password;

            $user->save();
            
            // Envoyer la notification de validation
            $user->notify(new StageValidation($user, $stage, $generated_password, $service, $structure));
        }

        $stage->save();

        return redirect()->back()->with('success', 'Le stage a été validé avec succès.');
    }

    return redirect()->back()->with('error', 'La date de début du stage est manquante.');
    }

    public function traite(Request $request){

        $stage = Stage::findOrFail($request->id);

        $stage->etat = 'Traité';
        $stage->save();

        return redirect()->back()->with('success', 'La demande du stagiaire a été traité avec succès.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faire_demande');
    }

    /**

     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([

            'type'  => 'required|max:255',
            'mois'  => 'required|max:255',
            // 'statut'  => 'required|max:255',
            'recommandation'  => 'required|file|max:2048',
            
            'cv'  => 'required|file|max:2048',
            'lettre'  => 'required|file|max:2048',
            
            'nom'  => 'required|max:255',
            'prenom'  => 'required|max:255',
            'sexe'  => 'required|max:255',
            'telephone'  => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            
            'adresse'  => 'required|max:255',
            'ecole'     => 'required|max:255',
            'filiere'   => 'required|max:255', 
            'niveau'   => 'required|max:255',

            'code_binome' => 'required|string',
            'code' => 'nullable|string',
            'code_binome_input' => 'nullable|string',
        ]);



        if($request->input('code') == 'oui') {
            $codeBinome = $request->input('code_binome_input');
            $binomeExist = Stage::where('code', $codeBinome)->exists();

            if(!$binomeExist) {
                return redirect()->back()->with('error', 'Le code de binôme n\'existe pas dans la base de données.');
            }
        }

        $path_cv = Storage::putFile('public/cvs', $request->cv);
        $path_cv_convert_to_table = explode('/', $path_cv);
        if($request->has('cv'))
        {
            $path_cv = Storage::putFile('public/cvs', $request->cv);
            $path_cv_convert_to_table = explode('/', $path_cv);
        }

        $path_lettre = Storage::putFile('public/lettres', $request->lettre);
        $path_lettre_convert_to_table = explode('/', $path_lettre);
        if($request->has('lettre'))
        {
            $path_lettre = Storage::putFile('public/lettres', $request->lettre);
            $path_lettre_convert_to_table = explode('/', $path_lettre);
        }

        $path_recommandation = Storage::putFile('public/recommandations', $request->recommandation);
        $path_cv_convert_to_table = explode('/', $path_recommandation);
        if($request->has('recommandation'))
        {
            $path_recommandation = Storage::putFile('public/recommandations', $request->cv);
            $path_recommandation_convert_to_table = explode('/', $path_recommandation);
        }
      
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'role' => 'Stagiaire',
            'statut' => false,
        ]);
        $stagiaire = Stagiaire::create([
            'id' => $request->id,
            'adresse' => $request->adresse,
            'filiere' => $request->filiere,
            'ecole' => $request->ecole,
            'niveau' => $request->niveau,
            'user_id' => $user->id,
        ]);

        if ($request->input('code_binome') == 'non') {
    
            $stage = Stage::create([
                'type' => $request->type,
                'recommandation' => $request->has('recommandation') ? $path_recommandation_convert_to_table[2] : null,
                'mois' => $request->mois,
                'etat' => 'En attente',
                'statut' => false,
                'code' => null,
            ]);
    
            $dossier = Dossier::create([
                'cv' => $request->has('cv') ? $path_cv_convert_to_table[2] : null,
                'lettre' => $request->has('lettre') ? $path_lettre_convert_to_table[2] : null,
                'stage_id' => $stage->id,
            ]);
    
            $stage->stagiaires()->attach($stagiaire->id);
    
            return redirect('/')->with('success', 'Votre demande a été soumise avec succès.');
            
        } else {
            if ($request->input('code') == 'non') {
                $codeAleatoire = mt_rand(1000000000, 9999999999);
    
                $stage = Stage::create([
                    'type' => $request->type,
                    'recommandation' => $request->has('recommandation') ? $path_recommandation_convert_to_table[2] : null,
                    'mois' => $request->mois,
                    'etat' => 'En attente',
                    'statut' => false,
                    'code' => $codeAleatoire,
                ]);
    
                $dossier = Dossier::create([
                    'cv' => $request->has('cv') ? $path_cv_convert_to_table[2] : null,
                    'lettre' => $request->has('lettre') ? $path_lettre_convert_to_table[2] : null,
                    'stage_id' => $stage->id,
                ]);
    
                $stage->stagiaires()->attach($stagiaire->id);
    
                Notification::send($stage, new NewCode([
                    'code' => $codeAleatoire,
                ]));
    
                return redirect('/')->with('success', 'Votre demande a été soumise avec succès.');
            } else {
                $codeBinome = $request->input('code_binome_input');
                $stage = Stage::where('code', $codeBinome)->first();
    
                if ($stage) {
                    // Vérification du nombre de stagiaires déjà associés au stage
                    if ($stage->stagiaires()->count() >= 2) {
                        return redirect()->back()->with('error', 'Ce code a déjà un binôme.');
                    }
        
                    $dossier = Dossier::create([
                        'cv' => $request->has('cv') ? $path_cv_convert_to_table[2] : null,
                        'lettre' => $request->has('lettre') ? $path_lettre_convert_to_table[2] : null,
                        'stage_id' => $stage->id,
                    ]);
                    
                    $stage->stagiaires()->attach($stagiaire->id);
    
                    return redirect('/')->with('success', 'Votre demande a été soumise avec succès.');
                } else {
                    return redirect()->back()->with('error', 'Le code de binôme n\'existe pas dans la base de données.');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stage = Stage::findOrFail($id);
        $structures = Structure::all();
        $services = Service::all();

        // Vous pouvez récupérer les stagiaires associés au stage
        // et accéder à leurs utilisateurs associés
        $stagiaires = $stage->stagiaires;
        $dossiers = $stage->dossiers;
      

        // Passez les détails des stagiaires à la vue
        return view("users-profile", compact('stagiaires', 'dossiers', 'stage','services','structures'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stage = Stage::where('id', (int) $id)->first();
        $dossier = Dossier::where('id', (int) $id)->first();
        $stagiaire = Stagiaire::where('id', (int) $id)->first();
        $user = User::where('id', (int) $id)->first();

        return view('edit_stage', compact('stage','dossier','stagiaire','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type'  => 'required|max:255',
            'mois'  => 'required|max:255',
            // 'statut'  => 'required|max:255',
            'recommandation'  => 'required|file|max:2048',
            
            'cv'  => 'required|file|max:2048',
            'lettre'  => 'required|file|max:2048',
            
            'nom'  => 'required|max:255',
            'prenom'  => 'required|max:255',
            'sexe'  => 'required|max:255',
            'telephone'  => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            
            'adresse'  => 'required|max:255',
            'ecole'     => 'required|max:255',
            'filiere'   => 'required|max:255', 
            'niveau'   => 'required|max:255',
           
        ]);

        $stages = Stage::where('id', (int) $id)->first();
        $dossiers = Dossier::where('id', (int) $id)->first();
        $stagiaires = Stagiaire::where('id', (int) $id)->first();
        $users = User::where('id', (int) $id)->first();

        $users ->nom = $request->nom;
        $users ->prenom = $request->prenom;
        $users ->sexe = $request->sexe;
        $users ->telephone = $request->telephone;
        $users ->email = $request->email;
        $users ->role = $request->role;

        $stages ->mois = $request->mois;
        $stages ->type = $request->type;
        $stages ->etat = $request->etat;
        $stages ->recommantation = $request->recommantation;

        $dossiers ->cv = $request->cv;
        $dossiers ->lettre = $request->lettre;

        $stagiaires ->adresse = $request->adresse;
        $stagiaires ->filiere = $request->filiere;
        $stagiaires ->niveau = $request->niveau;
        $stagiaires ->ecole = $request->ecole;

        $stages -> save();
        $stagiaires -> save();
        $users -> save();
        $dossiers -> save();

        return redirect()->route('stage.index')->with('success', 'Modifier avec success');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
        
}
