<?php

namespace App\Http\Controllers\Admin\Assignment;

use App\Http\Controllers\Controller;
use App\Models\Ce_level_courses;
use App\Models\Ce_lg_ct;
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
        // $user = auth()->user()->id;
         $id_ct = $request->input('id_ct');
         $id_lg = $request->input('id_lg');
         $registros = Ce_lg_ct::where('id_lg', '=', $id_lg)->where('id_ct', '=', $id_ct)->get();
         if ($registros->isEmpty()) {
            $lgct = new Ce_lg_ct();
            $lgct->id_ct = $request->input('id_ct');
            $lgct->id_lg = $request->input('id_lg');
            //$lgct->status = 'Activo';
            //$lgct->user_modification = $user;
            $lgct->save();
            return redirect()->route('admin.assignment.level.course.index')->with('Asignado', 'ok');
        }else
        return redirect()->route('admin.assignment.level.course.index')->with('Existe', 'ok');
        //return $request;
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
