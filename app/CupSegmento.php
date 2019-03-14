<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupSegmento extends Model
{
    protected $table = "cup_segmentos";

    public function cupsegmentocupones(){
        return $this->hasMany(CupSegmento::class);
    }

    
}
