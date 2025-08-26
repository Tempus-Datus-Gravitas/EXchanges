<?php
header('Content-Type: text/html; charset=UTF-8');
require_once 'conexion.php';
$ofertas = [
   "Vestimenta" => [
	   ["titulo" => "Buzo de lana", "img" => "img/1.jpg"],
	   ["titulo" => "Bufanda tejida a mano", "img" => "img/2.jpg"],
	   ["titulo" => "Camisa negra", "img" => "img/3.jpg"],
	   ["titulo" => "Zapatillas Adidas", "img" => "img/4.jpg"],
   ],
   "Cocina" => [
	   ["titulo" => "Kit de ollas de acero", "img" => "img/5.jpg"],
	   ["titulo" => "Kit de utensilios", "img" => "img/6.jpg"],
   ],
   "Accesorios" => [
	   ["titulo" => "Anillo de plata 925", "img" => "img/7.jpg"],
   ]
];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/logo.png">
	<link rel="stylesheet" href="css/inicio.css">
	<link rel="stylesheet" href="css/bar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Expletus Sans' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ofertas</title>
	<style>
		.ofertas-categoria {
			margin-top: 30px;
		}
		.ofertas-grid {
			display: flex;
			gap: 15px;
			flex-wrap: wrap;
		}
		.oferta-card {
			background: white;
			color: black;
			width: 180px;
			border-radius: 10px;
			overflow: hidden;
			text-align: center;
			box-shadow: 0 2px 8px rgba(0,0,0,0.3);
			margin-bottom: 20px;
		}
		.oferta-card img {
			width: 100%;
			height: 120px;
			object-fit: cover;
		}
		.oferta-card h3 {
			margin: 10px 0 5px 0;
			font-size: 16px;
		}
		.oferta-card p {
			font-size: 12px;
			padding: 0 10px 10px;
			color: #444;
		}
	</style>
</head>
<body>
	<?php include 'bar.php'; ?>
	<div id="container">
		<div id="sectiontitle">
			<p>Ofertas activas</p>
		</div>
		<div id="cards">
<?php
$nombres = [];
foreach ($ofertas as $items) {
    foreach ($items as $item) {
        $nombre = mb_strtolower(trim($item['titulo']));
        if (!in_array($nombre, $nombres)) {
            $nombres[] = $nombre;
            echo '<div class="card">';
            echo '  <div class="image">';
            echo '    <img src="' . htmlspecialchars($item['img']) . '" alt="' . htmlspecialchars($item['titulo']) . '">';
            echo '  </div>';
            echo '  <h2>' . htmlspecialchars($item['titulo']) . '</h2>';
            echo '  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>';
            echo '</div>';
        }
    }
}
?>
</div>
<script src="lib/jquery-3.7.1.min.js.js"></script>
<script>
let postsJSON = '[{"id":0,"imagen":"img/1.jpg","nombre":"Buzo de lana blanco","desc":"Usado talla L, ancho 61cm, largo 74cm, manga 90cm","categoria":"Vestimenta"},'+
'{"id":1,"imagen":"img/2.jpg","nombre":"Katana de acero","desc":"Obra maestra de la forja. Cada detalle de esta katana, desde la empuñadura hasta la hoja, es un testimonio de la habilidad y dedicación del artesano.","categoria":"Herramientas"},'+
'{"id":2,"imagen":"img/3.jpg","nombre":"Anillo de plata 925","desc":"El brillo sutil de la aguamarina en un diseño delicado. Este anillo de plata con detalles de bolitas es una pieza única y especial. ¡Ideal para un regalo o para mimarte a ti misma!","categoria":"Accesorios"},'+
'{"id":3,"imagen":"img/4.jpg","nombre":"Zapatillas Adidas","desc":"Zapatillas Adidas, están nuevas, no me quedaban, por eso permuto.","categoria":"Vestimentas"},'+
'{"id":4,"imagen":"img/5.jpg","nombre":"Kit de ollas de acero inóxidable","desc":"Ollas muy buenas, casi sin uso. Son 3 ollas de color plateado, vienen con tapa incluída y tienen varios lugares por donde agarrarla por si está muy caliente.","categoria":"Herramientas"},'+
'{"id":5,"imagen":"img/6.jpg","nombre":"Bufanda tejida a mano","desc":"Una simple bufanda color más o menos vainilla. Es abrigada, linda y está 100% tejida a mano.","categoria":"Herramientas"},'+
'{"id":6,"imagen":"img/7.jpg","nombre":"Kit de utensilios de cocina","desc":"Son 11 utensilos de cocina super prácticos con mango de madera.","categoria":"Herramientas"},'+
'{"id":7,"imagen":"img/8.jpg","nombre":"Camisa negra","desc":"Una camisa negra muy fachera para ir a fiestas es perfecta, e incluso es lo suficientemente formal como para también utilizarla en reuniones de trabajo e emtrevistas.","categoria":"Herramientas"},'+
'{"id":8,"imagen":"img/9.jpg","nombre":"Renault","desc":"Auto Renault","categoria":"Accesorios"},'+
'{"id":9,"imagen":"img/10.jpg","nombre":"Placa Base","desc":"Place base para computadora de escritorio. Es una Intel Desktop Board, tiene lo justo y necesario para el funcionamiento","categoria":"Tecnología"},'+
'{"id":10,"imagen":"img/11.jpg","nombre":"Peluche Makoto Yuki Persona 3 Reload","desc":"El mejor protagonista (debatible) de la famosa saga de videojuegos japonesa Persona, llegó como peluche para quedarse. Aprovecha la oportunidad de tener este tierno peluche de 15cm para llevarlo a dónde quieras y llorarle en las noches","categoria":"Fitness y deporte"}]';
let posts = JSON.parse(postsJSON);
let cards = document.getElementById('cards');
let nombres = Array.from(cards.querySelectorAll('h2')).map(e => e.textContent.trim().toLowerCase());
posts.forEach(function(post) {
    let nombre = post.nombre.trim().toLowerCase();
    if (!nombres.includes(nombre)) {
        let card = document.createElement('div');
        card.className = "card";
        let imgen = document.createElement('div');
        imgen.className= "image";
        let img = document.createElement('img');
        img.src = post.imagen;
        imgen.appendChild(img);
        let h2 = document.createElement('h2');
        h2.textContent = post.nombre;
        let p = document.createElement('p');
        p.textContent = post.desc;
        card.appendChild(imgen);
        card.appendChild(h2);
        card.appendChild(p);
        cards.appendChild(card);
        nombres.push(nombre);
    }
});
</script>
	</div>
	</script>
</body>
</html>
