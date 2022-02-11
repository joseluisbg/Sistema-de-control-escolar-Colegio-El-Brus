<?php

namespace App\Http\Controllers\Admin\Cycle;

use App\Http\Controllers\Controller;
use App\Models\Ce_cycle;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = Ce_cycle::where('status', 'Activo')->count();
        $suspendidos = Ce_cycle::where('status', 'Suspendido')->count();
        return view('system/admin/cycle/index', compact(['activos', 'suspendidos']));
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
            $cycle = new Ce_cycle();
            $cycle->name = $request->input('name');
            $cycle->user_modification = $user;
            $cycle->status = 'Activo';
            $cycle->save();
            return redirect()->route('admin.cycle.index')->with('Registrar', 'ok');
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
    public function edit($cycle)
    {
        $cycle = Ce_cycle::findOrFail($cycle);
        return view('system/admin/cycle/edit', compact('cycle'));
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
            $cycle = Ce_cycle::findOrFail($id);
            $cycle->name = $request->input('name');
            $cycle->user_modification = $user;
            $cycle->save();
            return redirect()->route('admin.cycle.index')->with('Actualizar', 'ok');
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
        $student = Ce_cycle::where('id_cycle', $id)->firstOrFail();
            $student->status = "Suspendido";
            $student->update();
            return redirect()->route('admin.cycle.index')->with('Suspendido', 'ok');
    }

    public function statusS(Request $request, $id)
    {
        $student = Ce_cycle::where('id_cycle', $id)->firstOrFail();
            $student->status = "Activo";
            $student->update();
            return redirect()->route('admin.cycle.index')->with('Activo', 'ok');
    }
}
