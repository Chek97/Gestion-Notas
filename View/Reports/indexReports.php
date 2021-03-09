<?php include('../Includes/header.php'); 

	include_once('../../Controller/estudiante_controlador.php');

	$periodo = $_GET['p'];
	$curso = $_GET['c'];

	$pagina = $_GET['pagina'];

	$tamanoPaginas = 10;
	$empezar = ($pagina - 1) * $tamanoPaginas;
	$lista_estudiantes = $obj_estudiante->get_estudiantes($curso, $tamanoPaginas, $empezar);

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
			<?php foreach ($lista_estudiantes[0] as $estudiante) { ?>
				<tr>
					<td><?php echo $estudiante['id']; ?></td>
					<td><?php echo $estudiante['nombre']; ?></td>
					<td><?php echo $estudiante['apellido']; ?></td>
					<td style="text-align: center;"><a href="studentReport.php?id=<?php echo $estudiante['id']; ?>&p=<?php echo $periodo; ?>"><button class="btn btn-warning">VER</button></a></td>
				</tr>
			<?php } ?>	
		</table>
		<div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center;">
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<?php for($i=1; $i <= $lista_estudiantes[1]; $i++){
						if($pagina == $i){ ?>
							<li class="active"><a href="###"><?php echo($i)?><span class="sr-only">(current)</span></a></li>
					<?php }else{ ?>
						<li><a href="?p=<?php echo($periodo)?>&c=<?php echo($curso)?>&pagina=<?php echo($i)?>"><?php echo($i)?></a></li>
					<?php }}?>
				</ul>
			</nav>
			<a href="../../index.php" class="btn btn-info">Volver</a>
		</div>
	</div>
</div>


<?php include('../Includes/footer.php'); ?>