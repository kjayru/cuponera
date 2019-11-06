<?php
	include_once 'pre-header.php';
	include_once 'modelos/detalleModelos.php';

	$cup_id = $_GET['cup_id'];
	$cupon = getCuponInfo($cup_id);
	$imagenes = getGalleryCupon($cup_id);
?>

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



<script src="../js/html2canvas.js"></script>
<script src="../js/canvas2image.js"></script>
<script>

$(function() { 

    $("#btnSave").click(function() { 
        html2canvas($("#widget"), {allowTaint: false,

            onrendered: function(canvas) {

                theCanvas = canvas;
                document.body.appendChild(canvas);


                // Convert and download as image 
                //Canvas2Image.saveAsPNG(canvas); 
                //$("#img-out").append(canvas);
                // Clean up 
                //document.body.removeChild(canvas);
            }
        });
    });
}); 

</script>

<input type="button" id="btnSave" value="Save PNG"/>

<div id="img-out"></div>
<?php include_once 'pre-footer.php'; ?>