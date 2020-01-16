<?php include('../includes/header.php'); 

	include_once('../Controlador/estudiante_controlador.php');

	$periodo = $_GET['p'];
	$curso = $_GET['c'];
	$lista_estudiantes = $obj_estudiante->get_estudiantes($curso);

?>
<div class="container">
	<div class="centro titulo" style="background-color: #3C7C4B">
		<h1>Estudiantes</h1>
		<p>Haz click sobre un estdiante para obtener toda su informacion</p>
	</div>
	<div>
		<table class="table table-bordered">
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
					<td style="text-align: center;"><a href="../Vista/vista_informe_estudiante.php?id=<?php echo $estudiante['id']; ?>&p=<?php echo $periodo; ?>"><button class="btn btn-warning">VER</button></a></td>
				</tr>
			<?php } ?>	
		</table>
		<a href="../index.php">Volver</a>
	</div>
</div>


<?php include('../includes/footer.php'); ?>