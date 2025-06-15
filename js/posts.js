let postsJSON = '{ "posts" : [' +
'{ "id":"0000", "imagen":"img/1.jpg", "nombre":"Buzo de lana blanco", "desc":"Usado talla L ancho 61 cm largo 74 cm manga 90 cm", "categoria":"Vestimenta" },' +

'{ "id":"0001", "imagen":"img/2.jpg", "nombre":"Katana de acero", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Herramientas" }, '+ 

'{ "id":"0002", "imagen":"img/3.jpg", "nombre":"Anillo de plata 925", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Accesorios" }, ' +

'{ "id":"0003", "imagen":"img/4.jpg", "nombre":"Zapatillas Adidas", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Vestimentas" }, ' +

'{ "id":"0004", "imagen":"img/5.jpg", "nombre":"Kit de ollas de acero inóxidable", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Herramientas" },' +

'{ "id":"0005", "imagen":"img/6.jpg", "nombre":"Bufanda tejida a mano", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Herramientas" },' +

'{ "id":"0006", "imagen":"img/7.jpg", "nombre":"Kit de utensilios de cocina", "desc":"Una espatula, un ", "categoria":"Herramientas" },' +

'{ "id":"0007", "imagen":"img/8.jpg", "nombre":"Camisa negra", "desc":"Una camisa negra muy fachera", "categoria":"Herramientas" } ]}';

let posts = JSON.parse(postsJSON);
console.log(posts);

let cards = document.querySelector('#cards');

for (let i = 0; i < 8; i++) {
let card = document.createElement('div');
card.className = "card";

let imgen = document.createElement('div');
imgen.className= "image";
	let img = document.createElement('img');
	img.src = posts.posts[i].imagen;
	imgen.appendChild(img);

let h2 = document.createElement('h2');
	h2.textContent = posts.posts[i].nombre;
let p = document.createElement('p');
	p.textContent = posts.posts[i].desc;
card.appendChild(imgen);
card.appendChild(h2);
card.appendChild(p);
cards.appendChild(card);
}
