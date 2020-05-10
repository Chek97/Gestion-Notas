<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Comentarios</title>
		<?php include('../includes/header.php'); ?>
	</head>
	<body>
<?php

	$id_estudiante = $_GET['id'];
	$id_curso = $_GET['curso'];
	$id_periodo = $_GET['periodo'];
 ?>
<div class="container">
	<div class="centro titulo-aparte">
		<h1>Agregar Comentario</h1>
	</div>
	<div class="formulario-actualizar"  style="height: 200px">
		<form action="../Controlador/comentario_controlador.php" method="POST">
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
				<input type="submit" class="btn boton-principal" name="agregar_comentario" value="Guardar">
			</div>
		</form>
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

<?php include('../includes/footer.php'); ?>
