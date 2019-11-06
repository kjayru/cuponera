<?php
	include_once 'modelos/loginModelos.php';

	/*** Hola sesión ***/
	session_start();

	/*** El usuario ya se encuentra logueado ***/
	if(isset( $_SESSION['ml_id'] )) {
		$message = 'El usuario ya se encuentra logueado.';
	}

	/*** Usuario y contraseña ha sido enviado ***/
	if(!isset( $_POST['ml_username'], $_POST['ml_password'])) {
		$message = 'Por favor, ingresar un usuario y/o contraseña correctos.';
	}

	/*** check the username is the correct length ***/
	elseif (strlen( $_POST['ml_username']) > 20 || strlen($_POST['ml_username']) < 4) {
		$message = 'Nombre de usuario incorrecto.';
	}

	/*** check the password is the correct length ***/
	elseif (strlen( $_POST['ml_password']) > 20 || strlen($_POST['ml_password']) < 4) {
		$message = 'Contraseña incorrecta.';
	}

	/*** check the username has only alpha numeric characters ***/
	elseif (ctype_alnum($_POST['ml_username']) != true) {
		/*** if there is no match ***/
		$message = "Username must be alpha numeric";
	}

	/*** check the password has only alpha numeric characters ***/
	elseif (ctype_alnum($_POST['ml_password']) != true) {
		/*** if there is no match ***/
		$message = "Password must be alpha numeric";
	}

	else {
		/*** if we are here the data is valid and we can insert it into database ***/
		$ml_username = filter_var($_POST['ml_username'], FILTER_SANITIZE_STRING);
		$ml_password = filter_var($_POST['ml_password'], FILTER_SANITIZE_STRING);

		/*** now we can encrypt the password ***/
		$ml_password = sha1( $ml_password );

	try {
		$myconnection = getConnect($ml_username, $ml_password);

		/*** if we have no result then fail boat ***/
		if(empty($myconnection)) {
			$message = 'Ha ocurrido un error, verifica tu usuario y contraseña.';
		}

		/*** if we do have a result, all is well ***/
		else {
			/*** set the session ml_id variable ***/
			$ml_id = $myconnection[0][0];
			$mr_id = $myconnection[0][4];

			$_SESSION['ml_id'] = $ml_id;
			$_SESSION['role'] = $mr_id;

			/*** EUREKA ***/
			//$message = 'You are now logged in';
			header("Location: inicio/index.php");
		}
	}

	catch(Exception $e) {
		/*** if we are here, something has gone wrong with the database ***/
		$message = 'Lo sentimos, en este momento no podemos procesar tu operación. Por favor, intenta más tarde."';
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<title>Iniciar sesión | Admin Tienda Postpago</title>
	<meta name="robots" content="noindex">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<!-- Queridos CSS -->
	<link rel="stylesheet" href="css/estilos-admin.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- Hermosos JS -->
	<script src="js/jquery-2.1.4.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!--script src="../js/modernizr.js"></script-->
</head>

<body class="mylogin">

	<div class="box-logo">
		<img src="img/cd-logo.svg" alt="">
	</div>
	
	<div class="login-box">

		<div class="login-box-in">
			<h3>Lo sentimos</h3>

			<div class="login-row txt-center mtop-30">
				<p style="line-height:140%;color:#777777;font-size:19px;"><?php echo $message; ?></p>
			</div>

			<div class="login-row txt-center mtop-30">
				<a href="index.php">&laquo; Volver a intentar</a>
			</div>
		</div>

	</div>

	<div class="login-row txt-center">
		<a href="mailto:janet.bravo@claro.com.pe?cc=maximo.moreno@claro.com.pe&subject=Problemas%20inicio%20sesion%20AdminCEQ" style="color:#7a8ca5;font-size:13px;">¿Necesitas ayuda?</a>
	</div>

</body>
</html>
