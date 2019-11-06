<?php 
	$title = "Crear cupón | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/cuponesModelos.php';

	$empresas = getAllEmpresas();
	$categorias = getAllCategorias();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="cupones-list.php">Cupones</a> &raquo; Añadir cupón</h2>
	</div>

	<div class="content-in">

		<div class="box-full">
		<form action="_add-cupon.php" method="POST">
			
			<input type="text" name="cup_id" hidden="">

			<dl>
				<dd>Titulo</dd>
				<dt><input type="text" name="cup_titulo" required=""></dt>
			</dl>

			<dl>
				<dd>Descripción corta</dd>
				<dt>
					<textarea name="cup_descripcion_corta" cols="30" rows="5"></textarea>
				</dt>
			</dl>

			<dl>
				<dd>Descripción larga <span class="helpme-txt">(Ten en cuenta)</span></dd>
				<dt>
					<textarea name="cup_descripcion_larga" class="cool-textarea" cols="30" rows="5"></textarea>
				</dt>
			</dl>

			<dl>
				<dd>Legal <span class="helpme-txt">(Las cosas claras)</span></dd>
				<dt>
					<textarea name="cup_legal" class="cool-textarea" cols="30" rows="5"></textarea>
				</dt>
			</dl>

			<dl>
				<dd>Vigencia inicio</dd>
				<dt>
					<input type="text" id="from_all" name="cup_vigencia_inicio" placeholder="dd/mm/aaaa" required >
				</dt>
			</dl>

			<dl>
				<dd>Vigencia Fin</dd>
				<dt>
					<input type="text" id="to_all" name="cup_vigencia_fin" placeholder="dd/mm/aaaa" required >
				</dt>
			</dl>

			<dl>
				<dd>Empresa</dd>
				<dt>
					<select name="emp_id" id="items-list" required="">
						<option value="">-- Selecciona --</option>
						<?php foreach ($empresas as $empresa) { ?>
						<option value="<?php echo $empresa['emp_id']; ?>"><?php echo $empresa['emp_nombre']; ?></option>
						<?php } ?>
					</select>
				</dt>
			</dl>

			<dl>
				<dd>Categoría</dd>
				<dt>
					<select name="cat_id" id="" required="">
						<option value="">-- Selecciona --</option>
						<?php foreach ($categorias as $categoria) { ?>
						<option value="<?php echo $categoria['cat_id']; ?>"><?php echo $categoria['cat_nombre']; ?></option>
						<?php } ?>
					</select>
				</dt>
			</dl>

			<input type="text" name="dep_id" hidden="">

			<dl>
				<dd>Imagen cupón</dd>
				<dt>
					<input type="text" name="cup_imagen" style="width: 540px;">
					<a target="_blank" href="../uploads/gallery-miniv4.php" style="margin-left:10px;">Ver galería</a>
				</dt>
			</dl>

			<dl>
				<dd>Destacado</dd>
				<dt>
					<select name="cup_destacado" id="">
						<option value="0">No</option>
						<option value="1">Si</option>
					</select>
				</dt>
			</dl>

			<dl>
				<dd>Estado</dd>
				<dt>
					<select name="cup_estado" id="" required="">
						<option value="">-- Selecciona --</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</dt>
			</dl>

			<div class="box-btn txt-center mtop-30">
				<input type="submit" value="Añadir" class="btn-principal btn btn-medium">
				<a href="cupones-list.php" class="btn btn-principal-linea btn-medium">&laquo; Volver</a>
			</div>

		</form>
		</div>

	</div>



</div>

<?php include_once '../footer.php'; ?>