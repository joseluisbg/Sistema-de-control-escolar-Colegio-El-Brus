<?php

namespace App\Http\Controllers\Admin\Assignment;

use App\Http\Controllers\Controller;
use App\Models\Ce_level_courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = DB::table('ce_course')->get();
        return view('system/admin/assignment/level-course/index', compact(['materias']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;
        $id_course = $request->input('id_course');
        $id_level = $request->input('id_level');
        $registros = Ce_level_courses::where('id_course', '=', $id_course)->where('id_level', '=', $id_level)->get();
        if ($registros->isEmpty()) {
            $level = new Ce_level_courses();
            $level->id_course = $request->input('id_course');
            $level->id_level = $request->input('id_level');
            $level->status = 'Activo';
            $level->user_modification = $user;
            $level->save();
            return redirect()->route('admin.assignment.level.course.index')->with('Asignado', 'ok');
        }else
        return redirect()->route('admin.assignment.level.course.index')->with('Existe', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
