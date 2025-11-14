<?php
header('Content-Type: text/html; charset=UTF-8');
require_once 'conexion.php';
session_start();
if (!isset($_SESSION['user_username'])) {
	echo "<style>container{ display: none; }</style>";
	echo "<script>alert('Debes iniciar sesión para acceder a esta página.'); window.location.href = 'login.php';</script>";
}


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
			    <input type="text" placeholder="Buscar chats..."> 
			    <div class="chat-list">
				<div class="chat-loading">Cargando chats...</div>
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
	<script>const CURRENT_USER_ID = <?=$_SESSION['user_id'] ?>;</script>
	<script src="lib/jquery-3.7.1.min.js.js"></script>
	<script src="js/chats.js"></script>
</body>
</html>
