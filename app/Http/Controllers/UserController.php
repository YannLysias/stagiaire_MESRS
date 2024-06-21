<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function createadminAccount(Request $request)
    {
        $admin = User::where('role', 'Administrateur')->first();

        if($admin)
        {
            return response()->json("L'administrateur avait déjà été enregistré");
        }

        $admin = User::create([
            'nom' => 'Guy',
            'prenom' => 'KPEDJO',
            'sexe' => 'Masculin',
            'telephone' => '54103099',
            'email' => 'gkpedjo@gmail.com',
            'role' => 'Administrateur',
            'password' => 'original22',
            'structure_id' => null,
            'service_id'  => null,
        ]);

        return response()->json('L"administrateur a été enregistré avec succès');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact');
    }

    public function propos()
    {
        return view('apropos');
    }
    public function bienvenue()
    {
        return view('bienvenue');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teste');
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
