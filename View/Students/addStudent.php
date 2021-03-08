<?php include('../Includes/header.php'); ?>

<div class="container">
	<div class="caja-formulario">
		<div class="centro titulo">
			<h1>AGREGAR ESTUDIANTE</h1>
		</div>
		<div class="formulario">
			<form action="../../Controller/estudiante_controlador.php" method="POST">
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
						<option>Selecciona un curso</option>
						<option value="1">9-05</option>
						<option value="2">9-06</option>
						<option value="3">10-01</option>
						<option value="4">10-02</option>
						<option value="5">10-03</option>
						<option value="6">10-04</option>
					</select>
				</div>
				<div class="caja-input">
					<input type="submit" name="guardar_estudiante" value="Guardar" class="btn boton-principal">
				</div>
			</form>
		</div>
	</div>
	
</div>

<?php include('../Includes/footer.php'); ?>