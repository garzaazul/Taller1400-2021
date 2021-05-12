<?php 

require_once 'config.php';

class Conexion {

	public function conectar () {
		$con = new mysqli(SERVER, USER, PASS, DB);

		return $con;
	}
}

