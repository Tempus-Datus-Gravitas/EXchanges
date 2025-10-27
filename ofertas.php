<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/logo.png">
	<link rel="stylesheet" href="css/inicio.css">
	<link rel="stylesheet" href="css/bar.css">
	<link rel="stylesheet" href="css/ofertas.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Expletus Sans' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ofertas</title>
</head>
<body>
	<?php include 'bar.php'; ?>
		<div class="cargando">
		<img src="https://i.gifer.com/ZZ5H.gif" alt="Cargando">
	</div>
	<div id="container">
		<div id="sectiontitle">
			<p>Ofertas activas</p>
		</div>
		<div id="cards">
		</div>
	</div>
<script src="lib/jquery-3.7.1.min.js.js"></script>
<script src="js/posts.js"></script>
<script>
		var cargando = document.querySelector(".cargando");
		window.addEventListener('load', function() {
			cargando.style.display = 'none';
		})
</script>
</body>
</html>
