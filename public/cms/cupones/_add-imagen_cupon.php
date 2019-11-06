<?php
	include_once '../modelos/cuponesModelos.php';

	$ic_id = $_POST['ic_id'];
	$cup_id = $_POST['cup_id'];
	$ic_img = $_POST['ic_img'];

	addImagenCupon($ic_id, $cup_id, $ic_img);
	header('Location: cupones-galeria.php?cup_id='.$cup_id);
	
?>
