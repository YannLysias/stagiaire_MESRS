<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    protected $guarded = [];
    protected $table = 'stagiaires';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stages()
    { 
        return $this->belongsToMany(Stage::class, 'stage_stagiaire', 'stagiaire_id', 'stage_id');
    }

   

    
}
