<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupUsuario extends Model
{

    protected $table = "cup_usuarios";

    protected $fillable = [
        'user_tipo_cliente','user_tdoc','user_ndoc','seg_nombre','user_nombres','user_apellidos','user_email','user_estado','user_auto'
    ];

    public function cupsegmento(){
        return $this->belongsTo(CupSegmento::class,'seg_nombre','seg_nombre');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_ndoc','user_ndoc');
    }
}
