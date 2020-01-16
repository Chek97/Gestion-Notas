<?php 
	
	require_once('../Modelo/procesos_modelo.php');
	require_once('../Modelo/notas_modelo.php');

	$obj_proceso = new Procesos();
	$obj_nota = new Notas();
	if(isset($_POST['agregar_nota'])){

		$id_estudiante = $_POST['estudiante_nota'];
		$id_periodo = $_POST['periodo_nota'];
		$titulo = $_POST['titulo_nota'];
		$calificacion = $_POST['calificacion_nota'];
		$proceso_inicial = $_POST['proceso_nota'];
		$curso = $_POST['curso_nota'];

		$proceso_buscado = $obj_proceso->obtener_proceso_nota($proceso_inicial, $id_estudiante, $id_periodo);

		if($obj_nota->guardar_nota($titulo, $calificacion, $proceso_buscado)){
			
			$total_notas = $obj_nota->obtener_registro_notas($proceso_buscado); //Traera todos las notas
			
			$lista_notas = $obj_nota->obtener_notas($proceso_buscado);

			$suma = 0;

			foreach ($lista_notas as $nota) {
				
				$suma += $nota['calificacion'];
			}

			$suma = round($suma / $total_notas, 2);
			//ahora debemos hacer que mi papa pueda actualizar las notas y la final

			if($obj_proceso->actualizar_nota($suma, $proceso_buscado)){
					
				$lista_nota_proceso = $obj_proceso->obtener_nota_proceso_final($id_estudiante, $id_periodo);
				$total = 0;

				foreach ($lista_nota_proceso as $not) {
					
					$total = $total + $not['nota'];
				}

				$total = round($total / 4, 2);

				if($obj_proceso->actualizar_promedio($total, $id_estudiante, $id_periodo)){
					
					header('location: ../Vista/vista_nota.php?p='.$id_periodo.'&c='.$curso);
				}else{
					echo "lo siento algun paso no debio salir bien";
				}

			}else{
				echo "Algo no se hizo bien";
			}


		}else{
			echo "No se agrego";
		}

	}

	if(isset($_POST['actualizador'])){

		$bandera = false;
		$proceso = $_POST['nombre_proceso'];
		$estudiante_id = $_POST['estudiante'];
		$periodo_id = $_POST['periodo'];
		$curso1 = $_POST['curso'];

		foreach ($_POST['idnot'] as $act) {
			
			$nota_actualizar = $_POST['dato'][$act];
			$id_nota = $_POST['idnot'][$act];

			//Actualizamos las notas
			if($obj_nota->actualizar_nota($nota_actualizar, $id_nota)){

				$bandera = true;
			}else{
				echo "no se actualizo";
			}
		}

		if($bandera == true){

			$id_encontrado = $obj_proceso->obtener_proceso_nota($proceso, $estudiante_id, $periodo_id);//proceso encontrado
			$cuenta = $obj_nota->obtener_registro_notas($id_encontrado);
			$lista_n = $obj_nota->obtener_notas($id_encontrado);
			$suma_notas = 0;
			foreach ($lista_n as $n) {
				
				$suma_notas = $suma_notas + $n['calificacion'];
			}

			$suma_notas = round($suma_notas / $cuenta, 2);

			if($obj_proceso->actualizar_nota($suma_notas, $id_encontrado)){

				$promedio = $obj_proceso->obtener_nota_proceso_final($estudiante_id, $periodo_id);
				$t = 0;
				foreach ($promedio as $p) {
					$t = $t + $p['nota'];
				}

				$t = round($t / 4, 2);
				if($obj_proceso->actualizar_promedio($t, $estudiante_id, $periodo_id)){

					header('location: ../Vista/vista_nota.php?p='.$periodo_id.'&c='.$curso1);
				}else{
					echo "el ultimo paso no lo concreto";
				}
			}else{
				echo "No pudo actualizar el proceso nota";
			}
		}	
	}

 ?>