<?php 
	$title = "Ordenar cupones home | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/homeModelos.php';

	$cupones = getCuponesAgregados();
	$message = $_GET['message'];
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
		<h2>Ordenar cupones del home</h2>
	</div>

	<div class="content-in">

	<?php if ($message == 'true') { ?>
	<div class="message success" id="message" style="width:100%;">
		<p>Se realizó la modificación con éxito. <a href="home-list.php"><i class="fa fa-times" aria-hidden="true"></i> Volver</a></p>
	</div>
	<?php } ?>

	<div style="width: 70%; margin: 0 15%"> 

		<form action="_update-order-home.php" method="POST">
		<table class="table table-striped table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th>Empresa</th>
					<th>Título del cupón</th>
					<th>Orden</th>
				</tr>
			</thead>

			<tbody>
			<?php foreach ($cupones as $cupon) { ?>
				<tr>
					<td><span class="ui-icon ui-icon-arrowthick-2-n-s"></td>
					<td>
						<input type="text" name="ch_id[]" value="<?php echo $cupon['ch_id']; ?>">
					</td>

					<td>
						<input type="text" name="cup_id[]" value="<?php echo $cupon['cup_id']; ?>">
					</td>

					<td>
						<?php echo $cupon['emp_nombre']; ?>
					</td>

					<td>
						<?php echo $cupon['cup_titulo']; ?>
					</td>
					
					<td class="index">
						<input type="text" name="ch_orden[]" value="<?php echo $cupon['ch_orden']; ?>">
					</td>

				</tr>
			<?php } ?>
			</tbody>
		</table>

		<div class="box-btn txt-center mtop-30">
			<input type="submit" class="btn-principal btn btn-medium" value="Guardar cambios">
			<a href="home-list.php" class="btn btn-principal-linea btn-medium">&laquo; Volver</a>
		</div>
		</form>

	</div>
	</div>
</div>

<?php include_once '../footer.php'; ?>