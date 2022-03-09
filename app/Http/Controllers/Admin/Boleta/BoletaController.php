<?php

namespace App\Http\Controllers\Admin\Boleta;

use App\Http\Controllers\Controller;
use App\Models\Ce_lg_ct;
use App\Models\Ce_user_enrolment;
use App\Models\Ce_teacher_tutor;
use App\Models\Ce_level;
use App\Models\Ce_level_group;
use Illuminate\Http\Request;
use App\Exports\BoletasExport;
use Maatwebsite\Excel\Facades\Excel;

class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $grupos = Ce_teacher_tutor::join('Ce_level_groups as LG', 'ce_teacher_tutor.id_lgct', '=', 'LG.id_lg')
            ->join('ce_group as G', 'LG.id_group', '=', 'G.id_group')
            ->join('ce_level as LV', 'LG.id_level', '=', 'LV.id_level')
            ->select('id_tt as idTT', 'id_user as id_user', 'G.name as nameGroup', 'LV.name as nameLevel', 'id_area as idArea', 'LG.id_lg as idLg')
            ->where('id_user', '=', $user)
            ->get();

        return view('System/admin/boleta/index', compact(['grupos']));
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
    public function edit($idLg)
    {
        $students = Ce_user_enrolment::join('ce_student as S', 'ce_user_enrolment.id_user', '=', 'S.id_student')
            ->join('ce_level_groups as LG', 'ce_user_enrolment.id_lg', '=', 'LG.id_lg')
            ->select('S.name AS nombre', 'S.id_student as idEstudent')
            ->where('LG.id_lg', $idLg)
            ->get();

        $levelinfo = Ce_level::join('ce_level_groups as LG', 'ce_level.id_level', '=', 'LG.id_level')
            ->join('ce_lg_ct as LGCT', 'LG.id_lg', '=', 'LGCT.id_lg')
            ->join('ce_group as G', 'LG.id_group', '=', 'G.id_group')
            ->select('ce_level.name AS nameL', 'G.name AS nameG')
            ->where('LGCT.id_lgct', '=', $idLg)
            ->first();

        return view('System/admin/boleta/create', compact(['students', 'levelinfo']));
    }

    /**
     *
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

    public function exportarBoleta($id_student)
    {
        // return $id_student;
        // return Excel::download(new BoletasExport(), 'boleta.xlsx');
        //return (new InvoicesExport(2018))->download('invoices.xlsx');
        return Excel::download(new BoletasExport($id_student), 'boleta.xlsx');
    }
}
