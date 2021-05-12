<?php 

require_once 'Conexion.php';

class UsuariosModelo {

	static public function LoginUsuarioModelo($usuario, $password) {

		$conexion = Conexion::conectar();
		$passwordEncriptada = MD5($password);
		$sql = "SELECT * FROM usuarios WHERE correoUsuario = '$usuario' AND passwordUsuario = '$passwordEncriptada' ";
		$resultado = $conexion->query($sql);
		return $resultado;

	}
}