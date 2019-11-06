<?php 
	$title = "Cupones en Home | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/homeModelos.php';
	

	$cupones = getCupones();
	$agregados = getCuponesAgregados();

?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Cupones en Home</h2>
	</div>

	<div class="content-in">
		<div class="box-content-top">
			<h2>Elige los cupones que aparecerán en la página de inicio de la Cuponera Virtual</h2>
		</div>

		<form action="_add-home.php" method="POST">
			<div class="box-filter-top">
				<input type="text" name="ch_id" hidden="">
				<input type="text" name="ch_orden" value="99" hidden="">


				<?php if (empty($cupones)) { ?>
					<p>Ya has asignado todos los cupones creados. <a href="../cupones/cupones-new.php">Crear más cupones</a></p>
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
			<h2>Estos son los cupones agregados en el home</h2>
			<a href="home-list.php" class="btn btn-principal btn-medium mtop-20">Ordenar cupones</a>
		</div>


		<table id="lista-cup-seg" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%" class="txt-center">Orden</th>
					<th width="15%">Empresa</th>
					<th width="35%">Título cupón</th>
					<th width="5%" class="txt-center">ID cupón</th>
					<th width="10%" class="txt-center">Opciones</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($agregados as $agregado) { ?>
				<tr>
					<td class="txt-center"><?php echo $agregado['ch_orden']; ?></td>
					<td><?php echo $agregado['emp_nombre']; ?></td>
					<td><?php echo $agregado['cup_titulo']; ?></td>
					<td class="txt-center"><?php echo $agregado['cup_id']; ?></td>
					<td class="txt-center">
						<a href="_delete-home.php?ch_id=<?php echo $agregado['ch_id']; ?>" class="btn btn-principal-linea btn-small" onclick="return confirm('¿Estás seguro? No hay marcha atrás')" ><i class="fa fa-trash-o" aria-hidden="true"></i> Quitar</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>

</div>


<?php include_once '../footer.php'; ?>