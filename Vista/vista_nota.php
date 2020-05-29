<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Notas</title>
		<?php include('../includes/header.php'); ?>
	</head>
	<body>
<?php

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
			<div class="table-responsive">
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
							<th colspan="2" style="text-align: center;">AGREGAR</th>
						</tr>
					</thead>
					<?php
						require_once('../Controlador/estudiante_controlador.php');
						//Traer a los estudiantes a partir del curso

						if(isset($_GET["pagina"])){

							$pa = $_GET['pagina'];
								if($_GET["pagina"] == 1){
									header("location: ../Vista/vista_nota.php?p=$periodo&c=$curso");//arreglar esta ruta
								}else{
									$pagina = $_GET["pagina"];
								}
						}else{
							$pagina = 1;
						}

						$tamañoPagina = 10;

						$empezar = ($pagina - 1) * $tamañoPagina;

						$numFilas = $obj_estudiante->total_estudiantes($curso);//metodo para obtener el total de alumnos

						$totalPaginas = ceil($numFilas / $tamañoPagina);

						//Ciclo para colocar los datos en pantalla

						$lista_estudiantes = $obj_estudiante->obtener_10($empezar, $tamañoPagina, $curso);

						foreach ($lista_estudiantes as $est) {

							$lista_id = $obj_proceso->get_procesos($est['id'], $periodo);


					?>
						<tr>
							<td><?php echo $est['id'] ?></td>
							<td><?php echo $est['nombre'] ?></td>
							<td><?php echo $est['apellido'] ?></td>
						<?php foreach ($lista_id as $d) { ?>
							<td><a href="vista_actualizar_nota.php?id=<?php echo $est['id']; ?>&periodo=<?php echo $periodo; ?>&nomp=<?php echo $d['nombre']; ?>&curso=<?php echo $curso; ?>"><?php echo $d['nota'] ?></a></td>
						<?php } ?>
							<td><a href="vista_formulario_nota.php?estudiante=<?php echo $est['id']; ?>&periodo=<?php echo $periodo; ?>&curso=<?php echo $curso; ?>"><button class="btn btn-success">Agregar Nota</button></a></td>
							<td><a href="vista_comentario.php?id=<?php echo $est['id']; ?>&curso=<?php echo $curso; ?>&periodo=<?php echo $periodo; ?>"><button class="btn btn-info">Agregar Comentario</button></a></td>
						</tr>
					<?php
						}
					 ?>
				</table>
			</div>
			<?php


				echo "<ul class='pagination text-center'>";
				for($i = 1; $i<=$totalPaginas; $i++){

					if($i == $pagina){
						echo "<li class='disabled'><a>". $i . "</a></li>";
					}else{
						echo "<li><a href='?p=$periodo&c=$curso&pagina=" . $i . "'>". $i . "</a></li>";
					}

				}
				echo "</ul>";
			?>
			<div class="col-xs-12 col-md-6 col-lg-6">
				<a href="../index.php">Volver</a>
			</div>
		</div>
	</div>
</div>


<?php include('../includes/footer.php'); ?>
