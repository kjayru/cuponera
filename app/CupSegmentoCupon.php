<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupSegmentoCupon extends Model
{
    use  Cachable;
    protected $table = "cup_segmento_cupon";

    protected $fillable = [
        'sc_id','cup_id','seg_id','sc_orden'
    ];

    public function cupsegmento()
    {
        return $this->belongsTo(CupSegmento::class,'seg_id','seg_id');
    }

    public function cupcupon(){
        return $this->belongsTo(CupCupon::class,'cup_id','cup_id');
    }
}
