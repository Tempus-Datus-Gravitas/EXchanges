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
						<input type="text" id="name" placeholder="" name="name">
					</div>
					<div class="inputspace">
						<p>Fehca de nacimiento</p>
						<input type="date" id="age" placeholder="" name="age">
					</div>
					<div class="inputspace">
						<p>Nombre de usuario</p>
						<input type="text" id="username" placeholder="" name="username">
					</div>
					<p class="nobtn" id="next">Siguiente</p>
					
				</div>
				<div class="part2">
						<div class="inputspace">
							<p>Correo</p>
							<input type="email" id="email" placeholder="" name="email">
						</div>
						<div class="inputspace">
							<p>Contraseña</p>
							<input type="password" id="password" placeholder="" name="password">
						</div>
						<div class="inputspace">
							<p>Repetir contraseña</p>
							<input type="password" id="password2" placeholder="" name="password2">
						</div>
							<p class="nobtn" id="registrarse">Registrarse</p>
				</div>
			</div>

			</div>
		</div>
		<script src="lib/jquery-3.7.1.min.js.js"></script>
		<script src="js/signlog.js"></script>
		<?php
			if (ISSET($_POST['name']) && ISSET($_POST['age']) && ISSET($_POST['username']) && ISSET($_POST['email']) && ISSET($_POST['password']) && ISSET($_POST['password2'])) {
				//El codigo evita inyecciones SQL y verifica si el usuario existe en la base de datos, lo segundo es obvio.
				require_once 'conexion.php';
				$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
				$email = $_POST['email'];
				$username = $_POST['username'];
				$stmt->bind_param("ss", $email, $username); 
				$stmt->execute(); 
				$result = $stmt->get_result();
				if ($result->num_rows > 0) {
					echo "<script>alert('El correo o nombre de usuario ya están en uso');</script>";

				}else {
					$stmt = $conn->prepare("INSERT INTO users (username, name, email, password, verified, admin) VALUES (?, ?, ?, ?, 0, 0)");
					$name = $_POST['name'];
					$age = $_POST['age'];
					$password = $_POST['password'];
					$email = $_POST['email'];
					$username = $_POST['username'];
					$stmt->bind_param("ssss", $username, $name, $email, $password);
					if ($stmt->execute()) {
						echo "<script>alert('Registro exitoso');</script>";
						session_start();
						$_SESSION['user_id'] = $conn->insert_id;
						$_SESSION['user_username'] = $username;
						$_SESSION['user_email'] = $email;
						$_SESSION['user_admin'] = 0;
						$_SESSION['user_verified'] = 0;
						session_regenerate_id(true);
						echo "<script>window.location.href = 'index.php';</script>";	
					}
				}
			}
		?>
	</body>
</html>
