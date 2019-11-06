<?php
	include_once 'modelos/detalleModelos.php';

	$cup_id = $_GET['cup_id'];
	$cupon = getCuponInfo($cup_id);
	$imagenes = getGalleryCupon($cup_id);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Print</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

	<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
	<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="http://cuponera.claro.com.pe/css/estilos-cuponera.css">
	<link rel="stylesheet" href="http://cuponera.claro.com.pe/css/responsive-cuponera.css">
	<link rel="stylesheet" href="http://cuponera.claro.com.pe/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://cuponera.claro.com.pe/css/dd.css">

	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="http://cuponera.claro.com.pe/js/core.js" type="text/javascript"></script>
	<style>
		
		header { display: none; }

		footer { display: none; }

		.header-superior { display: none !important; }

		.header-inferior { display: none !important; }

		.header-height { display: none !important; }

		.footer-superior { display: none !important; }

		.footer-inferior { display: none !important; }

		.box-breadcrumbs { display: none !important; }

		.owl-dots { display: none !important; }

		.bg-gris { background: white; }

		.cupon-top-img { height: 180px; margin-right: 2.5%; overflow: hidden; width: 280px; }

		.cupon-top-txt { float: left; padding: 20px 0; width: 50%; }
		.cupon-top-txt h2 { font-size: 24px; margin-bottom: 15px; }

		#more { display: none; }

		.btn-turquesa { display: none; }

		.box-cupon-content { margin-right: 5%; width: 55%; }
		.box-cupon-content .box-cupon-textos { font-size: 13px; margin: 15px 0; padding: 0; width: 100%; }
		.box-cupon-content .box-cupon-textos p { font-size: 13px; margin-bottom: 0; line-height: 150%; }
		.box-cupon-content .box-cupon-textos ul li { font-size: 13px; }
		.box-cupon-content .box-cupon-title { margin-bottom: 10px; }
		.box-cupon-content .box-cupon-title h2 { font-size: 18px; }

		.box-timer h2 { font-size: 18px; }

		.box-cupon-sidebar { width: 40%; margin: 0; }
		.box-cupon-sidebar .box-cupon-adicional { float: left; font-size: 13px; margin: 0; padding: 20px 0; width: 100%; }

		.box-cupon-top { border-bottom: 1px solid #dfdfdf; margin: 20px 0; }

		.item-img { width: 280px; }

		.box-empresa-title h2 { float: left; }
		.box-empresa-title .box-emp_descripcion { float: left; text-align: left; width: 70%; }
		.box-empresa-title .box-emp_descripcion p { text-align: left; }
		.box-empresa-title .box-cupon-logo { float: left; height: 80px !important; margin-right: 20px; width: 80px !important; }

		.box-empresa-mapa { margin: 0; width: 100%; }

		.box-timer-print { float: left !important; margin: 40px 0 0 !important; padding: 0 !important; width: 100% !important; }

		.box-empresa-descr dl { margin: 5px 0; }
		.box-empresa-descr dl dd { font-size: 13px; }
		.box-empresa-descr dl dt { font-size: 13px; }
		.box-empresa-descr dl dt p { font-size: 13px; }
		.box-empresa-descr dl dt a { font-size: 13px; }

		.box-only-print { float: left; display: inline-block; width: 100%; }

		.box-data-usuario { background: whitesmoke; border: 1px solid #dfdfdf; float: left; margin: 30px 0; padding: 20px 2.5%; width: 95%; }
		.box-data-usuario input { padding: 8px 3%; }
		.box-data-usuario .fullname { float: left; width: 95%; margin-bottom: 10px; }
		.box-data-usuario .fullname p { margin-bottom: 5px; }
		.box-data-usuario .data-usuario { float: left; width: 45%; margin-right: 5%; }
	</style>
</head>
<body>
	
</body>
</html>


<div class="content">
<div class="wrapper">

	<div class="box-breadcrumbs">
		<p><a href="http://cuponera.claro.com.pe">Inicio</a>  /  <a href="<?php echo $url_breadcrumbs; ?>"><?php echo $dep_select[0]['dep_nombre']; ?>: <?php echo $cat_select[0]['cat_nombre']; ?></a>  /  <?php echo $cupon[0]['cup_titulo']; ?>  </p>
	</div>

</div>
</div>


<div class="content bg-gris">
<div class="wrapper">


	<div class="box-cupon-top">
		
		<div class="cupon-top-img">
			<div class="owl-carousel owl-theme">
				<?php foreach ($imagenes as $imagen) { ?>
				<div class="item-img">
					<img src="<?php echo $imagen['ic_img']; ?>" alt="">
				</div>
				<?php } ?>
			</div>
		</div>

		<div class="cupon-top-txt">
			<h2><?php echo $cupon[0]['cup_titulo']; ?></h2>
			<p><?php echo $cupon[0]['cup_descripcion_corta']; ?></p>

			<div class="box-btn-detalle">
				<a href="javascript:window.print();" class="btn btn-turquesa btn-xlarge">Lo quiero</a>
			</div>
		</div>

	</div>
</div>
</div>


<div class="content bg-gris pb-30" id="widget">
<div class="wrapper">

	<div class="box-cupon-content">
		<div class="box-cupon-textos">	
			<div class="box-cupon-title">
				<h2>Ten en cuenta</h2>
			</div>

			<?php echo $cupon[0]['cup_descripcion_larga']; ?>
		</div>


		<div class="box-cupon-textos">	
			<div class="box-cupon-title">
				<h2>Las cosas claras</h2>
			</div>

			<?php echo $cupon[0]['cup_legal']; ?>
		</div>


		<!-- imprimir -->
		<div class="box-only-print">
			<div class="box-data-usuario">
				<div class="fullname">
					<p>Nombres y apellidos</p>
					<input type="text" value="">
				</div>

				<div class="data-usuario">
					<p>Teléfono</p>
					<input type="text" value="">
				</div>

				<div class="data-usuario">
					<p>Número documento</p>
					<input type="text" value="<?php echo $_SESSION['user_ndoc']; ?>">
				</div>
			</div>
		</div>
		<!-- imprimir -->
	</div>

	<div class="box-cupon-sidebar">

		<div class="box-cupon-adicional">
			
			<div class="box-empresa-title">
				<div class="box-cupon-logo">
					<img src="<?php echo $cupon[0]['emp_logo']; ?>" alt="<?php echo $cupon[0]['emp_nombre']; ?>">
				</div>

				<h2><?php echo $cupon[0]['emp_nombre']; ?></h2>

				<div class="box-emp_descripcion">
					<?php echo $cupon[0]['emp_descripcion']; ?>
				</div>
			</div>

			<div class="box-empresa-descr">

				<?php if (!empty($cupon[0]['emp_direccion'])) { ?>
				<dl>
					<dd><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i></dd>
					<dt><?php echo $cupon[0]['emp_direccion']; ?></dt>
				</dl>
				<?php } ?>

				<?php if (!empty($cupon[0]['emp_telefono'])) { ?>
				<dl>
					<dd><i class="fa fa-phone fa-lg" aria-hidden="true"></i></dd>
					<dt><?php echo $cupon[0]['emp_telefono']; ?></dt>
				</dl>
				<?php } ?>
				
				<?php if (!empty($cupon[0]['emp_email'])) { ?>
				<dl>
					<dd><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i></dd>
					<dt><a href="mailto:<?php echo $cupon[0]['emp_email']; ?>"><?php echo $cupon[0]['emp_email']; ?></a></dt>
				</dl>
				<?php } ?>
				
				<?php if (!empty($cupon[0]['emp_url'])) { ?>
				<dl>
					<dd><i class="fa fa-external-link fa-lg" aria-hidden="true"></i></dd>
					<dt><a href="<?php echo $cupon[0]['emp_url']; ?>" target="_blank"><?php echo $cupon[0]['emp_url']; ?></a></dt>
				</dl>
				<?php } ?>

				<?php if (!empty($cupon[0]['emp_url_2'])) { ?>
				<dl>
					<dd><i class="fa fa-external-link fa-lg" aria-hidden="true"></i></dd>
					<dt><a href="<?php echo $cupon[0]['emp_url_2']; ?>" target="_blank"><?php echo $cupon[0]['emp_url_2']; ?></a></dt>
				</dl>
				<?php } ?>
			</div>
		</div>

		<div class="box-empresa-mapa">
			<?php echo $cupon[0]['emp_mapa']; ?>
		</div>

		<div class="box-cupon-adicional box-timer-print">
			<div class="box-timer">
				<h2>Cupón válido</h2>

				<p>Del <?php echo $cupon[0]['cup_vigencia_inicio']; ?> al <?php echo $cupon[0]['cup_vigencia_fin']; ?>
			</div>	
		</div>
	</div>
		

</div>
</div>


<?php include_once 'pre-footer.php'; ?>