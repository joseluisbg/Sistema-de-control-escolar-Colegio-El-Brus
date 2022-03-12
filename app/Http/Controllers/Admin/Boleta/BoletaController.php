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
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Ce_grades;
use App\Models\Ce_student;

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
        return Excel::download(new BoletasExport($id_student), 'Boleta.xlsx');
    }
    public function exportarBoletaPDF($id_student)
    {
        $infoA = Ce_grades::join('ce_student as S', 'ce_grades.id_student', '=', 'S.id_student')
            ->join('ce_user_enrolment as UR', 'S.id_student', '=', 'UR.id_user')
            ->join('ce_level_groups as LG', 'UR.id_lg', '=', 'LG.id_lg')
            ->join('ce_group as G', 'LG.id_group', '=', 'G.id_group')
            ->join('ce_level as L', 'LG.id_level', '=', 'L.id_level')
            ->join('ce_area as A', 'L.id_area', '=', 'A.id_area')
            ->join('ce_rubro_course AS RC', 'ce_grades.id_rc', '=', 'RC.id_rc')
            ->join('ce_course AS C', 'RC.id_course', '=', 'C.id_course')
            ->select('S.name AS Nombre', 'S.matricula AS Matricula', 'A.name AS Area', 'G.name AS Grupo', 'L.name AS Grado', 'L.cycle AS Ciclo', 'RC.rubro as Rubro', 'ce_grades.id_student as idEst')
            ->distinct()
            ->where('ce_grades.id_student', '=', $id_student)
            ->get();
        $infoC = Ce_grades::join('ce_student as S', 'ce_grades.id_student', '=', 'S.id_student')
            ->join('ce_user_enrolment as UR', 'S.id_student', '=', 'UR.id_user')
            ->join('ce_level_groups as LG', 'UR.id_lg', '=', 'LG.id_lg')
            ->join('ce_lg_ct as LGCT', 'LG.id_lg', '=', 'LGCT.id_lg')
            ->join('ce_course_teacher as CT', 'LGCT.id_ct', '=', 'CT.id_ct')
            ->join('ce_course AS C', 'CT.id_course', '=', 'C.id_course')
            ->select('C.name as Curso')
            ->distinct()
            ->where('ce_grades.id_student', '=', $id_student)
            ->get();
        $area = Ce_student::join('ce_user_enrolment as UR', 'ce_student.id_student', '=', 'UR.id_user')
            ->join('ce_level_groups as LG', 'UR.id_lg', '=', 'LG.id_lg')
            ->join('ce_level as L', 'LG.id_level', '=', 'L.id_level')
            ->select('L.id_area as area')
            ->where('ce_student.id_student', '=', $id_student)
            ->get();
        switch ($area[0]->area) {
            case 1:
                $boleta = 'exports.boletaPreeExcel';
                break;
            case 2:
                $boleta = 'exports.boletaExcel';
                break;
            case 3:
                $boleta = 'exports.boletaSecExcel';
                break;
        }
        $imagen="Si";
        $pdf = PDF::loadView($boleta, ['infoA'=>$infoA,'infoC'=> $infoC,'imagen'=>$imagen])->setPaper('a3', 'landscape');
        return $pdf->download('Boleta.pdf');
    }
}
