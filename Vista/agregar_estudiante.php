<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Estudiante</title>
		<?php include('../includes/header.php'); ?>
	</head>
	<body>

		<div class="container">
			<div class="caja-formulario">
				<header class="centro titulo">
					<h1>AGREGAR ESTUDIANTE</h1>
				</header>
				<div class="formulario">
					<form action="../Controlador/estudiante_controlador.php" method="POST">
						<div class="form-group caja-input">
							<label>Nombre:</label>
							<br>
							<input class="form-control" type="text" name="nombre_estudiante" required placeholder="henry">
						</div>
						<div class="form-group caja-input">
							<label>Apellido:</label>
							<br>
							<input class="form-control" type="text" name="apellido_estudiante" required placeholder="checa">
						</div>
						<div class="form-group caja-input">
							<label>Curso:</label>
							<select id="selector_curso" class="form-control" name="selector_curso">
								<option required>Selecciona un curso</option>
								<option value="1">9-05</option>
								<option value="2">9-06</option>
								<option value="3">10-01</option>
								<option value="4">10-02</option>
								<option value="5">10-03</option>
								<option value="6">10-04</option>
							</select>
						</div>
						<div class="caja-input">
							<input type="submit" id="botonValidar" name="guardar_estudiante" value="Agregar Estudiante" class="btn boton-principal">
						</div>
					</form>
				</div>
			</div>

		</div>
		<script type="text/javascript">
		var formularioEstudiante = document.getElementById("botonValidar").addEventListener('click', function(event){
			var cajaTexto = document.getElementById('selector_curso').value;
			if(cajaTexto === "Selecciona un curso"){
				event.preventDefault();
				alert("No has seleccionado ningun curso, porfavor intentalo otra vez");
			}
		});
		</script>

		<?php include('../includes/footer.php'); ?>
