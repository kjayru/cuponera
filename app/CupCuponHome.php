<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupCuponHome extends Model
{
    protected $table = "cup_cupones_home";

    public function cupcupon(){
        return $this->belongsTo(CupCupon::class,'cup_id','cup_id');
    }
}
