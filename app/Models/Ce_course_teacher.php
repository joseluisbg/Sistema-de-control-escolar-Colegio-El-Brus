<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce_course_teacher extends Model
{
    use HasFactory;

    protected $table = 'ce_course_teacher';

    protected $primaryKey = 'id_ct';
}
