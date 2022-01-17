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

		public function get_estudiantes($id_curso, $tamanoPaginas, $empezar){

			$consulta3 = $this->bd->query("SELECT * FROM estudiante WHERE curso_id='$id_curso' LIMIT $empezar,$tamanoPaginas");
			$consulta4 = $this->bd->query("SELECT * FROM estudiante WHERE curso_id='$id_curso'");
			$lista = array();

			$numFilas = $consulta4->rowCount();
			$totalPaginas = ceil($numFilas / $tamanoPaginas);

			while($registro = $consulta3->fetch(PDO::FETCH_ASSOC)){

				$lista[] = $registro;
			}

			return [$lista, $totalPaginas];
		}
	}



 ?>