<?php include('../Includes/header.php'); ?>
<header class="caja-titulo text-center">
	<h1>GESTION MARIA OCCIDENTE</h1>	
</header>
<div class="container text-center">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-12">
			<div class="texto">
				<p>A continuacion seleccione que tipo de accion desea tomar:</p>
			</div>
		</div>
		<div>
			<div class="col-xs-12 col-sm-4 col-lg-4 caja-botones">
				<a href="../Students/addStudent.php" class="enlace">
					<button class="btn boton"><img class="imagen-boton" src="../../Public/img/anadir.png" alt="estudiantes"> <br>	Agregar Estudiantes</button>
				</a>
			</div>
			<div class="col-xs-12 col-sm-4 col-lg-4 caja-botones">
				<a href="../Notes/addNotes.php" class="enlace">
					<button class="btn boton"><img class="imagen-boton" src="../../Public/img/notas.png" alt="estudiantes"> <br>Agregar Notas</button>
				</a>
			</div>
			<div class="col-xs-12 col-sm-4 col-lg-4 caja-botones">
				<a href="../Reports/Reports.php" class="enlace">
					<button class="btn boton"><img class="imagen-boton" src="../../Public/img/documento.png" alt="estudiantes"> <br>Ver Informes</button>
				</a>
			</div>
		</div>
	</div>
</div>


<?php include('../Includes/footer.php'); ?>