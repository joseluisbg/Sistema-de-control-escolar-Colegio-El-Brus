<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce_cycle extends Model
{
    use HasFactory;

    protected $table = 'ce_cycle';

    protected $primaryKey = 'id_cycle';
}
