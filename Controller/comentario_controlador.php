<?php 
	
	require_once('../../Model/comentarios_modelo.php');

	$obj_comentario = new Comentario();

	if(isset($_POST['agregar_comentario'])){

		$comentario = $_POST['comentario'];
		$id_estudiante = $_POST['id_comentario'];
		$id_curso = $_POST['id_curso'];
		$id_periodo = $_POST['id_periodo'];

		if($obj_comentario->agregar_comentario($comentario, $id_estudiante)){

			header('location: ../View/Notes/showComments.php?id='.$id_estudiante.'&curso='.$id_curso.'&periodo=' .$id_periodo);
		}else{
			echo "Algo no salio bien";
		}
	}

	if(isset($_POST['editar_comentario'])){
		
		if($obj_comentario->actualizar_comentario($_POST['id_comentario'], $_POST['comentario'])){
			header('location: ../View/Notes/editComment.php?id='.$id_estudiante);
		}else{
			echo 'No se actualizo el comentario';
		}
	}

 ?>