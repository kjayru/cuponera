<?php

class cache 
{
var $cache_dir; // path ó ruta donde se almacena la cache
var $cache_time; // tiempo en que expira la cache (en segundos)
var $caching = false; //true, para cachear
var $cleaning = false; //true, para limpiar y actualizar
var $file = ''; // path o ruta del script a cachear
var $pos='';
var $cache_inc='';



function iniciar($path='',$time,$action=NULL){

global $_SERVER;


$this->cache_dir = $path;
$this->cache_time = $time;
$this->cleaning = $action;
/*
$pos = strpos(file_get_contents('cache.inc'), md5(urlencode($_SERVER['REQUEST_URI'])));
$this->file = $this->cache_dir.md5(urlencode($_SERVER['REQUEST_URI'])); //md5, encriptado por seguridad

//condicional: Existencia del archivo, fecha expiración, acción
*/
if($pos === false){

		if (file_exists($this->file) && $this->cleaning == false ) {
		readfile($this->file);
		exit();
		} else {
		$this->caching = true;
		//grabamos buffer
		ob_start();
		}

}


}

function cerrar(){
if ($this->caching){
//Recuperamos información del buffer
$data = ob_get_clean();
// mostramos información
echo $data;
//borramos cache si existe
if(file_exists($this->file)){
unlink($this->file);
}


//escribimos información en cache
$fp = fopen( $this->file , 'w' );
fwrite ( $fp , $data );
fclose ( $fp );
}


//escribimos información en cache.inc
$fca = fopen( 'cache.inc' , 'a' );
fwrite ( $fca , md5(urlencode($_SERVER['REQUEST_URI'])).PHP_EOL);
fclose ( $fca);
}
}

} // Fin clase Cache
?>


