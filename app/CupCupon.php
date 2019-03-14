<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupCupon extends Model
{
    protected $table = 'cup_cupones';

    public function cupempresa(){
        return $this->belongsTo(CupEmpresa::class);
    }

    public function cupcategoria(){
        return $this->belongsTo(CupCategoria::class);
    }
    public function cupdepartamento(){
        return $this->belongsTo(CupDepartamento::class);
    }

    public function cupcuponhomes(){
        return $this->hasMany(CupCuponHome::class);
    }

    public function cupdepartamentocupones(){
        return $this->hasMany(CupDepartamentoCupon::class,'cup_id','cup_id');
    }

    public function cupimagencupones(){
        return $this->hasMany(CupImagenCupon::class);
    }

    public function cupsegmentocupones(){
        return $this->hasMany(CupSegmentoCupon::class);
    }
}
