<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Iniciar sesión | Cuponera Virtual</title>

	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

	<link rel="stylesheet" href="css/estilos-admin.css">
</head>

<body class="mylogin">

	<div class="container">
		<div class="info">
			<h3>Iniciar sesión</h3>
			<h1>Cuponera Virtual</h1>
			<span>Made with <i class="fa fa-heart"></i> by Estrategia e Innovación</span>
		</div>
	</div>

	<div class="form">
		<div class="thumbnail">
			<img src="img/login/unicorn.svg"/>
		</div>

		<form action="_go-login.php" method="POST">
			<input type="text" name="ml_username" placeholder="Usuario" class="login-input" required="" />
			<input type="password" name="ml_password" placeholder="Contraseña" class="login-input" required="" />
			<input type="submit" value="Ingresar" class="login-btn">
		</form>
	</div>

	<div id="bg-image">
		<img src="img/login/bg-paris-panoramica.jpg" alt="">
	</div>

<!--video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
  <source src="http://static.claro.com.pe/img/videos/small.mp4" type="video/mp4"/>
</video-->


</body>
</html>
