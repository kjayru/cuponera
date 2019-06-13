<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupCupon extends Model
{
    protected $table = 'cup_cupones';

    public function cupempresa(){
        return $this->belongsTo(CupEmpresa::class,'emp_id','emp_id');
    }

    public function cupcategoria(){
        return $this->belongsTo(CupCategoria::class,'cat_id','cat_id');
    }
    public function cupdepartamento(){
        return $this->belongsTo(CupDepartamento::class,'dep_id','dep_id');
    }

    public function cupcuponhome(){
        return $this->hasOne(CupCuponHome::class);
    }

    public function cupdepartamentocupones(){
        return $this->hasMany(CupDepartamentoCupon::class,'cup_id','cup_id');
    }

    public function cupimagencupones(){
        return $this->hasMany(CupImagenCupon::class);
    }

    public function cupsegmentocupon(){
        return $this->hasOne(CupSegmentoCupon::class,'cup_id','cup_id');
    }
}
