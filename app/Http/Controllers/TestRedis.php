<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Computer;
use App\Models\Computer as ModelsComputer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TestRedis extends Controller
{
    public function index()
    {
        $query = Cache::remember('computer', 60, function () {
            return ModelsComputer::all();
        });

        foreach($query as $value){
            echo "<li>{$value->name}</li>";
        }
    }

    public function getComputer()
    {
        $query = ModelsComputer::all();

        foreach($query as $value){
            echo "<li>{$value->name}</li>";
        }
    }
}