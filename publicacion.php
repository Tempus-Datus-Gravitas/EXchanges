<?php
include ('bar.php');
include ('conexion.php');
// Datos simulados del producto (normalmente vendrían de una base de datos)
$producto = [
  "titulo" => "Buzo Táctico Tricotado de Lana",
  "descripcion" => "Buzo táctico confeccionado en lana tricotada con refuerzos en hombros y codos. Ideal para climas fríos, cómodo y resistente.",
  "imagen" => "img/buzo-tactico.jpg",
  "opiniones" => 14
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="UTF-8">
		<link rel="icon" href="img/logo.png">
		<link rel="stylesheet" href="css/inicio.css">
		<link rel="stylesheet" href="css/bar.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Expletus Sans' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/publicacion.css">
</head>
<body>

  <div class="contenedor-producto">
    <div class="imagen-producto">
      <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['titulo']) ?>">
    </div>

    <div class="info-producto">
      <div>
        <h1 class="titulo"><?= htmlspecialchars($producto['titulo']) ?></h1>

        <p class="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></p>
      </div>

      <div class="botones">
        <button class="comprar">EXchange</button>
        <button class="carrito">Mensaje</button>
      </div>
    </div>
  </div>

  <script src="js/publicacion.js"></script>
</body>
</html>
