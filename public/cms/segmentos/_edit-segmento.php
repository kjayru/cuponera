<?php
	include_once '../modelos/segmentosModelos.php';

	$seg_id = $_POST['seg_id'];
	$seg_nombre = $_POST['seg_nombre'];
	$seg_estado = $_POST['seg_estado'];

	editSegmento($seg_id, $seg_nombre, $seg_estado);
	header('Location: segmentos-list.php');
	
?>