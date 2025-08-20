<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="img/logo.png">
		<link rel="stylesheet" href="css/signlog.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Expletus Sans' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		<title>Registro</title>
	</head>
	<body> 
		<div id="container">
			<i id="goback" class="fas fa-arrow-left" onclick="location.href='index.php'"></i>
			<div class=name onclick="location.href='index.php'">
				<p id="title">EX</p>
				<p id="subtitle">changes</p>
			</div>

			<div id="welcome">
				<div id="info">
					<h2>¿Ya tienes una cuenta?</h2>
					<p>Inicia sesión para obtener otra vez acceso a todos nuestros servicios.
	Volvé a permutar con otras personas. ¡Te están esperando!</p>
					<a href="login.php"><p class="nobtn" id="iniciar">Iniciar sesión</p></a>
				</div>
			</div>

			<div id="signlog">
			<h3>Registro</h3>
			<div id="progressbar"></div>
				<div class="textzone">
					<p id="part"></p>
					<p id="idea"></p>
				</div>
			<div id="inputs">
				<div class="part1">
					<div class="inputspace">
						<p>Nombre y Apellido</p>
						<input type="text" id="name" placeholder="">
					</div>
					<div class="inputspace">
						<p>Edad</p>
						<input type="text" id="age" placeholder="">
					</div>
					<div class="inputspace">
						<p>Nombre de usuario</p>
						<input type="text" id="username" placeholder="">
					</div>
					<p class="nobtn" id="next">Siguiente</p>

				</div>
				<div class="part2">

					<div class="inputspace">
						<p>Correo</p>
						<input type="email" id="email" placeholder="">
					</div>
					<div class="inputspace">
						<p>Contraseña</p>
						<input type="password" id="password" placeholder="">
					</div>
					<div class="inputspace">
						<p>Repetir contraseña</p>
						<input type="password" id="password2" placeholder="">
					</div>
						<p class="nobtn" id="registrarse">Registrarse</p>
				</div>
			</div>



			</div>


		</div>
		<script src="lib/jquery-3.7.1.min.js.js"></script>
		<script src="js/signlog.js"></script>
	</body>
</html>
