<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="../">Vende y Compra</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
	      <div id="btnsHome">

	      	<?php 
	      	 if( isset($_SESSION["nombreCompleto"])) {
	      	 		echo '<div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    '. $_SESSION["nombreCompleto"] .'
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Perfil</a></li>
    <li><a class="dropdown-item" href="../mis-publicaciones.php">Mis Publicaciones</a></li>
    <li><a class="dropdown-item" href="../controllers/CerrarSesion.php">Cerrar Sesión</a></li>
  </ul>
</div>';
	      	 } else {

	      	 	echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLogin">
	      		<i class="fas fa-user"></i> Ingresar
	      	</button>
	      	<button class="btn btn-light">
	      		<i class="fas fa-user-plus"></i>Registrarse
	      	</button>';


	      	 }

	      	?>

	      	
	      </div>
	    </div>
	  </div>
	</nav>