<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Gestion Maria</title>
		<?php include('../includes/header.php'); ?>
	</head>
	<body>
		<div class="container text-center">
			<!--ARREGLAR ESTO DE FORMA RESPONSIVA -->
			<div class="row">
					<div class="col-xs-12">
						<header class="caja-titulo">
							<h1>GESTIONADOR <span class="mo"> MO</span></h1>
						</header>
					</div>
					<div class="col-xs-12">
							<a href="agregar_estudiante.php" class="enlace"><button class="btn boton caja-botones">Agregar Estudiantes</button></a>
							<a href="agregar_nota.php" class="enlace"><button class="btn boton caja-botones">Agregar Notas</button></a>
							<a href="informes.php" class="enlace"><button class="btn boton caja-botones">Ver Informes</button></a>
					</div>
			</div>
		</div>
<?php include('../includes/footer.php'); ?>
