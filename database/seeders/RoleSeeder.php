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
        $administrador = Role::create(['name' => 'Super-administrador']);
        $controlescolar = Role::create(['name' => 'Control-escolar']);
        $docente = Role::create(['name' => 'Docente']);
        $alumno = Role::create(['name' => 'Alumno']);
        //Seccion para crear permisos
        Permission::create(['name' => 'Super-administrador'])->assignRole($administrador);
        Permission::create(['name' => 'Control-escolar'])->assignRole($controlescolar);
        Permission::create(['name' => 'Docente'])->assignRole($docente);
        Permission::create(['name' => 'Alumno'])->assignRole($alumno);
    }
}
