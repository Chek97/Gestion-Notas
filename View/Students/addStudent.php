<?php include('../Includes/header.php'); ?>
<header class="caja-titulo  text-center">
	<h1><span><a href="../../index.php">z </a></span>AGREGAR ESTUDIANTE</h1>
</header>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-12">
			<div class="formulario">
				<?php  
					session_start();
					if(isset($_SESSION['accion'])){
						echo("
							<div class='alert alert-" . $_SESSION['accion'] . " role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							". $_SESSION['mensaje'] . "
							</div>			
						");
						session_destroy();
					}
				
				?>
				<div class="texto" style="color: white;">
					<p>Complete el siguiente formulario:</p>
				</div>
				<form action="../../Controller/estudiante_controlador.php" method="POST">
					<div class="form-group caja-input">
						<label style="color: white;">Nombre:</label>
						<br>
						<input class="form-control" type="text" name="nombre_estudiante" required placeholder="henry">
					</div>
					<div class="form-group caja-input">
						<label style="color: white;">Apellido:</label>
						<br>
						<input class="form-control" type="text" name="apellido_estudiante" required placeholder="checa">
					</div>
					<div class="form-group caja-input">
						<label style="color: white;">Curso:</label>
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
						<input type="submit" name="guardar_estudiante" value="Guardar" class="btn boton-principal btn-block">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include('../Includes/footer.php'); ?>