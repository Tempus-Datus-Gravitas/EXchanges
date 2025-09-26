<?php
header('Content-Type: text/html; charset=UTF-8');
require_once 'conexion.php';
$chats = [
	["nombre" => "FacuPermutaciones", "mensaje" => "¿Dónde quedamos?", "img" => "img/perfil1.jpg"],
	["nombre" => "SansTradeos", "mensaje" => "Sobre las crocs que...", "img" => "img/perfil2.jpg"],
	["nombre" => "LuisaFRGC", "mensaje" => "¿Te parece bien que...", "img" => "img/perfil4.jpg"],
	["nombre" => "UsuarioX", "mensaje" => "", "img" => "img/perfil3.jpg"],
	["nombre" => "UsuarioY", "mensaje" => "", "img" => "img/perfil5.jpg"],
];
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="img/logo.png">
		<link rel="stylesheet" href="css/chats.css">
		<link rel="stylesheet" href="css/inicio.css">
		<link rel="stylesheet" href="css/bar.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Expletus Sans' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Chats</title>
	</head>
<body>
	<?php include 'bar.php'; ?>
	<div id="container">
		<div class="chat-contenedor">
			<div class="chat-sidebar">
				<input type="text" placeholder="Buscar o iniciar nuevo chat">
				<div class="chat-list">
					<?php foreach ($chats as $chat): ?>
						<div class="chat-item">
							<img src="<?= htmlspecialchars($chat['img']) ?>" alt="<?= htmlspecialchars($chat['nombre']) ?>">
							<div class="chat-info">
								<strong><?= htmlspecialchars($chat['nombre']) ?></strong>
								<span><?= htmlspecialchars($chat['mensaje']) ?></span>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="chat-window">
				<div class="chat-placeholder">
					Selecciona un chat para comenzar a conversar.<br><br>
					(Aquí aparecerán los mensajes cuando selecciones un chat)
				</div>
			</div>
		</div>
	</div>
	<script src="lib/jquery-3.7.1.min.js.js"></script>
</body>
</html>
