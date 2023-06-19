<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol1 = Role::create(['name' => 'Administrador']);
        $rol2 = Role::create(['name' => 'Docente']);
        $rol3 = Role::create(['name' => 'Estudiante']);


        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'direccion' => 'Av. de los Palotes',
            'ci' => '2392329',
            'fecha_nacimiento' => '1992/03/30'
        ]);
        $user2 = User::create([
            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('12345678'),
            'direccion' => 'Av. de los Palotes',
            'ci' => '2393422',
            'fecha_nacimiento' => '1992/03/30'
        ]);
        $user3 = User::create([
            'name' => 'Alberto',
            'email' => 'alberto@gmail.com',
            'password' => bcrypt('12345678'),
            'direccion' => 'Av. de los Palotes',
            'ci' => '2399022',
            'fecha_nacimiento' => '1992/03/30'
        ]);

        $user1->roles()->attach(1);
        $user2->roles()->attach(2);
        $user3->roles()->attach(3);

    }
}
