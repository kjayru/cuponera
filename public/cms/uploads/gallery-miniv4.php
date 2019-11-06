<?php 
	$title = "Galería | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/uploadsModelos.php';

	$rs_result = resultadosxPagina(0, 10000);
?>

<div class="content-wrapper">
		<div class="box-title">
		<h2>Gelería</h2>
	</div>
<div class="content-in">

		<table id="lista-cup" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="15%">Tipo</th>
					<th width="35%">Nombre</th>
					<th width="35%">URL</th>
					<th width="10%" class="txt-center">Imagen</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($rs_result as $resultado) { ?>
				<tr>
					<td><?php echo $resultado['img_id']; ?></td>
					<td><?php echo $resultado['img_tipo']; ?></td>
					<td><?php echo $resultado['img_filename']; ?></td>
					<td>
						
						<?php if ($resultado['img_tipo']  == 'logo') { ?>
			<input id="copyme-<?php echo $resultado['img_id']; ?>" type="text" value="http://cuponera.claro.com.pe/img/logos/<?php echo $resultado['img_filename']; ?>">
			<?php } ?>

			<?php if ($resultado['img_tipo']  == 'imagen') { ?>
			<input id="copyme-<?php echo $resultado['img_id']; ?>" type="text" value="http://cuponera.claro.com.pe/img/cupon/<?php echo $resultado['img_filename']; ?>">
			<?php } ?>
					</td>

					<td>
						
						<?php if ($resultado['img_tipo']  == 'logo') { ?>
			<img src="http://cuponera.claro.com.pe/img/logos/<?php echo $resultado['img_filename']; ?>" style="width:90px;">
			<?php } ?>

			<?php if ($resultado['img_tipo']  == 'imagen') { ?>
			<img src="http://cuponera.claro.com.pe/img/cupon/<?php echo $resultado['img_filename']; ?>" style="width:90px;">
			<?php } ?>
					</td>
					
				</tr>
				<?php } ?>
			</tbody>

		</table>

</div>
</div>

<?php include_once '../footer.php'; ?>