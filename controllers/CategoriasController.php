<?php 
class CategoriasController {
	public function listarCategoriasCtl () {
		$result = CategoriasModelo::listarCategoriasModel();

		return $result;
	}
}

