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
            echo '</div>';
        }
    }
}
?>
</div>
<script src="lib/jquery-3.7.1.min.js.js"></script>
</div>
</body>
</html>
