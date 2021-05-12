<!DOCTYPE html>
<html lang="en">
<head>
	<base href="views/">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MarketPlace - Compra y vende lo que quieras</title>
	
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/d5ff5de35b.js"></script>
	<link rel="stylesheet" href="dist/css/estilos.css">
</head>
<body>

	<?php 
		session_start();
		require_once "header.php"; 
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 p-4">
				
				<form id="formBuscar">
					<input type="search" placeholder="Ej. Bicicleta aro 26" name="palabraClave" class="form-control" required>
					<div class="d-grid mt-2">
						<button type="submit" class="btn btn-outline-primary">
							<i class="fas fa-search"></i> Buscar
						</button>	
					</div>
				</form>
				<hr>
				<form id="formFiltros">
					<select value="4" name="categorias" class="form-select" required>
						<option value="">--Seleccione Categoria --</option>
						<?php 
							$resultado = CategoriasController::listarCategoriasCtl();

							while($fila = $resultado->fetch_assoc()) {
								echo '<option value="' . $fila["idCategoria"] . '">' . $fila["nombreCategoria"] . '</option>';
							}
						?>

					</select>
					<select name="order" class="form-select mt-2" required>
						<option value="asc">Ordenar menor precio</option>
						<option value="desc">Ordenar mayor precio</option>
					</select>
					<div class="d-grid mt-2">
						<button type="submit" class="btn btn-outline-primary">
							<i class="fas fa-search"></i> Buscar
						</button>	
					</div>
				</form>

			</div>
			<div class="col-lg-9">
				<div class="row p-4">

					<?php 
					//number_format(Numero entero, cantidad Decimales, simbolo decimal, simbolo seperador de miles)

					//rescatando valores o parametros que viajan por la URL
					// $_GET["nombreParametro"]
					// isset(variable) = sirve para validar si una variable se encuentra o no inicializada. En otras palabras, pregunta si la variable existe.
					if ( isset($_GET["categorias"]) ) {

						$idCategoria = $_GET["categorias"];
						$order = $_GET["order"];

						$articulos = ArticulosController::listarArticulosPorCategoria($idCategoria, $order);
					} else if ( isset($_GET["palabraClave"])) {

						$palabraClave = $_GET["palabraClave"];

						$articulos = ArticulosController::listarArticulosPorPalabraClave($palabraClave);

					}
					else {
						$articulos = ArticulosController::listarArticulosCtl();
					

					}



					if ($articulos->num_rows == 0) {

						echo '<div class="alert alert-warning" role="alert">
							  No se encontraron resultados para esta búsqueda
							</div>';

					} else {

						
						
						if (isset($_GET["categorias"]) || isset($_GET["palabraClave"]) ) {

							echo '<div class="alert alert-info" role="alert">
							  Se encontraron ' . $articulos->num_rows . '  resultados para esta búsqueda
							</div>';

						} else {
							echo '<div class="alert alert-info" role="alert">' .$articulos->num_rows . ' artículos publicados hasta el día hoy </div>';
						}


						while ( $fila = $articulos->fetch_array() ) {
						$disponibilidad = ($fila[3] == 1) ? "Disponible": "Agotado";
						$clase = ($fila[3] == 1)? "disponible" : "agotado";
						echo '<div class="col-12 col-lg-3 col-md-6 g-2 d-flex">
						<div class="card">
							<div class="disponibilidadArticulo ' .$clase. '">
								' . $disponibilidad . '
							</div>
						  <img src=" '. $fila[4]. '" class="card-img-top" alt="...">
						  <div class="card-body">
						    <h5 class="card-title mb-0">' . $fila[1] . '</h5>
						    <p class="card-text text-truncate mb-0" > $' .number_format($fila[2], 0, ",", ".").  '
						    </p>
						    <p>' .$fila[5]. '</p>
						    <div class="d-grid">
								<a href="#" class="btn btn-outline-success">Ver Detalle</a>
						    </div>
						    
						  </div>
						</div>
					</div>';

					}
					}
					

					

					?>
					

					
				</div>
			</div>
		</div>
	</div>

	<?php require 'modales.php'; ?>

	<script type="text/javascript" src="dist/js/bootstrap.bundle.js"></script>
	<script src="dist/js/login.js"></script>

</body>
</html>