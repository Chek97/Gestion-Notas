<?php 

	require_once('../Model/estudiantes_modelo.php');
	require_once('../Model/procesos_modelo.php');

	$obj_estudiante = new Estudiantes();
	$obj_proceso = new Procesos();

	//Si guarda un estudiante se ejecuta este condicional
	if(isset($_POST['guardar_estudiante'])){

		$nombre = $_POST['nombre_estudiante'];
		$apellido =  $_POST['apellido_estudiante'];
		$curso = $_POST['selector_curso'];
		//CREAR CONDICIONAL SI ESCOGE OTRA COSA QUE NO ES UN CURSO

		if($obj_estudiante->guardar_estudiante($nombre, $apellido, $curso)){
			
			//Obtengo el id del estudiante que acabo de crear
			$id_estudiante = $obj_estudiante->get_id($nombre, $apellido, $curso);

			//Insertamos los procesos del estudiante creado 
			if($obj_proceso->crear_procesos($id_estudiante)){

				session_start();

				$_SESSION['accion'] = 'info';
				$_SESSION['mensaje'] = 'El estudiante fue creado con exito';

				header('location: ../View/Students/addStudent.php');
			}else{
				session_start();

				$_SESSION['accion'] = 'danger';
				$_SESSION['mensaje'] = 'El los procesos no pudieron ser creados';
				
				header('location: ../View/Students/addStudent.php');
			}

			//header('location: ../Vista/agregar_estudiante.php');
		}else{
			session_start();
			$_SESSION['accion'] = 'danger';
			$_SESSION['mensaje'] = 'El estudiante no pudo ser creado';
				
			header('location: ../View/Students/addStudent.php');
		}
	}
 ?>