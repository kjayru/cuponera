<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupEmpresa extends Model
{
    use  Cachable;
    protected $table = "cup_empresas";

    public function cupcupons(){
        return $this->hasMany(CupCupon::class,'emp_id','emp_id')->where('cup_cupones.cup_estado', '1');
    }

    public static function categoria($cat_id){
        $categoria = CupCategoria::where('cat_id',$cat_id)->first();

        return $categoria;
    }
}
