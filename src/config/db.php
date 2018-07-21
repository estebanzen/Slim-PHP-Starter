<?php
	class db {

		private $host = 'localhost';
		private $usuario = 'root';
		private $password = '123456';
		private $base = 'slim_starter';

		// Conectar Base de Datos

		public function conectar () {
			$conexion_mysql = "mysql:host=$this->host;dbname=$this->base";
			// die('sdv');
			$conexion_BD = new PDO($conexion_mysql, 'root', '123456');
			$conexion_BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// esta linea arregla la codificación
			$conexion_BD -> exec("set names utf8");

			return $conexion_BD;
		}

	}

?>