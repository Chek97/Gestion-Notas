<?php include_once('../Includes/header.php'); 
    $periodo = $_GET['periodo'];
	$curso = $_GET['curso'];
?>
<header class="caja-titulo text-center">
    <h1><span><a href="./studentsNote.php?p=<?php echo($periodo)?>&c=<?php echo($curso)?>">volver </a></span>COMENTARIOS DEL ESTUDIANTE</h1>
</header>
<div class='container'>
    <div class='row'>
        <div class='table-responsive'>
            <table class='table table-bordered' style="margin-top: 15px;">
            <?php
                try {
                    require_once('../../Controller/comentario_controlador.php');

                    $comentariosEstudiante = $obj_comentario->obtener_comentario($_GET['id']);

                    if(count($comentariosEstudiante) == 0){ 
                        echo '<div class="alert alert-warning m-5" style="margin-top: 15px;" role="alert">No hay comentarios para este estudiante</div>';
                    }else{
                        echo("<tr>
                            <th>Comentario</th>
                            <th>Opciones</th>
                        </tr>");
                        foreach($comentariosEstudiante as $comEst){ ?>
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
            <div class='text-center'>
                <a href="addComment.php?id=<?php echo $_GET['id']; ?>&curso=<?php echo $_GET['curso']; ?>&periodo=<?php echo $_GET['periodo']; ?>"><button class='btn btn-info'>Agregar Comentario</button></a>
            </div>
        </div>
    </div>
</div>



<?php include_once('../Includes/footer.php'); ?>