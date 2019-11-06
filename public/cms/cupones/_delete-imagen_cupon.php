<?php
	include_once '../modelos/cuponesModelos.php';
	
	$ic_id = $_GET['ic_id'];
	$cup_id = $_GET['cup_id'];

	deleteImagenCupon($ic_id);
	header('Location: cupones-galeria.php?cup_id='.$cup_id.'&message=true');

?>