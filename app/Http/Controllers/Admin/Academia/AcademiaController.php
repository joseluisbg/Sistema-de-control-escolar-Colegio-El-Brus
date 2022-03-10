<?php

namespace App\Http\Controllers\Admin\Academia;

use App\Http\Controllers\Controller;
use App\Models\Ce_academy;
use App\Models\Ce_academy_course;
use App\Models\Ce_course;
use Illuminate\Http\Request;

class AcademiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('system/admin/academia/index');
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
            $academia = new Ce_academy();
            $academia->name = $request->input('name');
            $academia->id_area = $request->input('id_area');
            $academia->save();
        }
        return redirect()
            ->route('admin.academia.index')
            ->with('Registrar', 'ok');
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
    public function edit($id_academy)
    {
        $academia = Ce_academy::where('id_academy', '=', $id_academy)->get();
        $id_area = $academia[0]['id_area'];
        $students = Ce_course::where('id_area', '=', $id_area)
            ->select('*')
            ->get();
        return view('system/admin/academia/create', compact(['students', 'id_academy']));
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

    public function guardarAsignacion(Request $request)
    {
        //return $request;
        if ($request) {
           // return $dato2 = $request->input('id_course');
           $dato2 = $request->input('id_course');
            foreach ($dato2 as $dato) {
                $lg = new Ce_academy_course();
                $lg->id_academy = $request->input('id_academy');
                $lg->id_course = $dato;
                $lg->save();
            }

            return redirect()->route('admin.academia.index')->with('Registrard', 'ok');
        }
    }
}
