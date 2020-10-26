<?php include_once('../Includes/header.php'); ?>

<div class='container'>
    <div>
        <h1>COMENTARIOS DEL ESTUDIANTE</h1>
    </div>
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

                        $comentariosEstudiante = $obj_comentario->obtener_comentario($_GET['id']);

                        if(count($comentariosEstudiante) == 0){
                            echo '<div class="alert alert-warning" role="alert">No hay comentarios para este estudiante</div>';
                        }else{
                            foreach($comentariosEstudiante as $comEst){ ?>

                            <tr>
                                <td><?php echo($comEst['comentario']); ?></td>
                                <td><a href="editComment.php?id=<?php echo $comEst['id']; ?>"><button class='btn btn-success'>Editar</button></a></td>
                            </tr>                    
                <?php       }
                        }
                    }catch (Exception $e) {
                        echo "Al parecer hay un error al cargar recursos en " . $e->getLine();
                    }

                ?>
            </table>
            <a href="addComment.php?id=<?php echo $_GET['id']; ?>&curso=<?php echo $_GET['curso']; ?>&periodo=<?php echo $_GET['periodo']; ?>"><button class='btn btn-info'>Agregar Comentario</button></a>
        </div>
    </div>
</div>



<?php include_once('../Includes/footer.php'); ?>