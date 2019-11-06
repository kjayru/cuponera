<?php
	include_once '../modelos/homeModelos.php';
	
	$ch_id = $_GET['ch_id'];
	deleteCuponHome($ch_id);
	
	header('Location: home-list.php');
?>