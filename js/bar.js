const header = document.querySelector('#header');
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
buscabar.placeholder = '&#xF002; Buscar';

let navega = document.createElement('ul');
navega.id = 'navegacion';

let i = document.createElement('i');
i.className = 'fa-regular fa-circle-user';


let active = document.querySelector('title');
let items = [
    {nombre: 'Inicio', enlace: 'index.html'},
    {nombre: 'Ofertas', enlace: 'ofertas.html'},
    {nombre: 'Categorías &#xF0d7;', enlace: 'categorias.html'},
    {nombre: 'Chats', enlace: 'chats.html'},
];

for (let clave in items) {
    let li = document.createElement('li');
    if (items[clave].nombre === active.textContent) {
	li.innerHTML = `<a class="active" href="${items[clave].enlace}">${items[clave].nombre}</a>`;
   }
    else {
    	li.innerHTML = `<a class="normal" href="${items[clave].enlace}">${items[clave].nombre}</a>`;
    }
    navega.appendChild(li);
}
header.appendChild(name);
header.appendChild(buscabar);
header.appendChild(navega);
header.appendChild(i);



