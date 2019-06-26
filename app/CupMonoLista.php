<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class CupMonoLista extends Model
{
    use  Cachable;
    protected $table = "cup_monos_lista";
}
