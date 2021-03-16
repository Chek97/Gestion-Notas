<?php include('../Includes/header.php');

//Obtenemos los indicadores de curso y periodo
$periodo = $_GET['p'];
$curso = $_GET['c'];
$pagina = $_GET['pagina'];

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

						$tamanoPaginas = 10;

						$empezar = ($pagina - 1) * $tamanoPaginas;

						$lista_estudiantes = $obj_estudiante->get_estudiantes($curso, $tamanoPaginas, $empezar);

						//Ciclo para colocar los datos en pantalla
						foreach ($lista_estudiantes[0] as $est) {

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
							<td><a href="showComments.php?id=<?php echo $est['id']; ?>&curso=<?php echo $curso; ?>&periodo=<?php echo $periodo; ?>&pagina=1"><button class="btn btn-success">Ver Comentarios</button></a></td>
						</tr>
					<?php
					}
					?>
				</table>
			</div>
		</div>
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