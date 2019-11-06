<?php
	include_once '../modelos/segmentosModelos.php';
	
	$seg_id = $_GET['seg_id'];
	
	deleteSegmento($seg_id);
	
	header('Location: segmentos-list.php');
?>