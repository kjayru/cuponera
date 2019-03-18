<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupCategoria extends Model
{
    protected $table = 'Cup_Categorias';

    public function cupcupones()
    {
        return $this->hasMany(CupCupon::class,'cat_id','cat_id');
    }
}
