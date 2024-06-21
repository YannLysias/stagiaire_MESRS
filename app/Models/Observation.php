<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $guarded = [];
    protected $table = 'observations';

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
