<?php 
	$title = "Agregar Empresa | Administrador Cuponera Virtual";
	include_once '../header.php';
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="empresas-list.php">Empresas</a> &raquo; Añadir empresa</h2>
	</div>

	<div class="content-in">

		<div class="box-full" style="width: 80%;">
		<form action="_add-empresa.php" method="POST">
			<input type="text" name="emp_id" hidden="">

			<dl>
				<dd>Nombre de la empresa</dd>
				<dt><input type="text" name="emp_nombre" required=""></dt>
			</dl>

			<dl>
				<dd>Descripción</dd>
				<dt><textarea name="emp_descripcion" class="cool-textarea" id="" cols="15" rows="5"></textarea></dt>
			</dl>

			<dl>
				<dd>Logo (url imagen)</dd>
				<dt>
					<input type="text" name="emp_logo" required="" style="width: 540px;">
					<a class="fancybox-norefresh fancybox.iframe" href="../uploads/gallery-mini.php?page=1" style="margin-left:10px;">Ver galería</a>
				</dt>

			</dl>

			<dl>
				<dd>Dirección</dd>
				<dt><textarea name="emp_direccion" class="cool-textarea" cols="15" rows="5"></textarea></dt>
			</dl>

			<dl>
				<dd>Teléfono</dd>
				<dt><input type="text" name="emp_telefono"></dt>
			</dl>

			<dl>
				<dd>Correo electrónico</dd>
				<dt><input type="text" name="emp_email"></dt>
			</dl>

			<dl>
				<dd>Página web <span class="helpme-txt">(Usar siempre "http://" delante)</span></dd>
				<dt><input type="text" name="emp_url"></dt>
			</dl>

			<dl>
				<dd>Página web 2 <span class="helpme-txt">(Usar siempre "http://" delante)</span></dd>
				<dt><input type="text" name="emp_url_2"></dt>
			</dl>

			<dl>
				<dd>Mapa</dd>
				<dt><textarea name="emp_mapa" id="" cols="30" rows="3"></textarea></dt>
			</dl>

			<dl>
				<dd>Estado</dd>
				<dt>
					<select name="emp_estado" id="" required="">
						<option value="">-- Selecciona --</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</dt>
			</dl>

			<div class="box-btn txt-center mtop-30">
				<input type="submit" value="Añadir" class="btn-principal btn btn-medium">
				<a href="empresas-list.php" class="btn btn-principal-linea btn-medium">&laquo; Volver</a>
			</div>

		</form>
		</div>

	</div>



</div>

<?php include_once '../footer.php'; ?>