<?php 

	class Comentario{

		private $bd;

		public function __construct(){

			require_once('conexion.php');

			$this->bd = Conexion::conectar();
		}

		public function agregar_comentario($comportamiento, $id_estudiante){

			$consulta1 = $this->bd->query("INSERT INTO comportamiento VALUES(NULL, '$comportamiento', $id_estudiante)");

			if($consulta1->rowCount()){

				return true;
			}else{
				return false;
			}
		}

		public function obtener_comentario($id, $tamanoPaginas, $empezar){

			$consulta3 = $this->bd->query("SELECT * FROM comportamiento WHERE estudiante_id='$id' LIMIT $empezar,$tamanoPaginas");
			$consulta2 = $this->bd->query("SELECT * FROM comportamiento WHERE estudiante_id='$id'");
			$lista = array();

			$numFilas = $consulta3->rowCount();
			$totalPaginas = ceil($numFilas / $tamanoPaginas);

			while($registro = $consulta2->fetch(PDO::FETCH_ASSOC)){

				$lista[] = $registro;
			}

			return [$lista, $totalPaginas];
		}

		public function actualizar_comentario($id, $valor){

			$consulta3 = $this->bd->query("UPDATE comportamiento SET comentario='$valor' WHERE id=$id");
			
			return $consulta3->rowCount() ? true : false;
		}
	}
 ?>