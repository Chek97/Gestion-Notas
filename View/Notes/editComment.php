<?php include('../Includes/header.php'); 
    $curso = $_GET['c'];
    $periodo = $_GET['p'];
?>
<header class="caja-titulo text-center">
    <h1><span><a href="./showComments.php?id=<?php echo($_GET['id'])?>&curso=<?php echo($curso)?>&periodo=<?php echo($periodo);?>">volver </a></span>Editar Comentario</h1>
</header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-6 col-lg-offset-3 col-sm-offset-3">
                <div class="formulario-actualizar"  style="height: 200px">
                    <form action="../../Controller/comentario_controlador.php" method="POST">
                        <input type="hidden" name="id_comentario" value="<?php echo $_GET['id']; ?>">
                        <div class="form-group caja-input1">
                            <label>Comentario para el estudiante</label>
                            <textarea class="form-control" id="caja" onkeyup="contar()" required name="comentario"></textarea>
                            <div id="espacio">
                                
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <input type="submit" class="btn boton-principal" name="editar_comentario" value="Guardar">
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