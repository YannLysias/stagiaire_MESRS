<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];
    protected $table = 'services';

 
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function structures()
    { 
        return $this->belongsToMany(Structure::class, 'structure_service', 'service_id', 'structure_id');
    }
}
