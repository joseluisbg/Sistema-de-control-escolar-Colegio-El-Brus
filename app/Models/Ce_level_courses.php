<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce_level_courses extends Model
{
    use HasFactory;

    protected $table = 'Ce_level_courses';

    protected $primaryKey = 'id_lc';
}
