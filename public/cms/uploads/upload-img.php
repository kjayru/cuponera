<?php 
	$title = "Subir imágenes | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/categoriasModelos.php';

	$categorias = getAllCategorias();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Subir imágenes</h2>
	</div>

	<div class="content-in">

		<div class="box-content-top">
			<p>Hola! aquí podrás subir las imágenes de los cupones y sus logos. Sólo emplea los siguientes formatos permitidos: <strong>JPG, PNG o GIF</strong>. Recuerda que no podrás subir una imagen que pese más de <strong>1MB</strong></p>
		</div>

		<div class="box-upload">
		<form action="_add-images.php" method="post" enctype="multipart/form-data" name="addroom" id="fileForm">

			<dl>
				<dd>Tipo de imagen</dd>
				<dt>
					<select name="img_tipo" style="width: 400px;" required="">
						<option value="">-- Selecciona --</option>
						<option value="logo">Logo</option>
						<option value="imagen">Fotos cupones</option>
					</select>
				</dt>
			</dl>

			<dl>
				<dd>Subir archivo(s)</dd>
				<dt>
					<input type="file" name="image[]" class="ed" multiple="multiple" id="uploadfile" accept="image/x-png, image/gif, image/jpeg, image/jpg" multiple="" required="" />
				</dt>

				<dt>
					<input type="submit" class="btn btn-principal btn-medium" value="Subir archivos">
				</dt>
			</dl>

		</form>
		</div>

		<?php if (@$message == 'true') { ?>
		<div class="message success" id="message" style="width:100%;">
			<p>Se subieron las imágenes con éxito</p>
		</div>
		<?php } ?>

	</div>

</div>

<?php include_once '../footer.php'; ?>