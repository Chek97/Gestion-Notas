<?php include('../Includes/header.php'); 

	//Obtenemos los indicadores de curso y periodo
	$periodo = $_GET['p'];
	$curso = $_GET['c'];

?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-12">
			<div class="centro titulo" style="background-color: #3C7C4B; margin-top: 10px;">
				<h1>NOTAS DE ESTUDIANTES</h1>
			</div>
			<div class='table-responsive'>
				<table class="table table-bordered">
					<thead>
						<tr class="casilla-tabla">
							<th>ID</th>
							<th>NOMBRE</th>
							<th>APELLIDO</th>
							<th>COMPRENSION LECTORA</th>
							<th>ARGUMENTACION</th>
							<th>SOLUCION DE PROBLEMAS</th>
							<th>SOCIO-PERSONAL</th>
							<th>PROMEDIO</th>
							<th colspan="3" style="text-align: center;">AGREGAR</th>
						</tr>
					</thead>
					<?php 
						require_once('../../Controller/estudiante_controlador.php');
						//Traer a los estudiantes a partir del curso
						$lista_estudiantes = $obj_estudiante->get_estudiantes($curso);

						//Ciclo para colocar los datos en pantalla

						foreach ($lista_estudiantes as $est) {

							$lista_id = $obj_proceso->get_procesos($est['id'], $periodo);
				
							
					?>
						<tr>
							<td><?php echo $est['id'] ?></td>
							<td><?php echo $est['nombre'] ?></td>
							<td><?php echo $est['apellido'] ?></td>
						<?php foreach ($lista_id as $d) { ?>	
							<td><a href="changeNote.php?id=<?php echo $est['id']; ?>&periodo=<?php echo $periodo; ?>&nomp=<?php echo $d['nombre']; ?>&curso=<?php echo $curso; ?>"><?php echo $d['nota'] ?></a></td>
						<?php } ?>	
							<td><a href="addProcessNote.php?estudiante=<?php echo $est['id']; ?>&periodo=<?php echo $periodo; ?>&curso=<?php echo $curso; ?>"><button class="btn btn-success">Agregar Nota</button></a></td>
							<td><a href="showComments.php?id=<?php echo $est['id']; ?>&curso=<?php echo $curso; ?>&periodo=<?php echo $periodo; ?>"><button class="btn btn-success">Ver Comentarios</button></a></td>
						</tr>		
					<?php 
						}
					?>
				</table>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-6">
			<a href="../../index.php">Volver</a>
		</div>
	</div>
</div>


<?php include('../Includes/footer.php'); ?>