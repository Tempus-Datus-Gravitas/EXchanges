const header = document.querySelector('header');
const container = document.querySelector('#container');
let name = document.createElement('div');
name.id = 'name';

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
	}
});

let userstatus = "inactive";
let user = document.querySelector('.fa-circle-user');
user.addEventListener('click', function() {
        if (userstatus === "inactive") {
	    if (state === 'active') {
		let categorymenu2 = document.querySelector('.fromcategory');
		categorymenu2.remove();
		state = 'inactive';
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
	}else if (userstatus === "active") {
	    let usercollapse2 = document.querySelector('.fromuser');
	    usercollapse2.remove();
	    userstatus = "inactive";
	}

});
