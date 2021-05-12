<?php 

class ArticulosController {


	static public function listarArticulosCtl () {

		$resultado = ArticulosModelo::ListarArticulosModel();

		return $resultado;
	}
	static public function listarArticulosPorCategoria ($idCategoria, $order) {

		$resultado = ArticulosModelo::ListarArticulosPorCategoriaModel($idCategoria, $order);

		return $resultado;
	}
	static public function listarArticulosPorPalabraClave($palabraClave) {

		$resultado = ArticulosModelo::listarArticulosPorPalabraClaveModel($palabraClave);

		return $resultado;

	}
	static public function ListarArticulosPorUsuario ($idUsuario) {
		$resultado = ArticulosModelo::ListarArticulosPorUsuarioModelo($idUsuario);
		return $resultado;
	}


}


?>