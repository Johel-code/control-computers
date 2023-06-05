<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    
    public function typeOperation()
    {
        return $this->belongsTo(TypeOperation::class);
    }
    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
