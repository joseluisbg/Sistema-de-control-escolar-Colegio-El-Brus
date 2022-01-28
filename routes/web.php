<?php
use App\Http\Controllers\Admin\Director\DirectorController;
use App\Http\Controllers\Admin\SchoolControl\SchoolControlController;
use App\Http\Controllers\Admin\Teacher\TeacherController;
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
Route::middleware(['auth:sanctum', 'verified', 'auth'])->get('escritorio', function () {
    return view('dashboard');
})->name('escritorio');

//Ruta para la vista del escritorio general
Route::get('sistema/usuario/escritorio', function() {
    return view('system/desk');
});

//Crud para los directores
Route::resource('sistema/control/director', DirectorController::class)->names('admin.director')->middleware('auth');
//Carga masiva
Route::post('import-list-excel',[DirectorController::class,'importExcel'])->name('users.import.excel')->middleware('auth');

//Crud para control escolar
Route::resource('sistema/control/control-escolar', SchoolControlController::class)->names('admin.school.control')->middleware('auth');
//Carga masiva
Route::post('import-ce-excel',[SchoolControlController::class,'importceExcel'])->name('ce.import.excel')->middleware('auth');

//Crud para los docentes
Route::resource('sistema/control/docente', TeacherController::class)->names('admin.teacher')->middleware('auth');
//Carga masiva
Route::post('import-teacher-excel',[TeacherController::class,'importTeacherExcel'])->name('teacher.import.excel')->middleware('auth');