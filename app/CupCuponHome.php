<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupCuponHome extends Model
{
    use  Cachable;
    protected $table = "cup_cupones_home";

    public function cupcupon(){
        return $this->belongsTo(CupCupon::class,'cup_id','cup_id');
    }
}
