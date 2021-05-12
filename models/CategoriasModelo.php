<?php 
require_once 'Conexion.php';
class CategoriasModelo {
	public function listarCategoriasModel () {
		//creamos una variabe que contiene la conexion
		$conexion = Conexion::conectar();
		//creamos una variable con la consulta
		$sql = "SELECT * FROM categorias";
		//Ejecutamos en la conexion la consulta y guardamos el resultado de la consulta en una variable
		$resultado = $conexion->query($sql);
		//retornamos el resultado de la consulta
		return $resultado;
	}
}