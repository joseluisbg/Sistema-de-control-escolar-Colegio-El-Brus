<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ce_permissions extends Model
{
    use HasFactory;

    protected $table = 'Ce_permissions';

    protected $primaryKey = 'id_permission';
}
