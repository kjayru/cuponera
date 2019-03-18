<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupUsuario extends Model
{

    protected $table = "cup_usuarios";

    protected $fillable = [
        'user_tipo_cliente','user_tdoc','user_ndoc','seg_nombre','user_nombres','user_apellidos','user_email','user_estado','user_auto'
    ];
}
