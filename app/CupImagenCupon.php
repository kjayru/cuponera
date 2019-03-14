<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupImagenCupon extends Model
{
    protected $table = "cup_imagenes_cupon";
    
    public function cupcupon(){
        return $this->belongsTo(CupCupon::class);
    }
}
