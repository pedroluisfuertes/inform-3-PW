
function validarUsuario() {


	/*
	<form method="post">
			<label id="datos-nombre">Nombre</label>
			<input type="text" name="nombre" id="datos-nombre" required="">
			<label id="datos-apellidos">Apellidos</label>
			<input type="text" name="apellidos" id="datos-apellidos" required="">
			<label id="datos-edad">Edad</label>
			<input type="number" name="edad" id="datos-edad">
			<label id="datos-email">E-mail</label>
			<input type="email" name="email" id="datos-email" required="">
			<label id="datos-password">Contraseña</label>
			<input type="password" name="password" id="datos-password" required="">
			<input type="text" name="action" value="insertarUsuario" required="" hidden="">
			<input type="submit" name="submit" name="action" value="Enviar">
			
			create table usuario(
				email varchar(128) primary key,
				nombre varchar(256) not null, 
				apellidos varchar(256) not null, 
				pass varchar(256) not null, 
				edad int
			);

		</form>
	*/
	let emailRegExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

	let nombre		 = document.getElementById("datos-nombre");
	let apellidos 	 = document.getElementById("datos-apellidos"); 
	let edad		 = document.getElementById("datos-edad"); 
	let email		 = document.getElementById("datos-email"); 
	let tfn		 	 = document.getElementById("datos-tfn"); 
	let password	 = document.getElementById("datos-password");
	let enviar 		 = true; 
	let ok = true; 

	/* Limpiamos los errores */
	let errores = document.getElementsByClassName("error");

	while(errores.length > 0){
		let aux = errores[0]; 
		aux.parentNode.removeChild(aux);
	}


	/* Validación del nombre */
	ok = nombre.value.length < 256 && nombre.value.length > 4; 
	enviar = enviar && ok;
	if(!ok) {
		nombre.className ="invalid";
		nombre.insertAdjacentHTML("afterend", `
	  	<p class="error">El nombre es incorrecto. Máximo 255 caracteres y mínimo 4.</p>
	  	`);
	}

	/* Validación de los Apellidos */
	ok = apellidos.value.length < 256 && apellidos.value.length > 4;; 
	enviar = enviar && ok;
	if(!ok) {
		apellidos.className ="invalid";
		apellidos.insertAdjacentHTML("afterend", `
	  	<p class="error">Los apellidos son incorrectos. Máximo 255 caracteres y mínimo 4.</p>
	  	`);
	}

	/* Verificación de la edad */
	ok = Number.isInteger(Number.parseInt(edad.value)) && parseInt(edad.value) > 13 && parseInt(edad.value) < 150; 
	enviar = enviar && ok;
	if(!ok) {
		edad.className ="invalid";
		edad.insertAdjacentHTML("afterend", `
	  	<p class="error">La edad es incorrecta, sólo se permiten números. La edad mínima es de 13 años y la máxima de 150.</p>
	  	`);
	}

	/* Verificación teléfono */
	ok = (/^\d{9}$/.test(tfn.value)) ;
	enviar = enviar && ok;
	if(!ok) {
		tfn.className ="invalid";
		tfn.insertAdjacentHTML("afterend", `
	  	<p class="error">El teléfono no es correcto. Formato: XXXXXXXXX</p>
	  	`);
	}

	/* Validación del e-mail */
	ok = email.value.length === 0 || emailRegExp.test(email.value);
	enviar = enviar && ok;
    if (!ok) {
      email.className = "invalid";
	  email.insertAdjacentHTML("afterend", `
	  	<p class="error">El email no es válido</p>
	  	`); 
      // Algunos navegadores antiguos no soportan el método event.preventDefault()
    }

    ok = email.value.length < 128;
	enviar = enviar && ok;
    if (!ok) {
      email.className = "invalid";
	  email.insertAdjacentHTML("afterend", `
	  	<p class="error">El email es demasiado largo. Máximo 128 caracteres.</p>
	  	`); 
      // Algunos navegadores antiguos no soportan el método event.preventDefault()
    }

    if(enviar){
		let formulario = document.getElementById("formulario-datos").getElementsByTagName('form')[0]; 
		formulario.submit(); 

    }

	  return false; 

}
