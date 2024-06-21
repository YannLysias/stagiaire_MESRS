<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'ChefService') {
            $documents = Document::all();
        } else{
            $stage = $user->stagiaire->stages->first();
            $documents = Document::where('stage_id', $stage->id)->get();
        }
           
        
        
        return view('document', [
            'documents' =>  $documents,
        ]);
    }

    //ducizyxy@mailinator.com  KIDEGydbdd@gmail.com
    //xuoK4v8mas     Trj2xux8Ah

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_document');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([

            'titre'  => 'required|max:255',
            'fichier' => 'required|file|mimes:doc,docx,pdf|max:5120', 
            'type'  => 'required|max:255',
        ]);

        
        $user = Auth::user();

        $stage = $user->stagiaire->stages->first();

        $path_document = Storage::putFile('public/documents', $request->fichier);
        $path_document_convert_to_table = explode('/', $path_document);
        if($request->has('fichier'))
        {
            $path_document = Storage::putFile('public/documents', $request->fichier);
            $path_document_convert_to_table = explode('/', $path_document);
        }

        $document = Document::create([
            'titre' => $request->titre,
            'fichier' => $request->has('fichier') ? $path_document_convert_to_table[2] : null,
            'type'   => $request->type,
            'stage_id' => $stage->id,
        ]);
    
        return redirect()->route('document.index')->with('success', 'Document ajouté avec succès');
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
        $document = Document::where('id', (int) $id)->first();

        return view('edit_document', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre'  => 'required|max:255',
            'fichier'  => 'required|file|max:2048',
            'type'  => 'required|max:255',
           
        ]);
        $path_document = Storage::putFile('public/documents', $request->fichier);
        $path_document_convert_to_table = explode('/', $path_document);
        if($request->has('fichier'))
        {
            $path_document = Storage::putFile('public/documents', $request->fichier);
            $path_document_convert_to_table = explode('/', $path_document);
        }

        $documents = Document::where('id', (int) $id)->first();

        $documents ->titre = $request->titre;
        $documents ->fichier = $request->has('fichier') ? $path_document_convert_to_table[2] : null;
        $documents ->type = $request->type;

        $documents -> save();

        return redirect()->route('document.index')->with('success', 'Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
