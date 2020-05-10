<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Gestion Maria</title>
		<?php include('../includes/header.php'); ?>
	</head>
	<body>
		<div class="container centro">
				<div class="caja-titulo">
					<h1>GESTION MARIA OCCIDENTE</h1>
				</div>
				<div class="texto">
					<p>A continuacion seleccione que tipo de accion desea tomar:</p>
				</div>
				<div class="caja-botones">
					<a href="agregar_estudiante.php" class="enlace"><button class="btn boton">Agregar Estudiantes</button></a>
					<a href="agregar_nota.php" class="enlace"><button class="btn boton">Agregar Notas</button></a>
					<a href="informes.php" class="enlace"><button class="btn boton">Ver Informes</button></a>
				</div>
		</div>
<?php include('../includes/footer.php'); ?>
