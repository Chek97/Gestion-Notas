<?php include('../Includes/header.php'); 

	$id_estudiante = $_GET['id'];
	$periodo = $_GET['periodo'];
	$nombre = $_GET['nomp'];

	require_once('../../Controller/procesos_controlador.php');

	$id = $obj_proceso->obtener_proceso_nota($nombre, $id_estudiante, $periodo);//Tengo el dato del proceso

	$lista_notas = $obj_nota->get_notas($id);

?>
<div class="container">
	<div class="centro titulo-aparte" style="background-color: #3C7C4B;">
		<h1>ACTUALIZAR NOTAS</h1>
	</div>	
	<div class="formulario-actualizar" style="padding: 20px;">
		<form action="../../Controller/notas_controlador.php" method="POST">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Notas</th>
					</tr>
				</thead>
				<?php foreach ($lista_notas as $nota) {
				?>
				<tr>
					<input type="hidden" name="nombre_proceso" value="<?php echo $_GET['nomp']; ?>">
					<input type="hidden" name="estudiante" value="<?php echo $_GET['id']; ?>">
					<input type="hidden" name="periodo" value="<?php echo $_GET['periodo']; ?>">
					<input type="hidden" name="curso" value="<?php echo $_GET['curso']; ?>">
					<input type="hidden" value="<?php echo $nota['id']; ?>" name="idnot[<?php echo $nota['id']; ?>]">
					<td><?php echo $nota['titulo']; ?></td>
					<td><input type="number" step="any" class="form-control" value="<?php echo $nota['calificacion']; ?>" name="dato[<?php echo $nota['id']; ?>]"></td>

				</tr>
			<?php } ?>
			</table>
			<input type="submit" name="actualizador" value="Actualizar" class="btn boton-principal">	
		</form>
		
	</div>	
</div>


<?php include('../Includes/footer.php'); ?>