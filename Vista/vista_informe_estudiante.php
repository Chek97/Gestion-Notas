<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Informe Estudiante</title>
		<?php include('../includes/header.php'); ?>
	</head>
	<body>
<?php
	//TRAER TODA LA INFORMACION RELEVANTE Y COLOCARLA EN ESTE LUGAR

	$id_estudiante = $_GET['id'];
	$id_periodo = $_GET['p'];

	require_once('../Controlador/procesos_controlador.php');
	require_once('../Controlador/notas_controlador.php');


	$lista_procesos = $obj_proceso->get_procesos($id_estudiante, $id_periodo);
?>
	<script type="text/javascript" src="../Vista/Chart.js-2.9.3/dist/Chart.min.js"></script>
	<script type="text/javascript" src="../Vista/Chart.js-2.9.3/samples/utils.js"></script>
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
	<div class="container">
		<div class="centro titulo" style="background-color: #3C7C4B;">
			<h1>Informe Estudiante</h1>
		</div>
		<div>
			<div id="container" style="width: 75%;">
				<canvas id="canvas"></canvas>
			</div>
		</div>
		<div>
			<h2>Procesos</h2>
			<table class="table table-bordered">
				<thead>
					<tr class="casilla-tabla">
						<?php foreach ($lista_procesos as $proceso) {

							//OBTENER EL ID DEL PROCESO PARA OBTENER SACAR LAS NOTAS
							$lista_notas = $obj_nota->get_notas($proceso['id']);
						 ?>
						<th><?php echo $proceso['nombre']; ?></th>
					<?php } ?>
					</tr>
				</thead>
				<tr>
					<?php foreach ($lista_procesos as $proceso1) { ?>
					<td><?php echo $proceso1['nota'] ?></td>
					<?php } ?>
				</tr>
			</table>
		</div>
		<div class="table-responsive">
			<h2>Notas</h2>
			<?php
				foreach ($lista_procesos as $proceso) {

					$lista_notas = $obj_nota->get_notas($proceso['id']);

						echo '<div class="caja-proceso">' . $proceso['nombre'].'</div><br>';
					foreach ($lista_notas as $n) {
							echo "<div class='caja-lista'>
									<ul class='lista-ordenanda'>";
							echo '<li>' . $n['titulo'] . ': ' . $n['calificacion'] . '</li>';
							echo "</ul></div>";
					}
				}
			 ?>
		</div>
		<div class="caja-lista">
			<h2>Comentarios</h2>
			<?php
				require_once('../Controlador/comentario_controlador.php');

				$lista_comentarios = $obj_comentario->obtener_comentario($id_estudiante);
				echo '<div><ul class="lista-ordenanda">';
				foreach ($lista_comentarios as $com) {

					echo '<li>'.$com['comentario'] . '</li>';
				}
				echo "</ul></div>";
			 ?>
		</div>
	</div>
<script>
		var MONTHS = ['Comprension lectora', 'Argumentacion', 'Solucion de problemas', 'Socio-personal'];
		var color = Chart.helpers.color;
		var barChartData = {
			labels: ['Comprension lectora', 'Argumentacion', 'Solucion de problemas', 'Socio-personal'],
			datasets: [{
				label: 'promedio',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.green,
				borderWidth: 1,
				data: [
					<?php foreach ($lista_procesos as $l) {
						echo $l['nota'] . ',';
					} ?>
					0,5
				]
			}]

		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Rendimiento Estudiante'
					}
				}
			});

		};


	</script>

<?php include('../includes/footer.php'); ?>
