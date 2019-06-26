<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupDepartamento extends Model
{
    use  Cachable;
    protected $table = "cup_departamentos";

    public function cupcupones()
    {
        return $this->hasMany(CupCupon::class,'dep_id','dep_id');
    }

    public function cupdepartamentocupones(){
        return $this->hasMany(CupDepartamentoCupon::class);
    }

    
}
