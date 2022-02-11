<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce_course extends Model
{
    use HasFactory;

    protected $table = 'ce_course';

    protected $primaryKey = 'id_course';
}
