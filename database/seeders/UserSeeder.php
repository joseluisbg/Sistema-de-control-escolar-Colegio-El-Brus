<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ce_student;
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
    ])->assignRole('Administrador');

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

        Ce_student::create([
        'matricula' => Str::random(1),
        'date_ofbirth' => Str::random(1),
    ]);Ce_student::create([
        'matricula' => Str::random(1),
        'date_ofbirth' => Str::random(1),
    ]);Ce_student::create([
        'matricula' => Str::random(1),
        'date_ofbirth' => Str::random(1),
    ]);Ce_student::create([
        'matricula' => Str::random(1),
        'date_ofbirth' => Str::random(1),
    ]);Ce_student::create([
        'matricula' => Str::random(1),
        'date_ofbirth' => Str::random(1),
    ]);
    }
}
