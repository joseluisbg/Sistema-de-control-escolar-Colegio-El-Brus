<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce_user_enrolment extends Model
{
    use HasFactory;

    protected $table = 'ce_user_enrolment';

    protected $primaryKey = 'id_ue';

    protected $fillable = [
         'id_user',
            'id_lg',
    ];
}
