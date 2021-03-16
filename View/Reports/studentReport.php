<?php 
	include('../Includes/header.php');  

	$id_estudiante = $_GET['id'];
	$id_periodo = $_GET['p'];
	$id_curso = $_GET['c'];

	require_once('../../Controller/procesos_controlador.php');
	require_once('../../Controller/notas_controlador.php ');
	$lista_procesos = $obj_proceso->get_procesos($id_estudiante, $id_periodo);
?>
	<header class="caja-titulo text-center">
		<h1><span><a href="./indexReports.php?p=<?php echo($id_periodo)?>&c=<?php echo($id_curso)?>">Volver</a></span> Informe Estudiante</h1>
	</header>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-12" style="border: 5px solid #3C7C4B;">
				<div class="table-responsive">
					<h2 class="section-report">Promedio</h2>
					<div id="container" style="text-align: center" style="width: 75%;">
						<canvas id="canvas"></canvas>
					</div>
				</div>
				<div>
					<h2 class="section-report">Procesos</h2>
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
					<h2 class="section-report">Notas</h2>
					<?php 
						foreach ($lista_procesos as $proceso) {
							
							$lista_notas = $obj_nota->get_notas($proceso['id']);
							if($proceso['nombre'] != 'promedio'){
								echo '<div class="caja-proceso">' . $proceso['nombre'].'</div><br>';
								if(count($lista_notas) == 0){
									echo('no hay notas todavia');
								}else{
									foreach ($lista_notas as $n) {
										echo "<div class='caja-lista'>
												<ul class='lista-ordenanda'>";
										echo '<li>' . $n['titulo'] . ': ' . $n['calificacion'] . '</li>';
										echo "</ul></div>";
									}	
								}
							}
						}
					?>
				</div>
				<div class="caja-lista">
					<h2 class="section-report">Comentarios</h2>
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