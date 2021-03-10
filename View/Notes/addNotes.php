<?php include('../Includes/header.php'); ?>
<header class="caja-titulo text-center">
	<h1><span><a href="../../index.php">z </a></span>IR A UN CURSO</h1>
</header>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-lg-6 col-lg-offset-3 col-sm-offset-3">
			<div class="caja-formulario">
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
						<option value="1">9-05</option>
						<option value="2">9-06</option>
						<option value="3">10-01</option>
						<option value="4">10-02</option>
						<option value="5">10-03</option>
						<option value="6">10-04</option>
					</select>	
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../Includes/footer.php'); ?>