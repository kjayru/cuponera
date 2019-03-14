<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupCuponHome extends Model
{
    protected $table = "cup_cupones_home";

    public function cupcupones(){
        return $this->belongsTo(CupCupon::class);
    }
}
