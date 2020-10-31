<?php include('../Includes/header.php');  
	//TRAER TODA LA INFORMACION RELEVANTE Y COLOCARLA EN ESTE LUGAR

	$id_estudiante = $_GET['id'];
	$id_periodo = $_GET['p'];

	require_once('../../Controller/procesos_controlador.php');
	require_once('../../Controller/notas_controlador.php ');


	$lista_procesos = $obj_proceso->get_procesos($id_estudiante, $id_periodo);
?>

	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
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
				require_once('../../Controller/comentario_controlador.php');

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
	var ctx = document.getElementById('canvas').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Comprension lectora', 'Argumentacion', 'Solucion de problemas', 'Socio-personal'],
			datasets: [{
				label: 'Promedio',
				data: [<?php foreach ($lista_procesos as $l) {
							echo $l['nota'] . ',';
						} ?>
						0,5],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
	</script>	

<?php include('../Includes/footer.php'); ?>