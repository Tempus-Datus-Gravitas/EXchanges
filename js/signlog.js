let page = document.querySelector('title').textContent; // define la página actual
actualpage(page); // Llama a la función actualpage con el nombre de la página actual.

function actualpage(page) {
	if (page == "Inicio de sesión") {
		iniciodesesion();
	}else if (page == "Registro") {
		registro(); 
	}
}
function iniciodesesion(){
// --------------------------
//     Inicio de sesión
// --------------------------
	let login = document.querySelector('#login');
	let email = document.querySelector('#email'); 
	let password = document.querySelector('#password'); 
	let inputspace = $('.inputspace > input'); // Selecciona todos los inputs dentro de la clase inputspace.

	// Por cada inputspace, crear un evento de keyup para que al presionar Enter se enfoque en el siguiente input.
	$(inputspace).each(function(index) {
		$(this).on('keyup', function(event) {
			if (event.key === 'Enter') {
				if (index < inputspace.length - 1) {
					inputspace[index + 1].focus();
				} else {
					login.click(); 
				}
			}
		});
	});	

	login.addEventListener('click', function() {
		if (email.value === "" || password.value === "") {
			alert("Por favor, completa todos los campos.");
			event.preventDefault();
		}else{
			$('#submit').click(); // Submit es el botonsito oculto que envía el formulario para todo eso de la base de datos.
		}
	});
}

function registro() {
// -------------------------
// 	  Registro
// -------------------------
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

	let inputspace = $('.inputspace > input'); // Selecciona todos los inputs dentro de la clase inputspace.
	// Por cada inputspace, crear un evento de keyup para que al presionar Enter se enfoque en el siguiente input.
	$(inputspace).each(function(index) {
		$(this).on('keyup', function(event) {
			if (event.key === 'Enter') {
				if (index < inputspace.length - 1) {
					inputspace[index + 1].focus(); // Enfoca el siguiente input.
				} else if (inputspace[index+1] === next) {
					next.click(); // Si es el último input de la parte 1, simula un clic en el botón de next.
				} else {
					registrarse.click(); // Si es el último input, simula un clic en el botón de registrarse.
				}
			}
		});
	});


	next.addEventListener('click', function() {
	if (nombreapellido.value === "" || edad.value === "" || username.value === "") {
		alert("Por favor, completa todos los campos**.");
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
	}else {
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
			$('#submit').click(); // Submit es el botonsito oculto que envía el formulario para todo eso de la base de datos.
		}
	});

}
