<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public function routeNotificationFor()
    {
         // Récupérer le stagiaire associé à ce stage
        $stagiaire = $this->stagiaires()->first();
        
        // Vérifier si le stagiaire existe et s'il a un utilisateur associé
        if ($stagiaire && $stagiaire->user) {
            // Retourner l'adresse e-mail de l'utilisateur associé au stagiaire
            return $stagiaire->user->email;
        }

        // Retourner une adresse e-mail par défaut si aucun utilisateur associé n'est trouvé
        return 'lysiayannloemba06@gmail.com';
    }

    protected $guarded = [];
    protected $table = 'stages';

    public function documents()
    {
        return $this->HasMany(Document::class);
    }

    public function dossiers()
    {
        return $this->HasMany(Dossier::class);
    }

    public function stagiaires()
    {
        return $this->belongsToMany(Stagiaire::class, 'stage_stagiaire', 'stage_id', 'stagiaire_id');
    }

    public function observation()
    {
        return $this->hasOne(Observation::class);
    }
}
