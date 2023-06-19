<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'marca',
        'image',
        'state_id'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function perifericos()
    {
        return $this->hasMany(Periferico::class);
    }
    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
}
