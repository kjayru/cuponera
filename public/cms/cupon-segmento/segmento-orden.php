<?php 
	$title = "Ordenar cupones de un segmento | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/cupon_segmentoModelos.php';

	$seg_id = $_GET['seg_id'];
	$cat_id = $_GET['cat_id'];
	$message = $_GET['message'];

	$cupones = getCuponesSegmento($seg_id, $cat_id);
	$misegmento = getOnToySegmento($seg_id);
	$micategoria = getOnToyCategoria($cat_id);
?>

<script>
	$( document ).ready(function() {
		var fixHelperModified = function(e, tr) {
			var $originals = tr.children();
			var $helper = tr.clone();
			$helper.children().each(function(index) {
				$(this).width($originals.eq(index).width())
			});

			return $helper;
		},

		updateIndex = function(e, ui) {
			$('td.index input', ui.item.parent()).each(function (i) {
				//$(this).html(i + 1);
				$(this).val(i + 1);
			});
		};

		$("tbody").sortable({
			helper: fixHelperModified,
			stop: updateIndex
		}).disableSelection();
	});
</script>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="segmento-select.php">Segmento </a>&raquo; <a href="segmento-categoria.php?seg_id=<?php echo $seg_id; ?>">Categoría </a>&raquo; Ordenar <strong><?php echo $micategoria[0]['cat_nombre']; ?></strong> en segmento <strong><?php echo $misegmento[0]['seg_nombre']; ?></strong></h2>
	</div>

	<div class="content-in">

	<?php if ($message == 'true') { ?>
	<div class="message success" id="message" style="width:100%;">
		<p>Se realizó la modificación con éxito. <a href="segmento-categoria.php?seg_id=<?php echo $seg_id; ?>"><i class="fa fa-times" aria-hidden="true"></i> Volver</a></p>
	</div>
	<?php } ?>

	
	<div style="width: 80%; margin: 0 10%"> 

		<div class="box-mini-title">
			<h2><?php echo $micategoria[0]['cat_nombre']; ?></h2>
		</div>

		<form action="_update-cupon_segmento.php" method="POST">
		<input type="text" name="cat_id" hidden="" value="<?php echo $cat_id; ?>">

		<table class="table table-striped table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th></th>
					<th>Empresa</th>
					<th>Nombre cupón</th>
					<th class="txt-center">Orden</th>
				</tr>
			</thead>

			<tbody>
			<?php foreach ($cupones as $cupon) { ?>
				<tr>
					<td><span class="ui-icon ui-icon-arrowthick-2-n-s"></td>
					<td style="display: none;"><input type="text" name="sc_id[]" value="<?php echo $cupon['sc_id']; ?>"></td>
					<td style="display: none;"><input type="text" name="cup_id[]" value="<?php echo $cupon['cup_id']; ?>"></td>
					<td style="display: none;"><input type="text" name="seg_id[]" value="<?php echo $seg_id; ?>"></td>
					<td><?php echo $cupon['emp_nombre']; ?></td>
					<td><?php echo $cupon['cup_titulo']; ?></td>
					<td class="index"><input type="text" name="sc_orden[]" readonly="" value="<?php echo $cupon['sc_orden']; ?>" class="txt-center"></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>

		<div class="box-btn txt-center mtop-30">
			<input type="submit" class="btn-principal btn btn-medium" value="Guardar cambios">
			<a href="segmento-categoria.php?seg_id=<?php echo $seg_id; ?>" class="btn btn-principal-linea btn-medium">&laquo; Volver</a>
		</div>
		</form>

	</div>
	</div>
</div>

<?php include_once '../footer.php'; ?>