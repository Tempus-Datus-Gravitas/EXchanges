let postsJSON = '[' +
'{ "id":0, "imagen":"img/1.jpg", "nombre":"Buzo de lana blanco", "desc":"Usado talla L, ancho 61cm, largo 74cm, manga 90cm", "categoria":"Vestimenta" },' +

'{ "id":1, "imagen":"img/2.jpg", "nombre":"Katana de acero", "desc":"Obra maestra de la forja. Cada detalle de esta katana, desde la empuñadura hasta la hoja, es un testimonio de la habilidad y dedicación del artesano.", "categoria":"Herramientas" }, '+ 

'{ "id":2, "imagen":"img/3.jpg", "nombre":"Anillo de plata 925", "desc":"El brillo sutil de la aguamarina en un diseño delicado. Este anillo de plata con detalles de bolitas es una pieza única y especial. ¡Ideal para un regalo o para mimarte a ti misma!", "categoria":"Accesorios" }, ' +

'{ "id":3, "imagen":"img/4.jpg", "nombre":"Zapatillas Adidas", "desc":"Zapatillas Adidas, están nuevas, no me quedaban, por eso permuto.", "categoria":"Vestimentas" }, ' +

'{ "id":4, "imagen":"img/5.jpg", "nombre":"Kit de ollas de acero inóxidable", "desc":"Ollas muy buenas, casi sin uso. Son 3 ollas de color plateado, vienen con tapa incluída y tienen varios lugares por donde agarrarla por si está muy caliente.", "categoria":"Herramientas" },' +

'{ "id":5, "imagen":"img/6.jpg", "nombre":"Bufanda tejida a mano", "desc":"Una simple bufanda color más o menos vainilla. Es abrigada, linda y está 100% tejida a mano.", "categoria":"Herramientas" },' +

'{ "id":6, "imagen":"img/7.jpg", "nombre":"Kit de utensilios de cocina", "desc":"Son 11 utensilos de cocina super prácticos con mango de madera.", "categoria":"Herramientas" },' +

'{ "id":7, "imagen":"img/8.jpg", "nombre":"Camisa negra", "desc":"Una camisa negra muy fachera para ir a fiestas es perfecta, e incluso es lo suficientemente formal como para también utilizarla en reuniones de trabajo e emtrevistas.", "categoria":"Herramientas" },' +

'{ "id":8, "imagen":"img/9.jpg", "nombre":"Renault", "desc":"Auto Renault", "categoria":"Accesorios" },' +

'{ "id":9, "imagen":"img/10.jpg", "nombre":"Placa Base", "desc":"Place base para computadora de escritorio. Es una Intel Desktop Board, tiene lo justo y necesario para el funcionamiento", "categoria":"Tecnología" },' +

'{ "id":10, "imagen":"img/11.jpg", "nombre":"Peluche Makoto Yuki Persona 3 Reload", "desc":"El mejor protagonista (debatible) de la famosa saga de videojuegos japonesa Persona, llegó como peluche para quedarse. Aprovecha la oportunidad de tener este tierno peluche de 15cm para llevarlo a dónde quieras y llorarle en las noches", "categoria":"Fitness y deporte" }]';

let posts = JSON.parse(postsJSON);
console.log(posts);


let cards = document.querySelector('#cards');

for (let i = posts.length-1 ; i > 2; i--) {
	let card = document.createElement('div');
	card.className = "card";

	let imgen = document.createElement('div');
	imgen.className= "image";
		let img = document.createElement('img');
		img.src = posts[i].imagen;
		imgen.appendChild(img);

	let h2 = document.createElement('h2');
		h2.textContent = posts[i].nombre;
	let p = document.createElement('p');
		p.textContent = posts[i].desc;
	card.appendChild(imgen);
	card.appendChild(h2);
	card.appendChild(p);
	cards.appendChild(card);
}
