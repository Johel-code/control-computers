<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function perifericos()
    {
        return $this->hasMany(Periferico::class);
    }
}
