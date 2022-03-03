<?php

namespace App\Http\Controllers\Admin\Assignment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ce_level_groups;
use App\Models\Ce_level;
use App\Models\Ce_group;
use App\Models\Ce_student;
use App\Models\Ce_user_enrolment;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preescolar = Ce_level_groups::join('ce_level as L', 'ce_level_groups.id_level', '=', 'L.id_level')
            ->join('ce_group as G', 'ce_level_groups.id_group', '=', 'G.id_group')
            ->select('ce_level_groups.id_lg AS idlg','L.name AS nomL','G.name AS nomG','L.id_area AS area')
            ->where('L.id_area', '=', 1)->get();
        $primaria = Ce_level_groups::join('ce_level as L', 'ce_level_groups.id_level', '=', 'L.id_level')
            ->join('ce_group as G', 'ce_level_groups.id_group', '=', 'G.id_group')
            ->select('ce_level_groups.id_lg AS idlg','L.name AS nomL','G.name AS nomG','L.id_area AS area')
            ->where('L.id_area', '=', 2)->get();
        $secundaria = Ce_level_groups::join('ce_level as L', 'ce_level_groups.id_level', '=', 'L.id_level')
            ->join('ce_group as G', 'ce_level_groups.id_group', '=', 'G.id_group')
            ->select('ce_level_groups.id_lg AS idlg','L.name AS nomL','G.name AS nomG','L.id_area AS area')
            ->where('L.id_area', '=', 3)->get();
        return view('system/admin/assignment/student-group/index', compact(['preescolar', 'primaria', 'secundaria']));
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
            $dato2=$request->input('check_lista');
            foreach($dato2 as $dato){
                $lg = new Ce_user_enrolment();
                $lg -> id_lg= $request->input('id_lg');
                $lg -> id_user= $dato;
                $lg->save();
            };
            return redirect()->route('admin.assignment.student.group.index')->with('Registrar', 'ok');
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
    public function edit($lg)
    {
        $infolg=Ce_level_groups::join('ce_level as L', 'ce_level_groups.id_level', '=', 'L.id_level')
        ->join('ce_group as G', 'ce_level_groups.id_group', '=', 'G.id_group')
        ->select('ce_level_groups.id_lg AS idlg','L.name AS nomL','G.name AS nomG','L.id_area AS area','ce_level_groups.id_level AS idlevel','ce_level_groups.id_group AS idgroup')
        ->where('ce_level_groups.id_lg', '=', $lg)->get();
        $area = Ce_level_groups::join('ce_level as L', 'ce_level_groups.id_level', '=', 'L.id_level')
        ->join('ce_group as G', 'ce_level_groups.id_group', '=', 'G.id_group')
        ->where('ce_level_groups.id_lg', '=', $lg)->get('L.id_area');
        $area=$area[0]["id_area"];
        $students = Ce_student::join('ce_user_enrolment as UE', 'ce_student.id_student', '<>', 'UE.id_user')->where('id_area', $area)->where('status','Activo')->get();
        //$students = Ce_student::where('id_area', $area)->where('status','Activo')->get();

        $alumasign=Ce_user_enrolment::join('ce_student as S', 'ce_user_enrolment.id_user', '=', 'S.id_student')
        ->join('ce_level_groups as LG', 'ce_user_enrolment.id_lg', '=', 'LG.id_lg')
        ->select('S.name AS nombre')
        ->where('LG.id_lg', $lg)->get();
        return view('system/admin/assignment/student-group/create',compact('students','infolg','alumasign'));
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