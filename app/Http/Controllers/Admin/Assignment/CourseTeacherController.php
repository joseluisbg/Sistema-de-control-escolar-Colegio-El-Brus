<?php

namespace App\Http\Controllers\Admin\Assignment;

use App\Http\Controllers\Controller;
use App\Models\Ce_course_teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$activos = Ce_course::where('status', 'Activo')->count();
        //$suspendidos = Ce_course::where('status', 'Suspendido')->count();
        //, compact(['activos', 'suspendidos'])
        $materias = DB::table('ce_course')->get();
        //return $materias;
        return view('system/admin/assignment/course-teacher/index', compact(['materias']));

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
        $id_course = $request->input('id_course');
        $id_user = $request->input('id_user');
        $registros = Ce_course_teacher::where('id_course', '=', $id_course)->where('id_user', '=', $id_user)->get();
        if ($registros->isEmpty()) {
            $teacher = new Ce_course_teacher();
            $teacher->id_course = $request->input('id_course');
            $teacher->id_user = $request->input('id_user');
            $teacher->status = 'Activo';
            $teacher->save();
            return redirect()->route('admin.assignment.course.teacher.index')->with('Asignado', 'ok');
        }else
        return redirect()->route('admin.assignment.course.teacher.index')->with('Existe', 'ok');
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
