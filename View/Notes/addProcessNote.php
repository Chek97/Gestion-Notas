<?php include_once('../Includes/header.php'); 
	$periodo = $_GET['periodo'];
	$curso = $_GET['curso'];
?>
<header class="caja-titulo text-center">
	<h1><span><a href="./studentsNote.php?p=<?php echo($periodo)?>&c=<?php echo($curso)?>">volver </a></span>Agregar Nota</h1>
</header>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-lg-6 col-lg-offset-3 col-sm-offset-3">
			<div class="formulario-actualizar">
				<form action="../../Controller/notas_controlador.php" method="POST">

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
						<input type="submit" name="agregar_nota" value="Agregar" class="btn boton-principal btn-block">
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>



<?php include_once('../Includes/footer.php'); ?>