<?php

namespace App\Http\Controllers\Admin\Assignment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ce_level_groups;
use App\Models\Ce_teacher_tutor;
use Illuminate\Support\Facades\DB;

class TutorGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('system/admin/assignment/tutor-group/index');
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
        $id_lg = $request->input('id_lg');
        $id_user = $request->input('id_user');
        $registros = Ce_teacher_tutor::where('id_lgct', '=', $id_lg)
            ->where('id_user', '=', $id_user)
            ->get();
        if ($registros->isEmpty()) {
            $teacher = new Ce_teacher_tutor();
            $teacher->id_lgct = $request->input('id_lg');
            $teacher->id_user = $request->input('id_user');
            $teacher->save();
            return redirect()
                ->route('admin.assignment.tutor.group.index')
                ->with('Asignado', 'ok');
        } else {
            return redirect()
                ->route('admin.assignment.tutor.group.index')
                ->with('Existe', 'ok');
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
