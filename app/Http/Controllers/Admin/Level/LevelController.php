<?php

namespace App\Http\Controllers\Admin\Level;

use App\Http\Controllers\Controller;
use App\Models\Ce_area;
use App\Models\Ce_cycle;
use App\Models\Ce_level;
use App\Models\Ce_level_groups;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = Ce_level::where('status', 'Activo')->count();
        $suspendidos = Ce_level::where('status', 'Suspendido')->count();
        $areas = Ce_area::where('status', 'Activo')->get();
        $cycles = Ce_cycle::where('status', 'Activo')->get();
        return view('system/admin/level/index', compact(['activos', 'suspendidos', 'areas', 'cycles']));
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
            $level = new Ce_level();
            $level->name = $request->input('name');
            $level->nickname = $request->input('nickname');
            $level->cycle = $request->input('cycle');
            $level->id_area = $request->id_area;
            $level->user_modification = $user;
            $level->status = 'Activo';
            $level->save();
            return redirect()->route('admin.level.index')->with('Registrar', 'ok');
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
    public function edit($level)
    {
        $level = Ce_level::findOrFail($level);
        $consulta = $level->id_level;
        $level_groups = Ce_level_groups::where('id_level', '=', $consulta)->get();
        return view('system/admin/level/edit', compact('level', 'level_groups'));
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
            $level = Ce_level::findOrFail($id);
            $level->name = $request->input('name');
            $level->nickname = $request->input('nickname');
            $level->id_area = $request->input('id_area');
            $level->cycle = $request->input('cycle');
            $level->user_modification = $user;
            $level->save();
            return redirect()->route('admin.level.index')->with('Actualizar', 'ok');
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
        $student = Ce_level::where('id_level', $id)->firstOrFail();
            $student->status = "Suspendido";
            $student->update();
            return redirect()->route('admin.level.index')->with('Suspendido', 'ok');
    }

    public function statusS(Request $request, $id)
    {
        $student = Ce_level::where('id_level', $id)->firstOrFail();
            $student->status = "Activo";
            $student->update();
            return redirect()->route('admin.level.index')->with('Activo', 'ok');
    }
}
