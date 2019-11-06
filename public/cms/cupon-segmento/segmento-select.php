<?php 
	$title = "Cupones a Segmento | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/cupon_segmentoModelos.php';

	$segmentos = getSegmentos();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Asignar cupones a un segmento</h2>
	</div>

	<div class="content-in">

		<div class="box-content-top">
			<h2>Elige el segmento para agregarle cupones</h2>
		</div>

		<table class="table" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="15%" class="txt-center">ID</th>
					<th width="35" class="txt-center">Segmento</th>
					<th width="50%" class="txt-center">Opciones</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($segmentos as $segmento) { ?>
				<tr>
					<td class="txt-center"><?php echo $segmento['seg_id']; ?></td>
					<td class="txt-center"><?php echo $segmento['seg_nombre']; ?></td>
					<td class="txt-center">
						<a href="segmento-agregar.php?seg_id=<?php echo $segmento['seg_id']; ?>" class="btn btn-principal btn-small" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Agregar cupones</a>
						<a href="segmento-categoria.php?seg_id=<?php echo $segmento['seg_id']; ?>" class="btn btn-principal btn-small" style="margin-bottom: 10px;"><i class="fa fa-sort"></i> Ordenar cupones</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>



</div>

<?php include_once '../footer.php'; ?>