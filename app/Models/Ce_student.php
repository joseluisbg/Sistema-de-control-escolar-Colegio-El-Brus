<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Ce_student extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'ce_student';

    protected $primaryKey = 'id_student';

    protected $fillable = [
         'matricula',
            'name',
            'date_ofbirth',
            'curp',
            'street',
            'suburb',
            'city',
            'state',
            'cp',
            'user_modification',
            'status',
            'id_area',
    ];
}