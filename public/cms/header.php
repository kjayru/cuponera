<?php 
	include_once 'member.php';
	$user_rol = $_SESSION['role'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" class="no-js">
<head>
	<meta name="robots" content="noindex">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="../img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

	<!-- Queridos CSS -->
	<link rel="stylesheet" href="../css/estilos-admin.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/jquery.fancybox.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/select2.min.css">
	<link rel="stylesheet" href="../css/jquery.filer.css" type="text/css"  />
	<link rel="stylesheet" href="../css/jquery.filer-dragdropbox-theme.css" type="text/css"  />
	
	<!-- Hermosos JS -->
	<script src="../js/jquery-2.1.4.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<!--script src="../js/modernizr.js"></script-->
  	
  	<?php if (empty($title)) { ?>
  	<title>CMS Cuponera Virtual</title>
  	<?php } else { ?>
  	<title><?php echo $title ?></title>
  	<?php } ?>
	
</head>
<body>
<header class="cd-main-header">
	<a href="/" class="cd-logo"><img src="../img/cd-logo.svg" alt="Logo"></a>
	<a href="#0" class="cd-nav-trigger">Menu<span></span></a>
	<nav class="cd-nav">
		<ul class="cd-top-nav">
			<!--li><a href="#0">Ayuda</a></li-->
			<!--li><a href="../luna/luna-list.php">Luna</a></li-->
			<!--li><a href="http://staging-ceq.azurewebsites.net/" target="_blank">Preview</a></li-->
			<li class="has-children account">
				<a href="#0"><img src="../img/cd-avatar.png" alt="avatar"> Mi cuenta</a>
				<ul>
					<li><a href="#0">Editar mi cuenta</a></li>
					<li><a href="../logout.php">Cerrar sesión</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="cd-label">Inicio</li>

				<li class="has-children overview">
					<a href="#">Departamentos</a>
					<ul>
						<li><a href="../departamentos/departamentos-list.php">Ver departamento</a></li>
						<li><a href="../departamentos/departamentos-new.php">Añadir departamento</a></li>
					</ul>
				</li>

				<li class="has-children overview">
					<a href="#">Categorías</a>
					<ul>
						<li><a href="../categorias/categorias-list.php">Ver categorías</a></li>
						<li><a href="../categorias/categorias-new.php">Añadir categorías</a></li>
						<li><a href="../categorias/categorias-list-order-edit.php">Ordenar categorías</a></li>
					</ul>
				</li>

				<li class="has-children overview">
					<a href="#">Segmentos</a>
					<ul>
						<li><a href="../segmentos/segmentos-list.php">Ver segmentos</a></li>
						<li><a href="../segmentos/segmentos-new.php">Añadir segmentos</a></li>
					</ul>
				</li>
			</ul>
			<ul>
				<li class="cd-label">Principal</li>

				<li class="has-children overview">
					<a href="#">Empresas</a>
					<ul>
						<li><a href="../empresas/empresas-list.php">Ver empresas</a></li>
						<li><a href="../empresas/empresas-new.php">Crear empresa</a></li>
					</ul>
				</li>

				<li class="has-children overview">
					<a href="#">Cupones</a>
					<ul>
						<li><a href="../cupones/cupones-list.php">Ver cupones</a></li>
						<li><a href="../cupones/cupones-vigencia-list.php">Ver vigencias</a></li>
						<li><a href="../cupones/cupones-preview-list.php">Ver imprimibles</a></li>
						<li><a href="../cupones/cupones-new.php">Crear cupón</a></li>
					</ul>
				</li>

				<li class="has-children overview">
					<a href="../uploads/upload-img.php">Subir imágenes</a>
				</li>

				<li class="has-children overview">
					<a href="../uploads/gallery-miniv4.php">Galería</a>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Configuración</li>

				<li class="has-children overview">
					<a href="#">Cupones a segmento</a>
					<ul>
						<li><a href="../cupon-segmento/segmento-select.php">Asignar segmento</a></li>
					</ul>
				</li>

				<li class="has-children overview">
					<a href="#">Cupones a departamento</a>
					<ul>
						<li><a href="../cupon-departamento/departamento-select.php">Asignar departamento</a></li>
					</ul>
				</li>

				<li class="has-children overview">
					<a href="#">Cupones en home</a>
					<ul>
						<li><a href="../home/home-list.php">Asignar</a></li>
						<li><a href="../home/home-order.php">Ordenar</a></li>
					</ul>
				</li>

				<li class="has-children overview">
					<a href="#">Bases</a>
					<ul>
						<li><a href="../bases/base-search.php">Buscar usuario</a></li>
						<li><a href="../bases/base-agregar.php">Añadir de usuario</a></li>
					</ul>
				</li>
			</ul>

		</nav>