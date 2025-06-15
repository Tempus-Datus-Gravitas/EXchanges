let usuariosJSON = '{ "usuarios":[{"id":"aaa001","nombre":"default","apellido":"default","email":"email@d.com","psswd":"default", "edad":"18"}'+
',{"id":"aaa002","nombre":"Juan","apellido":"Pérez","email":"ks@gmail.com","psswd":"123456", "edad":"25"}]}';
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

}
