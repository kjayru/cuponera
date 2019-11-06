<?php 
	$title = "Dashboard | Administrador Tienda Postpago";
	include_once '../header.php';

	$pictures = array("mariobros.gif", "nyan-cat.gif", "donkeykong.gif", "pikachu.gif", "charmander.gif", "yoshi-y-mario.gif");
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Dashboard</h2>
	</div>

	<div class="content-in">

		<h1>Hola</h1>
		<br>
		<p>
		<?php echo '<img width="50px" src="../img/staging/'.$pictures[array_rand($pictures)].'" />'; ?>
		</p>
	</div>



</div>

<?php include_once '../footer.php'; ?>