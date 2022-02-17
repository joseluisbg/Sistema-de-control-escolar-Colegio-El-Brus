<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Models\Ce_area;
use App\Models\Ce_course;
use App\Models\Ce_cycle;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = Ce_course::where('status', 'Activo')->count();
        $suspendidos = Ce_course::where('status', 'Suspendido')->count();
        $cycles = Ce_cycle::where('status', 'Activo')->get();
        $areas = Ce_area::where('status', 'Activo')->get();
        return view('system/admin/course/index', compact(['activos', 'suspendidos', 'cycles', 'areas']));
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
         if ($request) {
            $user = auth()->user()->id;
            $course = new Ce_course();
            $course->name = $request->input('name');
            $course->nickname = $request->input('nickname');
            $course->rep_sep = $request->input('rep_sep');
            $course->nick_sep = $request->input('nick_sep');
            $course->cycle = $request->input('cycle');
            $course->id_area = $request->input('id_area');
            $course->user_modification = $user;
            $course->status = 'Activo';
            $course->save();
            return redirect()->route('admin.course.index')->with('Registrar', 'ok');
        }
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
    public function edit($course)
    {
        $course = Ce_course::findOrFail($course);
        return view('system/admin/course/edit', compact('course'));
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
        if ($request and $id) {
            $user = auth()->user()->id;
            $course = Ce_course::findOrFail($id);
            $course->name = $request->input('name');
            $course->nickname = $request->input('nickname');
            $course->rep_sep = $request->input('rep_sep');
            $course->nick_sep = $request->input('nick_sep');
            $course->cycle = $request->input('cycle');
            $course->user_modification = $user;
            $course->save();
            return redirect()->route('admin.course.index')->with('Actualizar', 'ok');
        }
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

    public function statusA(Request $request, $id)
    {
        $student = Ce_course::where('id_course', $id)->firstOrFail();
            $student->status = "Suspendido";
            $student->update();
            return redirect()->route('admin.course.index')->with('Suspendido', 'ok');
    }

    public function statusS(Request $request, $id)
    {
        $student = Ce_course::where('id_course', $id)->firstOrFail();
            $student->status = "Activo";
            $student->update();
            return redirect()->route('admin.course.index')->with('Activo', 'ok');
    }
}
