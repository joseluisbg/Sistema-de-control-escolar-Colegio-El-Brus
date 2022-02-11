<?php

namespace App\Http\Controllers;

use App\Models\Ce_course;
use App\Models\Ce_group;
use App\Models\Ce_student;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class PagesController extends Controller
{
    use HasRoles;

    public function index()
    {
        $alumnos = Ce_student::where('status', 'Activo')->count();
        $docentes = User::role('Docente')->where('status', 'Activo')->count();
        $grupos = Ce_group::where('status', 'Activo')->count();
        $materias = Ce_course::where('status', 'Activo')->count();
        return view('system/desk', compact(['alumnos', 'docentes', 'grupos', 'materias']));
    }
}
