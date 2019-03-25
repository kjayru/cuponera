<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupSegmentoCupon extends Model
{
    protected $table = "cup_segmento_cupon";

    public function cupsegmento()
    {
        return $this->belongsTo(CupSegmento::class,'seg_id','seg_id');
    }

    public function cupcupon(){
        return $this->belongsTo(CupCupon::class,'cup_id','cup_id');
    }
}
