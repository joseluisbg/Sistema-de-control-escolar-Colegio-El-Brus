<?php

namespace App\Exports;

use App\Models\Ce_grades;
use App\Models\Ce_student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class BoletasExport implements FromView, WithDrawings, WithEvents
{
    protected $id_student;

    function __construct(int $id_student)
    {
        $this->id_student = $id_student;
    }
    public function view(): View
    {
        $id_student = $this->id_student;

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
        return view(
            $boleta,
            [
                'infoA' => Ce_grades::join('ce_student as S', 'ce_grades.id_student', '=', 'S.id_student')
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
                    ->get(),
            ],
            [
                'infoC' => Ce_grades::join('ce_student as S', 'ce_grades.id_student', '=', 'S.id_student')
                    ->join('ce_user_enrolment as UR', 'S.id_student', '=', 'UR.id_user')
                    ->join('ce_level_groups as LG', 'UR.id_lg', '=', 'LG.id_lg')
                    ->join('ce_lg_ct as LGCT', 'LG.id_lg', '=', 'LGCT.id_lg')
                    ->join('ce_course_teacher as CT', 'LGCT.id_ct', '=', 'CT.id_ct')
                    ->join('ce_course AS C', 'CT.id_course', '=', 'C.id_course')
                    ->select('C.name as Curso')
                    ->distinct()
                    ->where('ce_grades.id_student', '=', $id_student)
                    ->get(),
            ]
        );
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        //$drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/logo-elbrus.png'));
        $drawing->setHeight(80);
        $drawing->setOffsetX(30);
        $drawing->setCoordinates('A1');

        return $drawing;
    }
    public function registerEvents(): array
    {
        // Borde grueso
        $borderMedium = [
            'borders' => [
                'outline' => [
                    'borderStyle' => 'medium',
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        // Borde simple
        $borderThin = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        // Fuente Negrita Tamaño 12 (titulos)
        $fontNegrita = [
            'font' => [
                'bold' => true,
                'size' => 12
            ]
        ];

        // Alinear al centro
        $colCenter = [
            'alignment' => [
                'horizontal' => 'center'
            ]
        ];

        $rowCenter = [
            'alignment' => [
                'vertical' => 'center'
            ]
        ];

        return [
            AfterSheet::class => function (AfterSheet $event) use ($borderMedium, $fontNegrita, $borderThin, $colCenter, $rowCenter) {
                // Logo y Nombre
                $event->sheet->getStyle('A1:I4')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('A1:I4')->ApplyFromArray($colCenter);
                $event->sheet->getStyle('A1:I4')->ApplyFromArray($rowCenter);
                $event->sheet->getStyle('A1:I4')->ApplyFromArray($fontNegrita);
                //seccion de datos del alumno
                //$event->sheet->getStyle('K1:AB4')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('K1:AB4')->ApplyFromArray($colCenter);
                $event->sheet->getStyle('K1:AB4')->ApplyFromArray($rowCenter);
                $event->sheet->getStyle('K1:M2')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('K1:M2')->ApplyFromArray($fontNegrita);
                $event->sheet->getStyle('N1:U1')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('N1:U1')->ApplyFromArray($fontNegrita);
                $event->sheet->getStyle('N2:U2')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('V1:X1')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('V1:X1')->ApplyFromArray($fontNegrita);
                $event->sheet->getStyle('V2:X2')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('Y1:AA1')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('Y1:AA1')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('Y1:AA1')->ApplyFromArray($fontNegrita);
                $event->sheet->getStyle('Y2:AA2')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('AB1')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('AB1')->ApplyFromArray($fontNegrita);
                $event->sheet->getStyle('AB2')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('K3:O3')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('K3:O3')->ApplyFromArray($fontNegrita);
                $event->sheet->getStyle('K4:O4')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('P3:S3')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('P3:S3')->ApplyFromArray($fontNegrita);
                $event->sheet->getStyle('P4:S4')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('T3:V3')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('T3:V3')->ApplyFromArray($fontNegrita);
                $event->sheet->getStyle('T4:V4')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('W3:Y3')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('W3:Y3')->ApplyFromArray($fontNegrita);
                $event->sheet->getStyle('W4:Y4')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('Z3:AB3')->ApplyFromArray($borderMedium);
                $event->sheet->getStyle('Z3:AB3')->ApplyFromArray($fontNegrita);
                $event->sheet->getStyle('Z4:AB4')->ApplyFromArray($borderMedium);

                //Periodos materias
                // $event->sheet->getStyle('A5:V6')->ApplyFromArray($colCenter);
                // $event->sheet->getStyle('A5:V6')->ApplyFromArray($rowCenter);
                // $titulos=array('A5','B5:D5','E5:G5','H5:J5','K5:K6','M5:T5','U5:V6');
                // foreach($titulos as $t){
                //     $event->sheet->getStyle($t)->ApplyFromArray($fontNegrita);
                //     $event->sheet->getStyle($t)->ApplyFromArray($borderThin);
                // }

                // $rubros=array('a','b','c','d','e','f','g','h','i','j');
                // foreach($rubros as $r){
                //     $event->sheet->getStyle($r)->ApplyFromArray($borderThin);
                // }
                //$event->sheet->getStyle('A1:J3')->ApplyFromArray($fontNegrita);

                // Encabezado
                //$event->sheet->getStyle('A2:J3')->ApplyFromArray($borderThin);

                // Tamaño de celda de las filas intermedias
                // $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(25);
                // $event->sheet->getDelegate()->getRowDimension('2')->setRowHeight(5);
                // $event->sheet->getDelegate()->getRowDimension('4')->setRowHeight(1);
                // $event->sheet->getDelegate()->getRowDimension('6')->setRowHeight(5);


            }
        ];
    }
}
