<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupEmpresa extends Model
{
    protected $table = "cup_empresas";

    public function cupcupons(){
        return $this->hasMany(CupCupon::class,'emp_id','emp_id');
    }
}
