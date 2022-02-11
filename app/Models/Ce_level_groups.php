<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce_level_groups extends Model
{
    use HasFactory;

    protected $table = 'Ce_level_groups';

    protected $primaryKey = 'id_level';
}
