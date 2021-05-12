<?php 
// rescatando los valores recibidos por medio de POST
require_once '../models/UsuariosModelo.php';

$usuario = $_POST["usuario"];
$password = $_POST["password"];


$respuesta = UsuariosModelo::LoginUsuarioModelo($usuario, $password);

if ($respuesta->num_rows == 1) {
	$fila = $respuesta->fetch_assoc();
	//Iniciamos Sesión
	session_start();
	//Creamos una variable de sesión que contenga el nombre y apellido usuario
	$_SESSION["nombreCompleto"] = $fila["nombreUsuario"] . " " . $fila["apellidoUsuario"];
	$_SESSION["autenticado"] = true;
	$_SESSION["idUsuario"] = $fila["idUsuario"];
	echo 'ok';
} else {
	echo 'error';
}

?>