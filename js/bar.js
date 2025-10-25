//Función que definie cual .php se cargó para poner una linea abajo del nombre que indica en que página se está
window.onload = (event) => {
	$('.normal').each(function() {
		if ($(this).text() == document.querySelector('title').textContent) {
			$(this).addClass('active');
		}
	});
};

// Función que utiliza la flecha al lado de donde dice categorías para abrir el menú desplegable
let state='inactive';
$('.arrow').on('click', function() {
   if (state === 'inactive') {
	   // Cierra el menú despĺegable del usuario si el menú de categorías no está abierto
		if (userstatus === 'active') {
			$('.fromuser').css('display', 'none');
			userstatus = 'inactive';
		}
	   // Modifica la flecha al lado de dónde dice "Categorías" para que apunte hacia arriba
		$('.arrow').removeClass('fa-caret-down');
        	$('.arrow').addClass('fa-caret-up'); // Cambia la flecha en el menú de navegación proviniente de la hamburguesa
	   	$('.fromcategory').css('display', 'block');
	   	state = 'active'; 
	}else if (state === 'active') {
	   // Modifica la flecha al lado de dónde dice "Categorías", para que apunte hacia abajo en lugar de hacia arriba
		$('.arrow').removeClass('fa-caret-up');
 		$('.arrow').addClass('fa-caret-down');
		$('.fromcategory').css('display', 'none'); // Cierra el menú de categorías
	    	state = 'inactive';
	}});

// Función que utiliza el circulito del usuario en la barra para abrir el menú desplegable del usuario/perfil o algo de eso
let userstatus = "inactive"; 
$('#usercircle').on('click', function() {
	// Remueve los menus activos en caso de que se cumplan las condiciones
  	if (userstatus === "inactive") {
		//Por si el menú de usuario no está visible
        if (state === 'active') {
            $('.fromcategory').css('display', 'none');
            state = 'inactive';
        }

        if (burgerstatus === 'active') {
		    $('.arrow').removeClass('fa-caret-up'); 
		    $('.arrow').addClass('fa-caret-down');	// Cambia la flecha en el menú de navegación proviniente de la hamburguesa
		    $('#navegacion').css('display', 'none'); // Remueve el menú de navegación
		    $('.fromcategory').css('display', 'none'); // Remueve el menú de categorías
		    burgerstatus = 'inactive';
        }
	    $('.fromuser').css('display', 'block'); // Muestra el menú de usuario
	    userstatus = "active"; 
	}else if (userstatus === "active") {
		//Por si el menú de usuario está visible
	    $('.fromuser').css('display', 'none'); // Remueve el menú de usuario
	    userstatus = "inactive";
	}
});

// Crea hamburgesa con su contenido 
let burgerstatus = 'inactive';
$('#burger').on('click', function() {

   if (userstatus === 'active') {
	// Remuve el menú de usurio y el de navgeación si están activos
	$('.fromuser').css('display', 'none');
	$('#navegacion').css('display', 'none');
	userstatus = 'inactive';
    }
   if (burgerstatus === 'active') {
	// Remueve el menú de navegación de la hamburguesa
	$('#navegacion').css('display', 'none');
	burgerstatus = 'inactive';
    }else if (burgerstatus === 'inactive') {
	// Muestra el menú de navegación si no está presente y se clickea en la hamburguesa.
	$('#navegacion').css('display', 'block');
	burgerstatus = 'active';
	
    }
});

$('.fromcategory > li').each(function() {
	$(this).on('click', function() {
		let category = $(this).text();
		$.ajax({
			type:"GET",
			url:"setcategory.php",
			data: {category: category},
			success: function() {
				window.location.href = "categorias.php";
			}
		});
	});
});
