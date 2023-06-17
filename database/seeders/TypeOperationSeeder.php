<?php

namespace Database\Seeders;

use App\Models\TypeOperation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $state1 = TypeOperation::create(['name' => 'Registrar nueva computadora']);
        $state2 = TypeOperation::create(['name' => 'Asignar computadora']);
        $state3 = TypeOperation::create(['name' => 'Quitar computadora']);
    }
}
