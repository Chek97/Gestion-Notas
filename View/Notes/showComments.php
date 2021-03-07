<?php include_once('../Includes/header.php'); 
    $periodo = $_GET['periodo'];
	$curso = $_GET['curso'];
    $pagina = $_GET['pagina'];
?>
<header class="caja-titulo text-center">
    <h1><span><a href="./studentsNote.php?p=<?php echo($periodo)?>&c=<?php echo($curso)?>">volver </a></span>COMENTARIOS DEL ESTUDIANTE</h1>
</header>
>>>>>>> develop
<div class='container'>
    <div class='row'>
        <div class='table-responsive'>
            <table class='table table-bordered'>
                <tr>
                    <th>Comentario</th>
                    <th>Opciones</th>
                </tr>
                <?php
                    try {
                        require_once('../../Controller/comentario_controlador.php');

                        $tamanoPaginas = 10;

					    $empezar = ($pagina - 1) * $tamanoPaginas;

                        $comentariosEstudiante = $obj_comentario->obtener_comentario($_GET['id'], $tamanoPaginas, $empezar);

                        if(count($comentariosEstudiante[0]) == 0){
                            echo '<div class="alert alert-warning" role="alert">No hay comentarios para este estudiante</div>';
                        }else{
                            foreach($comentariosEstudiante[0] as $comEst){ ?>

                            <tr>
                                <td><?php echo($comEst['comentario']); ?></td>
                                <td><a href="editComment.php?id=<?php echo $comEst['id'];?>&c=<?php echo($curso)?>&p=<?php echo($periodo)?>"><button class='btn btn-success'>Editar</button></a></td>
                            </tr>                    
                <?php       }
                        }
                    }catch (Exception $e) {
                        echo "Al parecer hay un error al cargar recursos en " . $e->getLine();
                    }

                ?>
            </table>
        </div>
        <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center;">
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<?php for($i=1; $i <= $comentariosEstudiante[1]; $i++){
						if($pagina == $i){ ?>
							<li class="active"><a href="###"><?php echo($i)?><span class="sr-only">(current)</span></a></li>
					<?php }else{ ?>
						<li><a href="?p=<?php echo($periodo)?>&c=<?php echo($curso)?>&pagina=<?php echo($i)?>"><?php echo($i)?></a></li>
					<?php }}?>
				</ul>
			</nav>
            <div class='text-center'>
                <a href="addComment.php?id=<?php echo $_GET['id']; ?>&curso=<?php echo $_GET['curso']; ?>&periodo=<?php echo $_GET['periodo']; ?>"><button class='btn btn-info'>Agregar Comentario</button></a>
            </div>
            <br>
			<a href="../../index.php" class="btn btn-info">Volver</a>
		</div>
    </div>
</div>



<?php include_once('../Includes/footer.php'); ?>