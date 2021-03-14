<?php include('../Includes/header.php'); 
	//Obtenemos los indicadores de curso y periodo
	$periodo = $_GET['p'];
	$curso = $_GET['c'];

?>
<header class="caja-titulo text-center">
	<h1><span><a href="../../index.php">Volver</a></span> NOTAS DE ESTUDIANTES</h1>
</header>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-12">
			<div class='table-responsive'>
				<table class="table table-hover" style="border: 1px solid gray">
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
						require_once('../../Model/estudiantes_modelo.php');
						require_once('../../Model/procesos_modelo.php');
						$obj_estudiante = new Estudiantes();
						$obj_proceso = new Procesos();
						//Traer a los estudiantes a partir del curso
						$lista_estudiantes = $obj_estudiante->get_estudiantes($curso);

						//Ciclo para colocar los datos en pantalla

						foreach ($lista_estudiantes as $est) {

							$lista_id = $obj_proceso->get_procesos($est['id'], $periodo);
				
					?>
						<tr>
							<td><strong><?php echo $est['id'] ?></strong></td>
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
				<nav aria-label="...">
					<ul class="pager">
						<li><a href="#">Anterior</a></li>
						<li><a href="#">Siguiente</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>


<?php include('../Includes/footer.php'); ?>