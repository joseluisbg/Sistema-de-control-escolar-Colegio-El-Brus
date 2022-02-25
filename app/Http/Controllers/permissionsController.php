<?php

namespace App\Http\Controllers;

use App\Models\Ce_permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class permissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = DB::table('ce_permissions')->get();
        return view('system/admin/permissions/index', compact(['periodos']));
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
        //
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

    public function statusA(Request $request, $id)
    {
        $student = Ce_permissions::where('id_permission', '=', $id)->firstOrFail();
            $student->status = "Suspendido";
            $student->update();
            return redirect()->route('admin.permissions.index')->with('Suspendido', 'ok');
    }

    public function statusS(Request $request, $id)
    {
        $student = Ce_permissions::where('id_permission', '=',$id)->firstOrFail();
            $student->status = "Activo";
            $student->update();
            return redirect()->route('admin.permissions.index')->with('Activo', 'ok');
    }
}
