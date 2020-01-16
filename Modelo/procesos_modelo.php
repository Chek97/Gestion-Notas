<?php 

	//Creamos la clase proceso
	class Procesos{

		private $bd;

		public function __construct(){

			//llamamos a la clase conexion
			require_once('conexion.php');

			$this->bd = Conexion::conectar();
		}

		//Metodo para guardar registrar al estudiante

		public function crear_procesos($id){

			$periodo = 1;
			$procesos = array('comprension lectora', 'argumentacion', 'solucion de problemas', 'socio-personal', 'promedio');
			//Crear el ciclo
			while($periodo <= 4){

				for ($i=0; $i < 5; $i++) { 
					$consulta1 = $this->bd->query("INSERT INTO proceso VALUES(NULL, '$procesos[$i]', 0, '$id', $periodo)");	
				}
				$periodo++;
			}
			
			if($consulta1->rowCount()){
				return true;
			}else{
				return false;
			}
		}

		public function get_procesos($id_estudiante, $id_periodo){

			$consulta2 = $this->bd->query("SELECT id,nombre,nota FROM proceso WHERE estudiante_id=$id_estudiante AND periodo_id=$id_periodo");

			$lista = array();

			while($registro = $consulta2->fetch(PDO::FETCH_ASSOC)){

				$lista[] = $registro;
			}

			return $lista;
		}

		public function obtener_proceso_nota($proceso, $id_estudiante, $id_periodo){

			$consulta3 = $this->bd->query("SELECT id FROM proceso WHERE nombre='$proceso' AND estudiante_id=$id_estudiante AND periodo_id=$id_periodo");

			$id_proceso = $consulta3->fetch(PDO::FETCH_ASSOC);

			return $id_proceso['id'];
		}

		public function actualizar_nota($nota, $id_proceso){

			$consulta4 = $this->bd->query("UPDATE proceso SET nota=$nota WHERE id=$id_proceso");

			if($consulta4->rowCount()){
				return true;
			}else{
				return false;
			}
		}

		public function obtener_nota_proceso_final($id_estudiante, $id_periodo){

			$consulta5 = $this->bd->query("SELECT * FROM proceso WHERE estudiante_id=$id_estudiante AND periodo_id=$id_periodo AND nombre !='promedio'");

			$lista = array();

			while($registro = $consulta5->fetch(PDO::FETCH_ASSOC)){

				$lista[] = $registro;
			}

			return $lista;
		}

		public function actualizar_promedio($valor, $id_estudiante, $id_periodo){

			$consulta6 = $this->bd->query("UPDATE proceso SET nota=$valor WHERE estudiante_id=$id_estudiante AND periodo_id=$id_periodo AND nombre='promedio'");

			if($consulta6->rowCount()){

				return true;
			}else{
				return false;
			}
		}
	}



 ?>