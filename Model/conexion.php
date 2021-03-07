<?php 

	//Creamos la clase conexion

	class Conexion{

		public static function conectar(){

			try{

				$conexion = new PDO('mysql:host=localhost; dbname=gestionMaria', 'root', '');

				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$conexion->exec('SET CHARACTER SET utf8');

				return $conexion;
			
			}catch(Exception $e){

				die('Conexion fallida: ' . $e->getLine());
			}

		}
	}




 ?>