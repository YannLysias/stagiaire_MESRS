<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Stagiaire;
use App\Models\Structure;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        
        $totalStructures = Structure::count();
        $totalStagiaires = Stagiaire::count();
        $today = Carbon::today();
        
        $stagiairesEnCours = Stage::whereDate('date_debut', '<=', $today)
                                    ->whereDate('date_fin', '>=', $today)
                                    ->count();

                                    $totalPersonnelsAdmin = User::whereIn('role', ['ChefService', 'Secrétaire', 'Directeur'])->count();
                                    $structures = Structure::with('services')->get();
        
        return view('dashboard', compact('totalStructures', 'totalStagiaires', 'stagiairesEnCours', 'totalPersonnelsAdmin', 'structures'));
    }

    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users_profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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