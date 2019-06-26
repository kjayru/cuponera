<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupEmpresa extends Model
{
    use  Cachable;
    protected $table = "cup_empresas";

    public function cupcupons(){
        return $this->hasMany(CupCupon::class,'emp_id','emp_id');
    }
}
