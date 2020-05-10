<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Cursos</title>
		<?php include('../includes/header.php'); ?>
	</head>
	<body>
<div class="container">
	<div class="caja-formulario">
		<div class="centro titulo">
			<h1>IR A UN CURSO</h1>
		</div>
		<div class="formulario">
			<label>Seleccionar el perido: </label>
			<select id="selector_periodo" class="form-control">
				<option>Selecciona una opcion</option>
				<option value="1">Periodo1</option>
				<option value="2">Periodo2</option>
				<option value="3">Periodo3</option>
				<option value="4">Periodo4</option>
			</select>
		</div>
		<div class="formulario">
			<label>Seleccionar el curso: </label>
			<select id="selector_curso" class="form-control" onchange="cambiar_curso(document.getElementById('selector_periodo').value, this.value)">
				<option>Selecciona una opcion</option>
				<option value="1">10-01</option>
				<option value="2">10-02</option>
				<option value="3">10-03</option>
				<option value="4">10-04</option>
				<option value="5">10-05</option>
				<option value="6">11-01</option>
			</select>
		</div>
	</div>

</div>

<?php include('../includes/footer.php'); ?>
