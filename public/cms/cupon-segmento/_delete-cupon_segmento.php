<?php
	include_once '../modelos/cupon_segmentoModelos.php';
	
	$sc_id = $_GET['sc_id'];
	$seg_id = $_GET['seg_id'];
	
	deleteCuponSegmento($sc_id);
	
	header('Location: segmento-agregar.php?seg_id='.$seg_id);
?>