

<?php
header('Content-Type: text/html; charset=UTF-8');
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
	<link rel="stylesheet" href="css/inicio.css">
	<link rel="stylesheet" href="css/bar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Expletus Sans' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chats</title>
	<style>
		.chat-contenedor {
			display: flex;
			height: calc(100vh - 80px);
			background: transparent;
		}
		.chat-sidebar {
			width: 320px;
			background: #232323;
			border-right: 1px solid #444;
			display: flex;
			flex-direction: column;
		}
		.chat-sidebar input {
			margin: 15px 10px 10px 10px;
			padding: 8px;
			border-radius: 20px;
			border: none;
			outline: none;
			width: calc(95% - 20px);
		}
		.chat-list {
			flex-grow: 1;
			overflow-y: auto;
		}
		.chat-item {
			display: flex;
			align-items: center;
			padding: 12px 10px;
			cursor: pointer;
			border-bottom: 1px solid #333;
			transition: background 0.2s;
		}
		.chat-item:hover, .chat-item.active {
			background: #2f2f2f;
		}
		.chat-item img {
			width: 48px;
			height: 48px;
			border-radius: 50%;
			margin-right: 12px;
			object-fit: cover;
		}
		.chat-info {
			display: flex;
			flex-direction: column;
		}
		.chat-info strong {
			font-size: 16px;
			color: #fff;
		}
		.chat-info span {
			font-size: 13px;
			color: #aaa;
		}
		   .chat-window {
			   flex-grow: 1;
			   background: #313131;
			   display: flex;
			   flex-direction: column;
			   justify-content: center;
			   align-items: center;
		   }
		   .chat-placeholder {
			   color: #aaa;
			   text-align: center;
			   margin-top: 0;
		   }
	</style>
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
