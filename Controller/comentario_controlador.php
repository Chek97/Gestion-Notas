<?php 
	
	require_once('../../Model/comentarios_modelo.php');

	$obj_comentario = new Comentario();

	if(isset($_POST['agregar_comentario'])){

		$comentario = $_POST['comentario'];
		$id_estudiante = $_POST['id_comentario'];
		$id_curso = $_POST['id_curso'];
		$id_periodo = $_POST['id_periodo'];

		if($obj_comentario->agregar_comentario($comentario, $id_estudiante)){

			header('location: ../View/Notes/studentsNote.php?p='.$id_periodo.'&c='.$id_curso);
		}else{
			echo "Algo no salio bien";
		}
	}	


 ?>