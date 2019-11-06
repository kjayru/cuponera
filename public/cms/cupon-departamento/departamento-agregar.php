<?php 
	$title = "Cupones a Segmento | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/cupon_departamentoModelos.php';
	
	$dep_id = $_GET['dep_id'];

	$cupones = getCupones($dep_id);
	$agregados = getCuponesAgregados($dep_id);
	$midepartamento = onToyDepartamento($dep_id);

?>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="departamento-select.php">Departamentos </a>&raquo; Asignar cupones a <?php echo $midepartamento[0]['dep_nombre']; ?></h2>
	</div>

	<div class="content-in">
		<div class="box-content-top">
			<h2>Elige los cupones que aparecerán en <strong><?php echo $midepartamento[0]['dep_nombre']; ?></strong></h2>
		</div>

		<form action="_add-cupon_departamento.php" method="POST">
			<div class="box-filter-top">
				<input type="text" name="dc_id" hidden="">
				<input type="text" name="dep_id" value="<?php echo $dep_id; ?>" hidden="">


				<?php if (empty($cupones)) { ?>
					<p>Ya has asignado todos los cupones creados a este departamento. <a href="../cupones/cupones-new.php">Crear más cupones</a></p>
	
					<div class="box-btn txt-center mtop-20">
						<a href="departamento-select.php" class="btn btn-principal-linea btn-regular" style="display:inline-block; margin-left:10px;">&laquo; Volver</a>
					</div>
				<?php } else { ?>
				<div class="box-filter-full">
					<select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
						<?php foreach ($cupones as $cupon) { ?>
						<option value="<?php echo $cupon['cup_id']; ?>">[ID <?php echo $cupon['cup_id']; ?>] <?php echo $cupon['emp_nombre']; ?> - <?php echo $cupon['cup_titulo']; ?></option>
						<?php } ?>
					</select>
				</div>
				
				<div class="box-filter-btn">
					<span id="multiselect_rightAll" class="btn-block"><i class="fa fa-angle-double-down" aria-hidden="true"></i> Añadir todo</span>
					<span id="multiselect_rightSelected" class="btn-block"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
					<span id="multiselect_leftSelected" class="btn-block"><i class="fa fa-angle-up" aria-hidden="true"></i></span>
					<span id="multiselect_leftAll" class="btn-block"><i class="fa fa-angle-double-up" aria-hidden="true"></i> Quitar todo</span>
				</div>
				
				<div class="box-filter-full">
					<p style="font-size:12px;margin-bottom:5px;">Vas añadir estos cupones:</p>
					<select name="cup_id[]" id="multiselect_to" class="form-control" size="8" multiple="multiple"></select>
				</div>

				<div style="width:100%;float:left;text-align:center;margin-top:10px;">
					<input type="submit" class="btn btn-principal btn-medium" value="Añadir">
					<a href="departamento-select.php" style="display:inline-block; margin-left:10px;">Cancelar</a>
				</div>
				<?php } ?>
			</div>
		</form>
	</div>

</div>


<div class="content-wrapper">

	<div class="content-in mbottom-50">

		<div class="box-content-top">
			<h2>Estos son los cupones agregados en el <strong><?php echo $midepartamento[0]['dep_nombre']; ?></strong></h2>
		</div>


		<table id="lista-cup-seg" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="10%" class="txt-center">ID Cupón</th>
					<th width="15%">Empresa</th>
					<th width="35%">Título cupón</th>
					<th width="20%" class="txt-center">Opciones</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($agregados as $agregado) { ?>
				<tr>
					<td class="txt-center"><?php echo $agregado['cup_id']; ?></td>
					<td><?php echo $agregado['emp_nombre']; ?></td>
					<td><?php echo $agregado['cup_titulo']; ?></td>
					<td class="txt-center">
						<a href="_delete-cupon_departamento.php?dc_id=<?php echo $agregado['dc_id']; ?>&dep_id=<?php echo $dep_id; ?>" class="btn btn-principal-linea btn-small" onclick="return confirm('¿Estás seguro? No hay marcha atrás')" ><i class="fa fa-trash-o" aria-hidden="true"></i> Quitar</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>

</div>


<?php include_once '../footer.php'; ?>