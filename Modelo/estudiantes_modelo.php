<?php 

	//Creamos la clase estudiantes

	class Estudiantes{

		private $bd;

		public function __construct(){

			//llamamos a la clase conexion
			require_once('conexion.php');

			$this->bd = Conexion::conectar();
		}

		//Metodo para guardar registrar al estudiante

		public function guardar_estudiante($nombre, $apellido, $curso){

			$consulta1 = $this->bd->query("INSERT INTO estudiante VALUES(NULL, '$nombre', '$apellido', '$curso')");

			if($consulta1->rowCount()){
				return true;
			}else{
				return false;
			}
		}

		public function get_id($nombre, $apellido, $curso){

			$consulta2 = $this->bd->query("SELECT id FROM estudiante WHERE nombre='$nombre' AND apellido='$apellido' AND curso_id='$curso'");

			$id = $consulta2->fetch(PDO::FETCH_ASSOC);

			return $id['id'];
		}

		public function get_estudiantes($id_curso){

			$consulta3 = $this->bd->query("SELECT * FROM estudiante WHERE curso_id='$id_curso'");
			$lista = array();

			while($registro = $consulta3->fetch(PDO::FETCH_ASSOC)){

				$lista[] = $registro;
			}

			return $lista;
		}

		public function obtener_10($empezar, $tamaño, $id_curso){

			$consulta4 = $this->bd->query("SELECT * FROM estudiante WHERE curso_id='$id_curso' LIMIT $empezar, $tamaño");

			$l_estudiantes = array();
			if($consulta4->rowCount()){
				while ($fila = $consulta4->fetch(PDO::FETCH_ASSOC)) {
				
				$l_estudiantes[] = $fila;
				}

			}else{
				return false;
			}
			return $l_estudiantes;
			
		}

		public function total_estudiantes($curso){

			$consulta5 = $this->bd->query("SELECT COUNT(*) FROM estudiante WHERE curso_id=$curso");

			$total = $consulta5->fetch();

			return $total[0];
		}
	}



 ?>