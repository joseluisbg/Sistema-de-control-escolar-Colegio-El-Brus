<?php

namespace App\Exports;

use App\Models\Ce_grades;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class BoletasExport implements FromView
{
    protected $id_student;

    function __construct(int $id_student)
    {
        $this->id_student = $id_student;
    }
    public function view(): View
    {
        $id_student = $this->id_student;

        return view(
            'exports.boletaExcel',
            ['infoA' => Ce_grades::join('ce_student as S', 'ce_grades.id_student', '=', 'S.id_student')
                ->join('ce_user_enrolment as UR', 'S.id_student', '=', 'UR.id_user')
                ->join('ce_level_groups as LG', 'UR.id_lg', '=', 'LG.id_lg')
                ->join('ce_group as G', 'LG.id_group', '=', 'G.id_group')
                ->join('ce_level as L', 'LG.id_level', '=', 'L.id_level')
                ->join('ce_area as A', 'L.id_area', '=', 'A.id_area')
                ->join('ce_rubro_course AS RC', 'ce_grades.id_rc', '=', 'RC.id_rc')
                ->join('ce_course AS C', 'RC.id_course', '=', 'C.id_course')
                ->select('S.name AS Nombre', 'S.matricula AS Matricula', 'A.name AS Area', 'G.name AS Grupo', 'L.name AS Grado', 'L.cycle AS Ciclo','RC.rubro as Rubro')
                ->distinct()
                ->where("ce_grades.id_student", '=', $id_student)->get()],
            // ['infoR' => Ce_grades::join('ce_student as S', 'ce_grades.id_student', '=', 'S.id_student')
            //     ->join('ce_user_enrolment as UR', 'S.id_student', '=', 'UR.id_user')
            //     ->join('ce_level_groups as LG', 'UR.id_lg', '=', 'LG.id_lg')
            //     ->join('ce_lg_ct as LGCT', 'LG.id_lg', '=', 'LGCT.id_lg')
            //     ->join('ce_course_teacher as CT', 'LGCT.id_ct', '=', 'CT.id_ct')
            //     ->join('ce_course AS C', 'CT.id_course', '=', 'C.id_course')
            //     ->join('ce_rubro_course AS RC', 'CT.id_course', '=', 'RC.id_course')
            //     ->select('C.name as Curso', 'RC.rubro as Rubro')->distinct()
            //     ->where("ce_grades.id_student", '=', $id_student)->get()],
            ['infoC' => Ce_grades::join('ce_student as S', 'ce_grades.id_student', '=', 'S.id_student')
                ->join('ce_user_enrolment as UR', 'S.id_student', '=', 'UR.id_user')
                ->join('ce_level_groups as LG', 'UR.id_lg', '=', 'LG.id_lg')
                ->join('ce_lg_ct as LGCT', 'LG.id_lg', '=', 'LGCT.id_lg')
                ->join('ce_course_teacher as CT', 'LGCT.id_ct', '=', 'CT.id_ct')
                ->join('ce_course AS C', 'CT.id_course', '=', 'C.id_course')
                ->select('C.name as Curso')->distinct()
                ->where("ce_grades.id_student", '=', $id_student)->get()]
        );
    }
}
