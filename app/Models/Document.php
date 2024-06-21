<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'documents';

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

}
