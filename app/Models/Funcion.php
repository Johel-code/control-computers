<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    use HasFactory;

    public function uis()
    {
        return $this->belongsToMany(UI::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
