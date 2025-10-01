
<?php
header('Content-Type: text/html; charset=UTF-8');
require_once 'conexion.php';
$ofertas = [
   "Vestimenta" => [
	   ["titulo" => "Buzo de lana", "img" => "img/1.jpg", "desc" => "Buzo de lana blanco, usado talla L. Muy abrigado y cómodo para el invierno."],
	   ["titulo" => "Bufanda tejida a mano", "img" => "img/6.jpg", "desc" => "Bufanda color vainilla, tejida a mano. Suave y perfecta para el frío."],
	   ["titulo" => "Camisa negra", "img" => "img/8.jpg", "desc" => "Camisa negra fachera, de talle M. Busco cambiarla porque engordé."],
	   ["titulo" => "Zapatillas Adidas", "img" => "img/4.jpg", "desc" => "Zapatillas Adidas nuevas, nunca usadas. Talle 42."],
   ],
   "Herramientas" => [
	   ["titulo" => "Destornilladores philips", "img" => "img/13.jpg", "desc" => "Set de destornilladores Philips de varios tamaños, resistentes y duraderos."],
	   ["titulo" => "Combo de herramientas", "img" => "img/14.jpg", "desc" => "Combo completo de herramientas para el hogar: martillo, pinzas, llaves y más."],
   ],
   "Accesorios" => [
	   ["titulo" => "Anillo de plata 925", "img" => "img/3.jpg", "desc" => "Anillo de plata 925 con detalles delicados. Talle ajustable."],
	   ["titulo" => "Labubu con crocs", "img" => "img/12.jpg", "desc" => "Figura coleccionable de Labubu usando crocs rosas. Edición limitada."],
	   ["titulo" => "Collar de corazón de 14k", "img" => "img/29.jpg", "desc" => "Collar de oro 14k con dije de corazón. Elegante y delicado."],
	  ],
	  "Cocina" => [
	   ["titulo" => "Kit de ollas de acero", "img" => "img/5.jpg", "desc" => "Kit de 3 ollas de acero inoxidable, con tapas y mangos resistentes al calor."],
	   ["titulo" => "Kit de utensilios", "img" => "img/7.jpg", "desc" => "Set de 11 utensilios de cocina con mango de madera. Prácticos y modernos."],
	  ],
   "Tecnología" => [
	   ["titulo" => "Altavoces para tv", "img" => "img/15.jpg", "desc" => "Par de altavoces estéreo para TV, sonido envolvente y potente."],
	   ["titulo" => "Cargador Asus", "img" => "img/16.jpg", "desc" => "Cargador en perfectas condiciones, me lo llevé de Liceo Impulso por accidente."],
	   ["titulo" => "Mouse logitech G604 inalambrico", "img" => "img/21.jpg", "desc" => "Mouse Logitech G604 inalámbrico, ideal para gaming y oficina."],
	  ],
	  "Fitness y deporte" => [
	   ["titulo" => "Pelota de basket", "img" => "img/17.jpg", "desc" => "Pelota de basket profesional, tamaño oficial, poco uso."],
	   ["titulo" => "Cuerda para saltar", "img" => "img/18.jpg", "desc" => "Cuerda para saltar ajustable, ideal para entrenamiento cardiovascular."],
	  ],
	  "Belleza" => [
	   ["titulo" => "Kit de maquillaje profesional", "img" => "img/19.jpg", "desc" => "Kit de maquillaje profesional con sombras, rubor y labiales."],
	   ["titulo" => "Pinceles de maquillaje", "img" => "img/20.jpg", "desc" => "Set de 7 pinceles de maquillaje de cerdas suaves y mango ergonómico."],
	  ],
	   "Entretenimiento" => [
	   ["titulo" => "Figura de Gojo Satoru", "img" => "img/22.jpg", "desc" => "Figura de colección de Gojo Satoru, personaje de Jujutsu Kaisen."],
	   ["titulo" => "Juguete de Elementor metal", "img" => "img/23.jpg", "desc" => "Juguete de Elementor metal, resistente y coleccionable."],
	   ["titulo" => "Blue ray de Los Increibles original", "img" => "img/24.jpg", "desc" => "Blu-ray original de Los Increíbles, edición especial con extras."],
	   ["titulo" => "Figura de La vaca saturno saturnita", "img" => "img/25.jpg", "desc" => "Figura de colección: La vaca Saturno Saturnita, edición limitada."],
	   ],
	   "Hogar y muebles" => [
	   ["titulo" => "Escritorio simple", "img" => "img/26.jpg", "desc" => "Escritorio de madera simple, ideal para home office o estudio."],
	   ["titulo" => "Mueble flotante", "img" => "img/27.jpg", "desc" => "Mueble flotante para TV o libros, color blanco, moderno."],
	   ["titulo" => "Sillón de 2 cuerpos", "img" => "img/28.jpg", "desc" => "Sillón de 2 cuerpos tapizado en tela marrón, muy cómodo."],
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
   <title>Categorías</title>
   <style>
	   .ofertas-categoria {
		   margin-top: 30px;
		   h2 {
			   font-size: 24px;
			   color: #333;
			   margin-bottom: 15px;
			   text-align: center;
		   }
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
		   <p>Categorías disponibles</p>
	   </div>
	   <div id="cards-ofertas">
		   <?php foreach ($ofertas as $categoria => $items): ?>
			   <div class="ofertas-categoria">
				   <h2><?= htmlspecialchars($categoria) ?></h2>
				   <div id="cards">
					  <?php foreach ($items as $item): ?>
						  <div class="card">
							  <div class="image">
								  <img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['titulo']) ?>">
							  </div>
							  <h2><?= htmlspecialchars($item['titulo']) ?></h2>
						  </div>
					  <?php endforeach; ?>
				   </div>
			   </div>
		   <?php endforeach; ?>
	   </div>
   </div>
</body>
</html>
