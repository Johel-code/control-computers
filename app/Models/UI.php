<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UI extends Model
{
    use HasFactory;

    public function funcions()
    {
        return $this->belongsToMany(Funcion::class);
    }
}
