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
      
        return view('exports.boletaExcel', ['info' => Ce_grades::join('ce_student as S', 'ce_grades.id_student', '=', 'S.id_student')
        ->join('ce_user_enrolment as UR','S.id_student','=','UR.id_user')
        ->join('ce_level_groups as LG','UR.id_lg','=','LG.id_lg')
        ->join('ce_group as G','LG.id_group','=','G.id_group')
        ->join('ce_level as L','LG.id_level','=','L.id_level')
        ->join('ce_area as A','L.id_area','=','A.id_area')
        ->join('ce_rubro_course AS RC','ce_grades.id_rc','=','RC.id_rc')
        ->join('ce_average AS PR','RC.id_course','=','PR.id_course')
        ->select('S.name AS Nombre','S.matricula AS Matricula','A.name AS Area','G.name AS Grupo','L.name AS Grado','L.cycle AS Ciclo',
        'RC.rubro AS Rubro','RC.id_course AS rcurso')
        ->where("ce_grades.id_student",'=',$id_student)->get()]);
    }
}
