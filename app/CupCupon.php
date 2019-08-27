<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupCupon extends Model
{
    use  Cachable;
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
        return $this->hasMany(CupImagenCupon::class,'cup_id','cup_id');
    }

    public function cupsegmentocupon(){
        return $this->hasOne(CupSegmentoCupon::class,'cup_id','cup_id');
    }

    public static function cup($cupones){
       
        foreach($cupones as $cupon){
            if($cupon->cup_estado==1){
                return $cupon;
            }
        }
        
    }
}

