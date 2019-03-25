<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupSegmento extends Model
{
    protected $table = "cup_segmentos";

    public function cupsegmentocupones(){
        return $this->hasMany(CupSegmento::class,'cup_id','cup_id');
    }

    public function cupusuario(){
        return $this->hasOne(CupUsuario::class,'seg_nombre','seg_nombre');
    }

    
}
