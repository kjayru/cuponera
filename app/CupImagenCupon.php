<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupImagenCupon extends Model
{
    use  Cachable;
    protected $table = "cup_imagenes_cupon";
    
    public function cupcupon(){
        return $this->belongsTo(CupCupon::class);
    }
}
