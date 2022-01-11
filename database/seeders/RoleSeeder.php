<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seccion para crear roles
        $administrador = Role::create(['name' => 'Administrador']);
        $docente = Role::create(['name' => 'Docente']);
        //Seccion para crear permisos
        Permission::create(['name' => 'Eliminar'])->assignRole($administrador);
        Permission::create(['name' => 'Editar'])->assignRole($docente);
    }
}
