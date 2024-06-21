<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $guarded = [];
    protected $table = 'dossiers';

    public function stages()
    {
        return $this->belongsTo(Stage::class);
    }
}
