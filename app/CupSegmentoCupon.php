<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupSegmentoCupon extends Model
{
    protected $table = "cup_segemento_cupon";

    public function cupsegmento()
    {
        return $this->belongsTo(CupSegmento::class);
    }

    public function cupcupon(){
        return $this->belongsTo(CupCupon::class);
    }
}
