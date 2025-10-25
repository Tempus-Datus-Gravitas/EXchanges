<?php
	include 'conexion.php';
	if ($conn->connect_error) {
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" href="img/logo.png">
		<link rel="stylesheet" href="css/error.css">
		<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Expletus Sans' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Error</title>
	</head>
	<body> 
		<div id="container">
			<div id="content">
				<h1>Error de conexión</h1>
				<p>No se pudo conectar a la base de datos. Por favor, inténtalo de nuevo más tarde.</p>
				<button onclick="location.reload();">Reintentar</button>
			</div>
		</div>
	</body>
</html>
