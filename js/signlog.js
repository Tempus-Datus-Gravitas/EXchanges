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
let inputspace = $('.inputspace > input');

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

login.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default button behavior
    
    if (email.value === "" || password.value === "") {
        alert("Por favor, completa todos los campos.");
    } else {
        $.ajax({
            url: "loginbackend.php",
            method: "POST", // <--- THIS IS THE CRITICAL CHANGE
            data: { email: email.value, password: password.value },
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    alert("Inicio de sesión exitoso. Redirigiendo...");
                    window.location.href = "index.php";
                } else {
                    alert("Correo o contraseña incorrectos. Por favor, inténtalo de nuevo.");
                }
            },
            error: function(xhr, status, error) {
                alert("Error en la conexión. Por favor, inténtalo de nuevo más tarde.");
                console.error("AJAX Error:", status, error); // Log for debugging
            }
        });
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
		alert("Por favor, completa todos los campos.");
		event.preventDefault();
	}else if (calculateAge(new Date(edad.value)) < 18) {
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
			$.ajax({
				url: "registerbackend.php",
				type: "POST",
				data: { name: nombreapellido.value, username: username.value, email: email.value, password: password.value },
				dataType: "json",
				success: function(response) {
					if (response.status === "success") {
						$.ajax({
							url: "loginbackend.php",
							data: { email: email.value, password: password.value },
						});
						alert("Registro exitoso. Redirigiendo al inicio");
						window.location.href = "index.php";
					} else {
						alert("Error en el registro: " + response.message);
						location.reload();
					}
				},
			});
		}
	});

}

function calculateAge(birthDate) {
	let today = new Date();
	let age = today.getFullYear() - birthDate.getFullYear();
	let monthDifference = today.getMonth() - birthDate.getMonth();

	if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
		age--;
	}
	return age;
}

