<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce_group extends Model
{
    use HasFactory;

    protected $table = 'ce_group';

    protected $primaryKey = 'id_group';
}
