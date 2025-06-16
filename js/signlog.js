let usuariosJSON = '{ "usuarios":['+
'{"id":1,"nombreapellido":"default","apellido":"default","email":"email@d.com","psswd":"default", "edad":"18"},'+
'{"id":2,"nombreapellido":"Juan Pérez","email":"ks@gmail.com","psswd":"123456", "edad":"25"}]}';
let usuarios = JSON.parse(usuariosJSON).usuarios;
console.log(usuarios);
let page = document.querySelector('title').textContent;

if (page == "Inicio de sesión"){
    let login = document.querySelector('#login');
    let email = document.querySelector('#email');
    let password = document.querySelector('#password');
	email.addEventListener('keyup', function() {
	if (event.key === "Enter") {
	    password.focus();
	}
     });
	password.addEventListener('keyup', function() {
	if (event.key === "Enter") {
	    login.click();
	}
     });

    	login.addEventListener('click', function() {
		for (let i = 0; i < usuarios.length; i++) {
			if (email.value === "" || password.value === "") {
		    		alert("Por favor, completa todos los campos.");
	 	   		event.preventDefault();
			}else if (usuarios[i].email === email.value && usuarios[i].psswd === password.value) {
			        window.location.href = "index.html";
				event.preventDefault();
	  	  	}else if (usuarios[i].email === email.value && usuarios[i].psswd !== password.value) { 
				alert("Contraseña incorrecta. Por favor, inténtalo de nuevo.");
				event.preventDefault();
	  	 	}else if (usuarios[i].email !== email.value && i === usuarios.length - 1) {
				alert("Usuario no encontrado. Por favor, verifica tu email.");
				event.preventDefault();
		  	}
		}
	});
}else if (page == "Registro") {
      let registrarse = document.querySelector('#registrarse');
      let part1 = document.querySelector('.part1');
      let part2 = document.querySelector('.part2');
      let nombreapellido = document.querySelector('#name');
      let edad = document.querySelector('#age');
      let username = document.querySelector('#username');
      let email = document.querySelector('#email');
      let password = document.querySelector('#password');
      let confirmPassword = document.querySelector('#password2');
      let next = document.querySelector('#next');
      let idea = document.querySelector('#idea');
      idea.textContent = 'Cuentanos sobre ti';
      let parts = document.querySelector('#part');
      parts.textContent='1 de 2';
      let progressbar = document.querySelector('#progressbar');
	progressbar.style.background = "linear-gradient(to right, #414141 50%, #D9D9D9 50%)";
      
      nombreapellido.addEventListener('keyup', function() {
	if (event.key === "Enter") {edad.focus();}});

      edad.addEventListener('keyup', function() {
	if (event.key === "Enter") {username.focus();}});

      username.addEventListener('keyup', function() {
	if (event.key === "Enter") {password.focus();}});

      next.addEventListener('click', function() {
	if (nombreapellido.value === "" || edad.value === "" || username.value === "") {
	    alert("Por favor, completa todos los campos.");
	    event.preventDefault();
	}else if (edad.value < 18) {
	    alert("Debes tener al menos 18 años para registrarte.");
	    event.preventDefault();
	}else if (nombreapellido.value.length < 8) {
	    alert("El nombre y apellido deben tener al menos 8 caracteres.");
	    event.preventDefault();
	}else if (username.value.length < 4) {
	    alert("El nombre de usuario debe tener al menos 4 caracteres.");
	    event.preventDefault();
	}
	else {
	    part1.style.display = "none";
	    part2.style.display = "block";
	    idea.textContent = 'Correo y contraseña';
	    parts.textContent = '2 de 2';
	    progressbar.style.background = "linear-gradient(to right, #414141 100%, #D9D9D9 0%)";	
	}
    
      });
	registrarse.addEventListener('click', function() {
	if (password.value === "" || confirmPassword.value === "") {
	    alert("Por favor, completa todos los campos.");
	    event.preventDefault();
	}else if (password.value !== confirmPassword.value) {
	    alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
	    event.preventDefault();
	}else {
		let newUser = {
		id: usuarios.length + 1,
		nombreapellido: nombreapellido.value,
		email: email.value,
		psswd: password.value,
		edad: edad.value
	    };
	    usuarios.push(newUser);
	    console.log(usuarios);
	    alert("Registro exitoso. Ahora puedes iniciar sesión. Aunque la función aún no ha sido implementada del todo");
	    window.location.href = "index.html";
	    event.preventDefault();
	}
	});

}


