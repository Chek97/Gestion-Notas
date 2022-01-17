<?php include('../Includes/header.php');

	$id_estudiante = $_GET['id'];
	$id_curso = $_GET['curso'];
	$id_periodo = $_GET['periodo'];
 ?>
<header class="caja-titulo text-center">
    <h1><span><a href="./showComments.php?id=<?php echo($id_estudiante)?>&curso=<?php echo($id_curso)?>&periodo=<?php echo($id_periodo);?>">volver </a></span>Agregar Comentario</h1>
</header>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-lg-6 col-lg-offset-3 col-sm-offset-3">
			<div class="formulario-actualizar"  style="height: 200px">
				<form action="../../Controller/comentario_controlador.php" method="POST">
					<input type="hidden" name="id_comentario" value="<?php echo $id_estudiante; ?>">
					<input type="hidden" name="id_curso" value="<?php echo $id_curso; ?>">
					<input type="hidden" name="id_periodo" value="<?php echo $id_periodo; ?>">
					<div class="form-group caja-input1">
						<label>Comentario para el estudiante</label>
						<textarea class="form-control" id="caja" onkeyup="contar()" required name="comentario"></textarea>
						<div id="espacio">
							
						</div>
					</div>
					<div style="text-align: center;">
						<input type="submit" class="btn boton-principal btn-block" name="agregar_comentario" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
		
		var contador=0;
		


	function contar(e){

		
		if(contador <= 255){

			contador += 1;
			console.log(contador);
		}else{

			
			//ARREGLAR ESTE ULTIMO PASO
			alert('te excediste con los caracteres, reducelos porfavor');
		}
	}

	function limpiarCaja(){
		document.getElementById('caja').value = '';
	}

	limpiarCaja();

</script>


<!--COLOCAR UN CONDICIONAL PARA QUE NO SE PASE DE 255 CARACTERES EN EL TEXTAREA-->

<?php include('../Includes/footer.php'); ?>