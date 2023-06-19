<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $state1 = State::create(['name' => 'Prestada']);
        $state2 = State::create(['name' => 'Libre']);
        $state3 = State::create(['name' => 'En mantenimiento']);
        $state4 = State::create(['name' => 'Desechada']);
    }
}
