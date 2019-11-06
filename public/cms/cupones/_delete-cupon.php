<?php

	include_once '../modelos/cuponesModelos.php';
	
	$cup_id = $_GET['cup_id'];

	deleteCupon($cup_id);
	header('Location: cupones-list.php');

?>