<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupSegmento extends Model
{
    use  Cachable;
    protected $table = "cup_segmentos";

    public function cupsegmentocupons(){
        return $this->hasMany(CupSegmentoCupon::class,'seg_id','seg_id');
    }

    public function cupusuario(){
        return $this->hasOne(CupUsuario::class,'seg_nombre','seg_nombre');
    }

    
}
