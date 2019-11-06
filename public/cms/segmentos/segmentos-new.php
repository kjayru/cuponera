<?php 
	$title = "Agregar segmento | Administrador Cuponera Virtual";
	include_once '../header.php';
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="segmentos-list.php">Segmentos</a> &raquo; Añadir segmento</h2>
	</div>

	<div class="content-in">

		<div class="box-full">
		<form action="_add-segmento.php" method="POST">
			<input type="text" name="seg_id" hidden="">

			<dl>
				<dd>Nombre</dd>
				<dt><input type="text" name="seg_nombre" required=""></dt>
			</dl>

			<dl>
				<dd>Estado</dd>
				<dt>
					<select name="seg_estado" id="" required="">
						<option value="">-- Selecciona --</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</dt>
			</dl>

			<div class="box-btn txt-center mtop-30">
				<input type="submit" value="Añadir" class="btn-principal btn btn-medium">
				<a href="segmentos-list.php" class="btn btn-principal-linea btn-medium">Cancelar</a>
			</div>

		</form>
		</div>

	</div>



</div>

<?php include_once '../footer.php'; ?>