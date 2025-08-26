<<<<<<< HEAD
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
'{ "id":10, "imagen":"img/11.jpg", "nombre":"Peluche Makoto Yuki Persona 3 Reload", "desc":"El mejor protagonista (debatible) de la famosa saga de videojuegos japonesa Persona, llegó como peluche para quedarse. Aprovecha la oportunidad de tener este tierno peluche de 15cm para llevarlo a dónde quieras y llorarle en las noches", "categoria":"Fitness y deporte" },'+
'{ "id":11, "imagen":"img/12.jpg", "nombre":"Peluche Meowscrada", "desc":"Un peluche de meowscarada", "categoria":"Entretenimiento" },' +
'{ "id":12, "imagen":"img/13.jpg", "nombre":"Peluche espurr", "desc":"Un peluche de espurr", "categoria":"Entretenimiento" },' +
'{ "id":14, "imagen":"img/14.jpg", "nombre":"Peluche prigatito","desc": "Un peluche de prigatito", "categoria":"Entretenimiento" },' +
'{ "id":15, "imagen":"img/15.jpg", "nombre":"Peluche clodsire", "desc":"Un peluche de clodsire", "categoria":"Entretenimiento"  },' +
'{ "id":15, "imagen":"img/16.jpg", "nombre":"Peluche meowstick", "desc":"Un peluche de meowstick", "categoria":"Entretenimiento" },' +
'{ "id":16, "imagen":"img/17.jpg", "nombre":"Pala", "desc":"es una herramienta que consta de una hoja o lámina unida a un mango o asta. La hoja suele ser de metal, como acero, y puede tener diferentes formas, como rectangular, redonda o puntiaguda, según su función.", "categoria":"Herramientas" },' +
'{ "id":17, "imagen":"img/18.jpg", "nombre":"Martillo", "desc":"herramienta manual utilizada para golpear, clavar, romper o deformar objetos.", "categoria":"Herramientas" },'+ 
'{ "id":18, "imagen":"img/19.jpg", "nombre":"Taladro", "desc":"herramienta eléctrica, comúnmente con forma de pistola, que se utiliza para hacer agujeros en diversos materiales", "categoria":"Herramientas" },' +
'{ "id":19, "imagen":"img/20.jpg", "nombre":"Pico", "desc":"herramienta manual utilizada para romper materiales duros como rocas, tierra compactada o asfalto", "categoria":"Herramientas" },' +
'{ "id":20, "imagen":"img/21.jpg", "nombre":"Rastrillo", "desc":"Un rastrillo es una herramienta con una cabeza rectangular o semicircular con dientes, unida a un mango largo, utilizada para limpiar, nivelar y airear el suelo, así como para recoger hojas, hierba cortada y otros desechos.", "categoria":"Herramientas" },'+
'{ "id":21, "imagen":"img/22.jpg", "nombre":"Fiat 1", "desc":"Automovil facil y seguro de usar", "categoria":"Accesorios" },'+
'{ "id":22, "imagen":"img/23.jpg", "nombre":"Laptop Chuwi", "desc":"Potente maquina capaz de realizar distintos procesos como laptopt", "categoria":"Tecnologia" },'+
'{ "id":23, "imagen":"img/24.jpg", "nombre":"Almohada de Viaje", "desc":"Comoda almohada para distintos viajes largos", "categoria":"Accesorios" },'+
'{ "id":24, "imagen":"img/25.jpg", "nombre":"Grand Theft Auto Dragon Ball", "desc":"Increible saga de videojuegos hecha por Akira Toriyama ", "categoria":"Entretenimiento" },'+
'{ "id":25, "imagen":"img/26.jpg", "nombre":"Tecla A", "desc":"Para alguien que le falte la tecla A de su teclado", "categoria":"Accesorios" }]';


let posts = JSON.parse(postsJSON);
console.log(posts);


let cards = document.querySelector('#cards');
for (let i = posts.length-1; i >= posts.length-8; i--) {
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
=======

>>>>>>> francciscobranch
