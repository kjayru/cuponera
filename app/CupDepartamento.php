<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupDepartamento extends Model
{
    protected $table = "cup_departamentos";

    public function cupcupones()
    {
        return $this->hasMany(CupCupon::class);
    }

    public function cupdepartamentocupones(){
        return $this->hasMany(CupDepartamentoCupon::class);
    }

    
}
