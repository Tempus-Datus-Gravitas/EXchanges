let postsJSON = '{ "posts" : [' +
'{ "id":0, "imagen":"img/1.jpg", "nombre":"Buzo de lana blanco", "desc":"Usado talla L ancho 61 cm largo 74 cm manga 90 cm", "categoria":"Vestimenta" },' +

'{ "id":1, "imagen":"img/2.jpg", "nombre":"Katana de acero", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Herramientas" }, '+ 

'{ "id":2, "imagen":"img/3.jpg", "nombre":"Anillo de plata 925", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Accesorios" }, ' +

'{ "id":3, "imagen":"img/4.jpg", "nombre":"Zapatillas Adidas", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Vestimentas" }, ' +

'{ "id":4, "imagen":"img/5.jpg", "nombre":"Kit de ollas de acero inóxidable", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Herramientas" },' +

'{ "id":5, "imagen":"img/6.jpg", "nombre":"Bufanda tejida a mano", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Herramientas" },' +

'{ "id":6, "imagen":"img/7.jpg", "nombre":"Kit de utensilios de cocina", "desc":"Una espatula, un ", "categoria":"Herramientas" },' +

'{ "id":7, "imagen":"img/8.jpg", "nombre":"Camisa negra", "desc":"Una camisa negra muy fachera", "categoria":"Herramientas" },' +

'{ "id":8, "imagen":"img/9.jpg", "nombre":"Renault", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Accesorios" },' +

'{ "id":9, "imagen":"img/10.jpg", "nombre":"Placa Base", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Tecnología" },' +

'{ "id":10, "imagen":"img/11.jpg", "nombre":"Peluche Makoto Yuki Persona 3 Reload", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Fitness y deporte" }]}';

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
