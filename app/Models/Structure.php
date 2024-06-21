<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $guarded = [];
    protected $table = 'structures';

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'structure_service', 'structure_id', 'service_id');
    }
}
