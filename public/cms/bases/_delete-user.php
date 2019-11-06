<?php
	include_once '../modelos/baseModelos.php';
	
$dep_id = $_GET['id'];
	
	deleteUser($dep_id);
	
	header('Location: ok-delete.php');
?>