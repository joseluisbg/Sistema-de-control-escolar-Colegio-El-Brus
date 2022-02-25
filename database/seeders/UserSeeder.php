<?php

namespace Database\Seeders;

use App\Models\Ce_area;
use App\Models\Ce_level;
use App\Models\Ce_period;
use App\Models\Ce_permissions;
use App\Models\Ce_student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'name'  => 'Uriel',
        'last_name' => 'Fernando',
        'curp' => 'asdasdasdasdas',
        'status' => 'Activo',
        'user_modification' => '2',
        'email'     => 'director@gmail.com',
        'password'  => bcrypt('123456')
    ])->assignRole('Super-administrador');

        User::create([
        'name'  => 'José Luis',
        'last_name' => 'Fernando',
        'curp' => 'asdasdasdasdas',
        'status' => 'Activo',
        'user_modification' => '2',
        'email'     => 'controlescolar@gmail.com',
        'password'  => bcrypt('123456')
    ])->assignRole('Control-escolar');

        User::create([
        'name'  => 'Maribel',
        'last_name' => 'Fernando',
        'curp' => 'asdasdasdasdas',
        'status' => 'Activo',
        'user_modification' => '2',
        'email'     => 'docente@gmail.com',
        'password'  => bcrypt('123456')
    ])->assignRole('Docente');

        User::create([
        'name'  => 'Lupe',
        'last_name' => 'Fernando',
        'curp' => 'asdasdasdasdas',
        'status' => 'Suspendido',
        'user_modification' => '2',
        'email'     => 'alumno@gmail.com',
        'password'  => bcrypt('123456')
    ])->assignRole('Alumno');

        Ce_area::create([
        'name'  => 'Preescolar',
        'status' => 'Activo',
        'user_modification' => '1',
    ]);

        Ce_area::create([
        'name'  => 'Primaria',
        'status' => 'Activo',
        'user_modification' => '1',
    ]);

        Ce_area::create([
        'name'  => 'Secundaria',
        'status' => 'Activo',
        'user_modification' => '1',
    ]);

        Ce_period::create([
        'name'  => 'Periodo 1',
        'status' => 'Activo',
        'user_modification' => '1',
    ]);

        Ce_period::create([
        'name'  => 'Periodo 2',
        'status' => 'Activo',
        'user_modification' => '1',
    ]);

        Ce_period::create([
        'name'  => 'Periodo 3',
        'status' => 'Activo',
        'user_modification' => '1',
    ]);

        Ce_permissions::create([
        'name'  => 'Periodo 1',
        'status' => 'Activo',
        'user_modification' => '1',
    ]);

        Ce_permissions::create([
        'name'  => 'Periodo 2',
        'status' => 'Activo',
        'user_modification' => '1',
    ]);

        Ce_permissions::create([
        'name'  => 'Periodo 3',
        'status' => 'Activo',
        'user_modification' => '1',
    ]);

    }
}
