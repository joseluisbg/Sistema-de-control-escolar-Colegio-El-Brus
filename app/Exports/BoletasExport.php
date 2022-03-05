<?php

namespace App\Exports;

use App\Models\Ce_grades;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

//class BoletasExport implements FromView,WithDrawings
class BoletasExport implements FromView
{
    public function view(): View
    {
        return view('exports.boletaExcel', [
            'calificaciones' => Ce_grades::all()
        ]);
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/logo-elbrus.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('A1');

        return $drawing;
    }
}
