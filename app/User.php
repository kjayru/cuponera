<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class User extends Authenticatable
{
    use Notifiable, Cachable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_ndoc', 'seg_nombre','email','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cupsegmento(){
        return $this->belongsTo(CupSegmento::class,'seg_nombre','seg_nombre');
    }

    public function cupusuario(){
        return $this->hasOne(CupUsuario::class,'user_ndoc','user_ndoc');
    }
}
