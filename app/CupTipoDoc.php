<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupTipoDoc extends Model
{
    use  Cachable;
    protected $table = "cup_tipo_doc";
}
