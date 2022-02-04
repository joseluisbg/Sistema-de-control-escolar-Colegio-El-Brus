<?php

namespace App\Imports;

use App\Models\Ce_tutor;
use Maatwebsite\Excel\Concerns\ToModel;

class TutorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = auth()->user()->id;

        $tutor1 = new Ce_tutor([
            'name' => $row[13],
            'tel_1' => $row[14],
            'tel_2' => $row[15],
            'email' => $row[16],
            'rfc' => $row[21],
            'curp_student'=> $row[7],
            'principal' => '1',
            'user_modification' => $user,
            'status' => 'Activo',
        ]);
        $tutor1->save();

        $tutor2 = new Ce_tutor([
            'name' => $row[17],
            'tel_1' => $row[18],
            'tel_2' => $row[19],
            'email' => $row[20],
            'curp_student'=> $row[7],
            'principal' => '0',
            'user_modification' => $user,
            'status' => 'Activo',
        ]);
        $tutor2->save();
        $tutor=array($tutor1, $tutor2);
        return $tutor;
    }
}
