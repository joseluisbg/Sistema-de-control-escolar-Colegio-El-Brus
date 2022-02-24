<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce_grades extends Model
{
    use HasFactory;

    protected $table = 'ce_grades';

    protected $primaryKey = 'id_grade';
}
