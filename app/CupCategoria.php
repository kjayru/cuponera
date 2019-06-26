<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupCategoria extends Model
{
    use  Cachable;
    protected $table = 'cup_categorias';

    public function cupcupones()
    {
        return $this->hasMany(CupCupon::class,'cat_id','cat_id');
    }
}
