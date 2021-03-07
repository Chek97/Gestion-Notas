<?php include('../Includes/header.php'); 

	include_once('../../Model/estudiantes_modelo.php');
	$obj_estudiante = new Estudiantes();

	$periodo = $_GET['p'];
	$curso = $_GET['c'];

	$pagina = $_GET['pagina'];

	$tamanoPaginas = 10;
	$empezar = ($pagina - 1) * $tamanoPaginas;
	$lista_estudiantes = $obj_estudiante->get_estudiantes($curso, $tamanoPaginas, $empezar);

?>
<header class="caja-titulo text-center">
	<h1><span><a href="./Reports.php">Volver</a></span> Estudiantes</h1>
</header>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-12">
			<p style="padding-top: 5px">Haz click sobre un estdiante para obtener toda su informacion</p>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr class="casilla-tabla">
							<th>ID</th>
							<th>NOMBRE</th>
							<th>APELLIDO</th>
							<th colspan="2">INFORME</th>
						</tr>
					</thead>
					<?php foreach ($lista_estudiantes as $estudiante) { ?>
						<tr>
							<td><?php echo $estudiante['id']; ?></td>
							<td><?php echo $estudiante['nombre']; ?></td>
							<td><?php echo $estudiante['apellido']; ?></td>
							<td style="text-align: center;"><a href="studentReport.php?id=<?php echo $estudiante['id']; ?>&p=<?php echo $periodo; ?>&c=<?php echo($curso)?>"><button class="btn btn-warning">VER</button></a></td>
						</tr>
					<?php } ?>	
				</table>
			</div>
		</div>
		<nav aria-label="..."><!--Crear navegacion-->
			<ul class="pager">
				<li><a href="#">Anterior</a></li>
				<li><a href="#">Siguiente</a></li>
			</ul>
		</nav>
	</div>
</div>
<?php include('../Includes/footer.php'); ?>