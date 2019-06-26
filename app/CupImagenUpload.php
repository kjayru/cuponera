<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupImagenUpload extends Model
{
    use  Cachable;
    protected $table = "cup_imagenes_upload";
}
