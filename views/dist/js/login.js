let formuIniciarSesion = document.getElementById('formuIniciarSesion')

formuIniciarSesion.addEventListener('submit', IniciarSesion )

function IniciarSesion (event) {
	//previniendo su acción por defecto del evento (e) submit
	//la acción por defecto de un evento submit es refrescar el documento
	event.preventDefault()

	//rescatar los datos ingresados en el formulario
	let datos = new FormData(formuIniciarSesion) 

	//enviamos los datos al backend (servidor) por medio de fetch
	/*fetch('url', { 
		method : método de envío (GET (por la url) o POST (de forma oculta)),
		body : datos
	})*/
	fetch('../controllers/LoginController.php', {
		method: 'POST',
		body: datos
	})
	.then(respuesta => respuesta.text() )
	.then(mensaje => {
		if (mensaje == 'ok') {
			
			//console.log(mensaje)
			window.location.reload()

		} else {
			let mensaje = document.getElementById('mensaje')
			mensaje.innerText = 'Datos Incorrectos. Intente nuevamente'
			mensaje.classList.add('text-danger')
		}
	})

}


