<?php
use App\Http\Controllers\Admin\Director\DirectorController;
use App\Http\Controllers\Admin\SchoolControl\SchoolControlController;
use App\Http\Controllers\Admin\Student\StudentController;
use App\Http\Controllers\Admin\Teacher\TeacherController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Ruta raiz del proyecto
Route::get('/', function () {
    return view('auth/login');
})->middleware('guest');

//Desactivado la ruta de registro usuarios por defecto en config/fortify.php

//Ruta para el panel principal todos los usuarios autenticados
Route::middleware(['auth:sanctum', 'verified', 'auth'])->get('escritorio', [PagesController::class, 'index'])->name('escritorio');

//Crud para los directores
Route::resource('sistema/control/director', DirectorController::class)->names('admin.director')->middleware('auth');
//Activar director
Route::put('sistema/control/director/status/suspendido/{id}',[DirectorController::class,'statusA'])->name('director.status.suspendido')->middleware('auth');
//Suspender director
Route::put('sistema/control/director/status/activo/{id}',[DirectorController::class,'statusS'])->name('director.status.activo')->middleware('auth');
//Carga masiva
Route::post('import-list-excel',[DirectorController::class,'importExcel'])->name('users.import.excel')->middleware('auth');

//Crud para control escolar
Route::resource('sistema/control/control-escolar', SchoolControlController::class)->names('admin.school.control')->middleware('auth');
//Activar control escolar
Route::put('sistema/control/control-escolar/status/suspendido/{id}',[SchoolControlController::class,'statusA'])->name('admin.school.status.suspendido')->middleware('auth');
//Suspender control escolar
Route::put('sistema/control/control-escolar/status/activo/{id}',[SchoolControlController::class,'statusS'])->name('admin.school.status.activo')->middleware('auth');
//Carga masiva
Route::post('import-ce-excel',[SchoolControlController::class,'importceExcel'])->name('ce.import.excel')->middleware('auth');

//Crud para los docentes
Route::resource('sistema/control/docente', TeacherController::class)->names('admin.teacher')->middleware('auth');
//Activar control escolar
Route::put('sistema/control/docente/status/suspendido/{id}',[TeacherController::class,'statusA'])->name('admin.teacher.status.suspendido')->middleware('auth');
//Suspender control escolar
Route::put('sistema/control/docente/status/activo/{id}',[TeacherController::class,'statusS'])->name('admin.teacher.status.activo')->middleware('auth');
//Carga masiva
Route::post('import-teacher-excel',[TeacherController::class,'importTeacherExcel'])->name('teacher.import.excel')->middleware('auth');

//Crud para los alumnos
Route::resource('sistema/control/alumnos', StudentController::class)->names('admin.student')->middleware('auth');
//Activar al alumno
Route::put('sistema/control/alumnos/status/suspendido/{id_student}',[StudentController::class,'statusA'])->name('student.status.suspendido')->middleware('auth');
//Suspender al alumno
Route::put('sistema/control/alumnos/status/activo/{id_student}',[StudentController::class,'statusS'])->name('student.status.activo')->middleware('auth');
//Carga masiva
Route::post('student-teacher-excel',[StudentController::class,'importStudentExcel'])->name('student.import.excel')->middleware('auth');