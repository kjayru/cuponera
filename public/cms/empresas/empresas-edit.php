<?php 
	$title = "Agregar Empresa | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/empresasModelos.php';

	$emp_id = $_GET['emp_id'];
	$message = $_GET['message'];

	$empresa = getUnaEmpresa($emp_id);
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="empresas-list.php">Empresas</a> &raquo; Editar empresa: <?php echo $empresa[0]['emp_nombre']; ?></h2>
	</div>

	<div class="content-in">

		<?php if ($message == 'true') { ?>
		<div class="message success" id="message" style="width:100%;">
			<p>La información ha sido actualizada con éxito. <a href="empresas-list.php"><i class="fa fa-times" aria-hidden="true"></i> Volver</a></p>
		</div>
		<?php } ?>

		<div class="box-full">
		<form action="_edit-empresa.php" method="POST">
			<input type="text" name="emp_id" value="<?php echo $empresa[0]['emp_id']; ?>" hidden="">

			<dl>
				<dd>Nombre de la empresa</dd>
				<dt><input type="text" name="emp_nombre" value="<?php echo $empresa[0]['emp_nombre']; ?>" required=""></dt>
			</dl>

			<dl>
				<dd>Descripción</dd>
				<dt><textarea name="emp_descripcion" class="cool-textarea" id="" cols="15" rows="5"><?php echo $empresa[0]['emp_descripcion']; ?></textarea></dt>
			</dl>

			<dl>
				<dd>Logo (url imagen)</dd>
				<dt>
					<input type="text" name="emp_logo" value="<?php echo $empresa[0]['emp_logo']; ?>" required="" style="width:540px;">
					<img src="<?php echo $empresa[0]['emp_logo']; ?>" width="60" height="60" style="float: left;margin-right: 10px;" alt="">
					<a class="fancybox-norefresh fancybox.iframe" href="../uploads/gallery-mini.php?page=1" style="margin-left:10px;">Ver galería</a>
				</dt>
			</dl>

			<dl>
				<dd>Dirección</dd>
				<dt><textarea name="emp_direccion" class="cool-textarea" cols="15" rows="5"><?php echo $empresa[0]['emp_direccion']; ?></textarea></dt>
			</dl>

			<dl>
				<dd>Teléfono</dd>
				<dt><input type="text" name="emp_telefono" value="<?php echo $empresa[0]['emp_telefono']; ?>"></dt>
			</dl>

			<dl>
				<dd>Correo electrónico</dd>
				<dt><input type="text" name="emp_email" value="<?php echo $empresa[0]['emp_email']; ?>"></dt>
			</dl>

			<dl>
				<dd>Página web <span class="helpme-txt">(Usar siempre "http://" delante)</span></dd>
				<dt><input type="text" name="emp_url" value="<?php echo $empresa[0]['emp_url']; ?>"></dt>
			</dl>

			<dl>
				<dd>Página web 2 <span class="helpme-txt">(Usar siempre "http://" delante)</span></dd>
				<dt><input type="text" name="emp_url_2" value="<?php echo $empresa[0]['emp_url_2']; ?>"></dt>
			</dl>

			<dl>
				<dd>Mapa</dd>
				<dt><textarea name="emp_mapa" id="" cols="30" rows="3"><?php echo $empresa[0]['emp_mapa']; ?></textarea></dt>
			</dl>

			<dl>
				<dd>Estado</dd>
				<dt>
					<select name="emp_estado" id="" required="">
						<option value="<?php echo $empresa[0]['emp_estado']; ?>"><?php if ($empresa[0]['emp_estado'] == '1') { ?> Activo <?php } else { ?> Inactivo <?php } ?></option>
						<option disabled="">----------</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</dt>
			</dl>

			<div class="box-btn txt-center mtop-30">
				<input type="submit" value="Actualizar" class="btn-principal btn btn-medium">
				<a href="empresas-list.php" class="btn btn-principal-linea btn-medium">&laquo; Volver</a>
			</div>

		</form>
		</div>

	</div>



</div>

<?php include_once '../footer.php'; ?>