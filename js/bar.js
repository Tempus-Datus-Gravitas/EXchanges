//Función que definie cual .php se cargó para poner una linea abajo del nombre que indica en que página se está
window.onload = (event) => {
	$('.normal').each(function() {
		if ($(this).text() == document.querySelector('title').textContent) {
			$(this).addClass('active');
		}
	});
};

<<<<<<< HEAD
let title = document.createElement('h1');
title.id = 'title';
title.textContent = 'EX';

let subtitle = document.createElement('h1');
subtitle.id = 'subtitle';
subtitle.textContent = 'changes';

name.appendChild(title);
name.appendChild(subtitle);

let buscabar = document.createElement('input');
buscabar.type = 'text';
buscabar.placeholder = '  Buscar';

let navega = document.createElement('ul');
navega.id = 'navegacion';

let i = document.createElement('i');
i.className = 'fa-regular fa-circle-user';


let active = document.querySelector('title');
let items = [
    {nombre: 'Inicio', enlace: 'index.html'},
    {nombre: 'Ofertas', enlace: ''},
    {nombre: 'Categorías', enlace: ''},
    {nombre: 'Chats', enlace: ''},
];

for (let clave in items) {
    let li = document.createElement('li');
    if (items[clave].nombre === active.textContent) {
	li.innerHTML = `<a class="active" href="${items[clave].enlace}">${items[clave].nombre}</a>`;
   }else if (items[clave].nombre == 'Categorías') {
    	li.innerHTML = `<a class="normal" id="categories" onclick="alert('Aún no implementado')">${items[clave].nombre}</a><p id="arrow"></p>`;
   }else {
    	li.innerHTML = `<a class="normal" onclick="alert('Aún no implementado')">${items[clave].nombre}</a>`;
    }
    navega.appendChild(li);
}
header.appendChild(name);
header.appendChild(buscabar);
header.appendChild(navega);
header.appendChild(i);
let state='inactive';
arrow.addEventListener('click', function() {
	if (state === 'inactive') {
		if (userstatus === 'active') {
			let usercollapse2 = document.querySelector('.fromuser');
			usercollapse2.remove();
			userstatus = 'inactive';
		}
		arrow.textContent = '';
		let categorymenu = document.createElement('ul');
		categorymenu.classList.add('listing');
		categorymenu.classList.add('fromcategory');
		categorymenu.innerHTML = `
		<li><a>Vestimenta</a></li>
		<li><a>Herramientas</a></li>
		<li><a>Accesorios</a></li>
		<li><a>Vestimentas</a></li>
		<li><a>Cocina</a></li>
		<li><a>Accesorios</a></li>
		<li><a>Herramientas</a></li>
		<li><a>Tecnología</a></li>
		<li><a>Fitness y deporte</a></li>
		<li><a>Belleza</a></li>
		<li><a>Entretenimiento</a></li>
		<li><a>Hogar y muebles</a></li>
	    `;
		container.appendChild(categorymenu);
		state = 'active';
	}else if (state === 'active') {
		arrow.textContent = '';
		let categorymenu2 = document.querySelector('.fromcategory');
          	categorymenu2.remove();
	    	state = 'inactive';
	}});

let userstatus = "inactive";
let user = document.querySelector('.fa-circle-user');
user.addEventListener('click', function() {
        if (userstatus === "inactive") {
	    if (state === 'active') {
		let categorymenu2 = document.querySelector('.fromcategory');
		categorymenu2.remove();
		state = 'inactive';
	    }
	    if (burgerstatus === 'active') {
		let navmenu = document.querySelector('.fromburger');
		navmenu.remove();
		burgerstatus = 'inactive';
	    }
	    let usermenu = document.createElement('ul');
	    usermenu.classList.add('listing');
	    usermenu.classList.add('fromuser');
	    usermenu.innerHTML = `
	        <div id="userlogin">
		     <i class="fa-regular fa-circle-user"></i>
		     <a href="login.html"><p>Iniciar sesión</p></a>
		</div>
		<li><a>Configuración de la cuenta</a></li>
		<li><a>Permutaciones hechas</a></li>
		<li><a>Mis publicaciones</a></li>
		<li><a>Notificaciones</a></li>
		<li><a>Cerrar sesión</a></li>
	    `;
	    container.appendChild(usermenu);
	    userstatus = "active";
=======
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
>>>>>>> francciscobranch
	}else if (userstatus === "active") {
		//Por si el menú de usuario está visible
	    $('.fromuser').css('display', 'none'); // Remueve el menú de usuario
	    userstatus = "inactive";
	}
});

<<<<<<< HEAD
// Create the burger to put in the corner of the header
let burger = document.createElement('p');
burger.id = 'burger';
burger.textContent = '☰';
let burgerstatus = 'inactive';
burger.addEventListener('click', function() {
   if (userstatus === 'active') {
	let usercollapse2 = document.querySelector('.fromuser');
	usercollapse2.remove();
	userstatus = 'inactive';
    }else if (burgerstatus === 'active') {
	let navmenu = document.querySelector('.fromburger');
	navmenu.remove();
	burgerstatus = 'inactive';
    }else if (burgerstatus === 'inactive') {
		    let navmenu = document.createElement('ul');
		    navmenu.classList.add('listing');
		    navmenu.classList.add('fromburger');
		    navmenu.innerHTML = `
			<li><a href="index.html">Inicio</a></li>
			<li><a>Ofertas</a></li>
			<li><a>Categorías</a><p style="display:inline" class="arrow"></p>
				<ul class="fromarrow"><li><a>Vestimenta</a></li>
				<li><a>Herramientas</a></li>
				<li><a>Accesorios</a></li>
				<li><a>Vestimentas</a></li>
				<li><a>Cocina</a></li>
				<li><a>Accesorios</a></li>
				<li><a>Herramientas</a></li>
				<li><a>Tecnología</a></li>
				<li><a>Fitness y deporte</a></li>
				<li><a>Belleza</a></li>
				<li><a>Entretenimiento</a></li>
				<li><a>Hogar y muebles</a></li></ul>
			</li>
			<li><a>Chats</a></li>
		    `;
	    	    container.appendChild(navmenu);
	    	    let fromarrow = document.querySelector('.fromarrow');
		    fromarrow.style.display = 'none';
	    	    let arrow = document.querySelector('.arrow');
	            arrow.style.cursor = 'pointer';
	            arrow.addEventListener('click', function() {
		        if (fromarrow.style.display === 'none') {
			fromarrow.style.display = 'block';
		        arrow.textContent = '';
			}else {
			fromarrow.style.display = 'none';
			arrow.textContent = '';
		        }
		    });
		    burgerstatus = 'active';
		}
});
header.appendChild(burger);

=======
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
>>>>>>> francciscobranch
