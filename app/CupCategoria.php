<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupCategoria extends Model
{
    protected $table = 'cup_categorias';

    public function cupcupones()
    {
        return $this->hasMany(CupCupon::class,'cat_id','cat_id');
    }
}
