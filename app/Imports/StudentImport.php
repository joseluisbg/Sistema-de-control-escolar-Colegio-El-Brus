<?php

namespace App\Imports;

use App\Imports\StudentImport;
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
        return new User([
            'name' => $row[0],
            'last_name' => $row[1],
            'curp' => $row[2],
            'email' => $row[3],
            'password' => bcrypt($row[4]),
        ]);
    }
}
