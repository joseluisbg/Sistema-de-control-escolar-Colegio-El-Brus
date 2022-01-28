<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'curp',
        'status',
        'user_modification',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //Obtener el rol del usuario, mostrando debajo del nombre.
    public function adminlte_desc(){
        if ($role = auth()->user()->can('Administrador')) {
            return $role = "Administrador";
        }elseif ($role = auth()->user()->can('Controlescolar')){
            return $role = "Control Escolar";
        }elseif ($role = auth()->user()->can('Docente')){
            return $role = "Docente";
        }elseif ($role = auth()->user()->can('Alumno')){
            return $role = "Alumno";
        }
    }

    public function adminlte_profile_url(){
        return "user/profile";
    }
}
