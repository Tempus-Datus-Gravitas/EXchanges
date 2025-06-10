let navegacion = document.querySelector('#navegacion');
let active = window.location.pathname.split('/').pop();


let items = [
    {nombre: 'Inicio', enlace: 'index.html'},
    {nombre: 'Ofertas', enlace: 'ofertas.html'},
    {nombre: 'Categorías &#xF0d7;', enlace: 'categorias.html'},
    {nombre: 'Chats', enlace: 'chats.html'},
];

for (let clave in items) {
    let li = document.createElement('li');
    if (items[clave].enlace === active) {
	li.innerHTML = `<a class="active" href="${items[clave].enlace}">${items[clave].nombre}</a>`;
   }
    else {
    	li.innerHTML = `<a class="normal" href="${items[clave].enlace}">${items[clave].nombre}</a>`;
    }
    navegacion.appendChild(li);
}


