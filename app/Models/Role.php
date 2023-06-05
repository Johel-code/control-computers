<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function funcions()
    {
        return $this->belongsToMany(Funcion::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
