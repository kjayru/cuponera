<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupDepartamentoCupon extends Model
{
    protected $table = "cup_departamento_cupon";

    public function cupcupon(){
        return $this->belongsTo(CupCupon::class,'cup_id','cup_id');
    }

    public function cupdepartamento()
    {
        return $this->belongsTo(CupDepartamento::class,'dep_id','dep_id');
    }
}
