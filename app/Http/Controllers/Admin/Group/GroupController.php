<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Models\Ce_group;
use App\Models\Ce_level_groups;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = Ce_group::where('status', 'Activo')->count();
        $suspendidos = Ce_group::where('status', 'Suspendido')->count();
        return view('system/admin/group/index', compact(['activos', 'suspendidos']));
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
            $group = new Ce_group();
            $group->name = $request->input('name');
            $group->user_modification = $user;
            $group->status = 'Activo';
            $group->save();
            $group = DB::table('ce_group')->max('id_group');
            $level_groups = new Ce_level_groups();
            $level_groups->id_level = $request->input('id_level');
            $level_groups->id_group = $group;
            $level_groups->status = 'Activo';
            $level_groups->user_modification = $user;
            $level_groups->save();
            return redirect()->route('admin.level.index')->with('grupo-registrado', 'ok');
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
    public function edit($group)
    {
        $group = Ce_group::findOrFail($group);
        return view('system/admin/group/edit', compact('group'));
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
            $group = Ce_group::findOrFail($id);
            $group->name = $request->input('name');
            $group->user_modification = $user;
            $group->save();
            return redirect()->route('admin.level.index')->with('grupo-actualizado', 'ok');
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
        $student = Ce_group::where('id_group', $id)->firstOrFail();
            $student->status = "Suspendido";
            $student->update();
            return redirect()->route('admin.level.index',)->with('grupo-suspendido', 'ok');
    }

    public function statusS(Request $request, $id)
    {
        $student = Ce_group::where('id_group', $id)->firstOrFail();
            $student->status = "Activo";
            $student->update();
            return redirect()->route('admin.level.index')->with('grupo-activo', 'ok');
    }
}
