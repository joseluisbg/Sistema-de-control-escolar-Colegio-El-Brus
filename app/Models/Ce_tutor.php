<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce_tutor extends Model
{
    use HasFactory;

    protected $table = 'ce_tutor';

    protected $primaryKey = 'id_tutor';

    protected $fillable = [
        'name',
        'tel_1',
        'tel_2',
        'email',
        'rfc',
        'curp_student',
        'principal',
        'status',
        'user_modification',
        ];
}
