<?php include('../Includes/header.php'); 

	$id_estudiante = $_GET['id'];
	$periodo = $_GET['periodo'];
	$nombre = $_GET['nomp'];
	$curso = $_GET['curso'];

	require_once('../../Controller/procesos_controlador.php');

	$id = $obj_proceso->obtener_proceso_nota($nombre, $id_estudiante, $periodo);//Tengo el dato del proceso

	$lista_notas = $obj_nota->get_notas($id);

?>
<header class="caja-titulo  text-center">
	<h1><span><a href="./studentsNote.php?p=<?php echo($periodo)?>&c=<?php echo($curso)?>">volver</a></span> ACTUALIZAR NOTAS</h1><!--mirar que valores pide para volver -->
</header>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-lg-6 col-lg-offset-3 col-sm-offset-3">
			<div class="formulario" style="padding: 20px;">
				<form action="../../Controller/notas_controlador.php" method="POST">
					<table class="table">
						<thead>
							<tr>
								<th>Notas</th>
							</tr>
						</thead>
						<?php foreach ($lista_notas as $nota) {?>
						<tr>
							<input type="hidden" name="nombre_proceso" value="<?php echo $_GET['nomp']; ?>">
							<input type="hidden" name="estudiante" value="<?php echo $_GET['id']; ?>">
							<input type="hidden" name="periodo" value="<?php echo $_GET['periodo']; ?>">
							<input type="hidden" name="curso" value="<?php echo $_GET['curso']; ?>">
							<input type="hidden" value="<?php echo $nota['id']; ?>" name="idnot[<?php echo $nota['id']; ?>]">
							<td><label class='formText'># <?php echo $nota['titulo']; ?></label></td>
							<td><input type="number" step="any" class="form-control" value="<?php echo $nota['calificacion']; ?>" name="dato[<?php echo $nota['id']; ?>]"></td>

						</tr>
					<?php } ?>
					</table>
					<div class="text-center">
						<input type="submit" name="actualizador" value="Actualizar" class="btn boton-principal btn-block">	
					</div>
				</form>
			</div>
		</div>
	</div>		
</div>
<?php include('../Includes/footer.php'); ?>
