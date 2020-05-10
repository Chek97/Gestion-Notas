<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Nota</title>
		<?php include('../includes/header.php'); ?>
	</head>
	<body>
<div class="container">
	<div class="centro titulo-aparte">
		<h1>Agregar Nota</h1>
	</div>
	<div class="formulario-actualizar">
		<form action="../Controlador/notas_controlador.php" method="POST">

				<input type="hidden" name="estudiante_nota" class="form-control" value="<?php echo $_GET['estudiante']; ?>">
				<input type="hidden" name="periodo_nota" class="form-control" value="<?php echo $_GET['periodo']; ?>">
				<input type="hidden" name="curso_nota" class="form-control" value="<?php echo $_GET['curso']; ?>">

			<div class="form-group caja-input1">
				<label>Titulo: </label>
				<input type="text" name="titulo_nota" required placeholder="laboratorio" class="form-control">
			</div>
			<div class="form-group caja-input1">
				<label>Calificacion: </label>
				<input type="number" step="any" required placeholder="3.0" name="calificacion_nota" class="form-control">
			</div>
			<div class="form-group caja-input1">
				<label>Proceso:</label>
				<select id="selector_proceso" class="form-control" name="proceso_nota">
					<option>Selecciona un curso</option>
					<option value="comprension lectora">Comprension Lectora</option>
					<option value="argumentacion">Argumentacion</option>
					<option value="solucion de problemas">Solucion de problemas</option>
					<option value="socio-personal">Socio-personal</option>
				</select>
			</div>
			<div style="text-align: center;">
				<input type="submit" name="agregar_nota" value="Agregar" class="btn boton-principal">
			</div>

		</form>
	</div>
</div>
<?php include_once('../includes/footer.php'); ?>
