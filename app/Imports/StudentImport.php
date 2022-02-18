<?php

namespace App\Imports;

use App\Models\Ce_student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = auth()->user()->id;
        //$input = $row[6];
        //$date = strtotime($input);
        $fecha=($row[6]- 25568)*86400;
        $fecha=date('d/m/Y', $fecha);
        $estudiante = new Ce_student([
            'matricula' => $row[0],
            'name' => $row[1],
            'id_area'=> $row[2],
            'date_ofbirth' => $fecha,
            //'date_ofbirth' => date('d/m/Y', $date),
            'curp' => $row[7],
            'street' => $row[8],
            'suburb' => $row[9],
            'city' => $row[10],
            'state' => $row[11],
            'cp' => $row[12],
            'user_modification' => $user,
            'status' => 'Activo',
        ]);

        $estudiante->save();
        return $estudiante;
    }
}
