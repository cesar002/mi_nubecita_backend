<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(){
        return [];
    }


    public function tokenConfirmacionAsociado(){
        return $this->hasOne('App\TokenConfirmacionCuentaAsociadoUsuarios', 'id_usuario');
    }

    public function limiteAlmacenaje(){
        return $this->hasOne('App\LimiteUsuariosAlmacenaje', 'id_usuario');
    }

    public function nubeUsuario(){
        return $this->hasOne('App\NubesUsuarios', 'id_usuario');
    }

    public function archivosFavoritos(){
        return $this->hasMany('App\ArchivosFavoritos', 'id_usuario');
    }

    public function tokensRecuperacionPassword(){
        return $this->hasMany('App\TokenRecuperacionPassword', 'id_usuario');
    }

}
