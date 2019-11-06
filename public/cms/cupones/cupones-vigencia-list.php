<?php 
	$title = "Cupones | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/cuponesModelos.php';

	$cupones = getCupones();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Cupones</h2>
	</div>

	<div class="content-in">

		<table id="lista-cup" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="15%">Empresa</th>
					<th width="30%">Título cupón</th>
					<th width="15%">Vigencia inicio</th>
					<th width="15%">Vigencia fin</th>
					<th width="20%" class="txt-center">Estado</th>
					<th width="20%" class="txt-center">Opciones</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($cupones as $cupon) { ?>
				<tr>
					<td><?php echo $cupon['cup_id']; ?></td>
					<td><?php echo $cupon['emp_nombre']; ?></td>
					<td><?php echo $cupon['cup_titulo']; ?></td>
					<td class="txt-center"><?php echo $cupon['cup_vigencia_inicio']; ?></td>
					<td class="txt-center"><?php echo $cupon['cup_vigencia_fin']; ?></td>
					<td class="txt-center">
						<?php if ($cupon['cup_estado'] == '1') { ?>
							<span class="on">Activo</span>
						<?php } else { ?>
							<span class="off">Inactivo</span>
						<?php } ?>
					</td>
					<td class="txt-center">
						<a href="cupones-edit.php?emp_id=<?php echo $empresa['emp_id']; ?>" class="btn btn-principal btn-small" style="margin-bottom: 10px;"><i class="fa fa-pencil"></i> Editar</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>



</div>

<?php include_once '../footer.php'; ?>