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
				<input type="submit" class="btn boton-principal" id="agregar_comentario" name="agregar_comentario" value="Guardar">
				<button type="button" onclick="limpiarCaja()" name="button">Limpiar</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	function limpiarCaja(){
		document.getElementById('caja').value = '';
	}

	document.getElementById('agregar_comentario').addEventListener('click', function(e){
		var texto = document.getElementById('caja').value;
		var cuenta = texto.length;
		if(cuenta > 250){
			console.log("Te excediste de caracteres");
			e.preventDefault();
		}
	});

</script>


<!--COLOCAR UN CONDICIONAL PARA QUE NO SE PASE DE 255 CARACTERES EN EL TEXTAREA-->

<?php include('../includes/footer.php'); ?>
