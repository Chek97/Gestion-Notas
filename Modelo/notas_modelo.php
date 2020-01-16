<?php 

	class Notas{

		private $bd;

		public function __construct(){

			require_once('conexion.php');

			$this->bd = Conexion::conectar();
		}

		public function guardar_nota($titulo, $calificacion, $id_proceso){

			$consulta1 = $this->bd->query("INSERT INTO nota VALUES(NULL, '$titulo', $calificacion, $id_proceso)");

			if($consulta1->rowCount()){
				return true;
			}else{
				return false;
			}

		}

		public function obtener_registro_notas($proceso_id){

			$consulta2 = $this->bd->query("SELECT COUNT(*) FROM nota WHERE proceso_id=$proceso_id");

			$total = $consulta2->fetch();

			return $total[0];
		}

		public function obtener_notas($proceso_id){

			$consulta3 = $this->bd->query("SELECT calificacion FROM nota WHERE proceso_id=$proceso_id");
			$lista = array();

			while($registro = $consulta3->fetch(PDO::FETCH_ASSOC)){

				$lista[] = $registro;
			}

			return $lista;
		}

		public function get_notas($proceso_id){

			$consulta4 = $this->bd->query("SELECT * FROM nota WHERE proceso_id=$proceso_id");
			$lista = array();

			while($registro = $consulta4->fetch(PDO::FETCH_ASSOC)){

				$lista[] = $registro;
			}

			return $lista;
		}

		public function actualizar_nota($valor, $id_nota){

			$consulta5 = $this->bd->query("UPDATE nota SET calificacion=$valor WHERE id=$id_nota");

			if($consulta5->rowCount()){

				return true;
			}else{
				return false;
			}
		}
	}




 ?>