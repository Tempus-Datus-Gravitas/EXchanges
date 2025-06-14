let postsJSON = '{ "posts" : [' +
'{ "id":"0001", "imagen":"img/1.png", "nombre":"Buzo de lana", "fullnombre":"Buzo de lana blanco usado talla L ancho 61 cm largo 74 cm manga 90 cm", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Vestimenta" },' +
'{ "id":"0002", "imagen":"img/2.png", "nombre":"Katana de acero", "fullnombre":"Katana de acero wwawawawaawwwaaw", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Herramientas" }, '+ 
'{ "id":"0003", "imagen":"img/3.png", "nombre":"Anillo de plata 925", "fullnombre":"Anillo de plata wwawawawaawwwaaw", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Herramientas" }, ' +
'{ "id":"0004", "imagen":"img/4.png", "nombre":"Anillo de plata 925", "fullnombre":"Anillo de plata wwawawawaawwwaaw", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Herramientas" }, ' +
'{ "id":"0005", "imagen":"img/5.png", "nombre":"Anillo de plata 925", "fullnombre":"Anillo de plata wwawawawaawwwaaw", "desc":"Descripciones epicas que en algun momento escribí sin un motivo muy exacto", "categoria":"Herramientas" } ]}';

let posts = JSON.parse(postsJSON);
console.log(posts);

let cards = document.querySelector('#cards');

for (let i = 0; i < posts.posts.length; i++) {
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
