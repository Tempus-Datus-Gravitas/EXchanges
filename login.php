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
		<title>Inicio de sesión</title>
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
                                  <h2>¿No tienes una cuenta?</h2>
				  <p>Registrate para obtener acceso a todos nuestros servicios.
Comienza a permutar con otras personas. ¡Es gratis!</p>
				  <a href="register.php"><p class="nobtn" id="registrar">Registrame</p></a>
				</div>
			</div>
			<div id="signlog">
				<h3>Iniciar sesión</h3>
				<div id="inputs">
					<form id="form" method="POST">
						<div class="inputspace">
							<p>Correo</p>
							<input type="email" id="email" placeholder="" name="email">
						</div>
						<div class="inputspace">
							<p>Contraseña</p>
							<input type="password" id="password" placeholder="" name="password">
						</div>
					<p class="nobtn" id="login">Iniciar sesión</p>
					<input type="submit" id="submit" style="display:none;">
					</form>
				</div>
			</div>
		</div>
		<?php
			if (ISSET($_POST['email']) && ISSET($_POST['password'])) {
				//El codigo evita inyecciones SQL y verifica si el usuario existe en la base de datos, lo segundo es obvio.
				require_once 'conexion.php';
				$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
				$email = $_POST['email'];
				$password = $_POST['password'];
				$stmt->bind_param("ss", $email, $password); 
				$stmt->execute(); 
				$result = $stmt->get_result();
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					if ($row) {
						session_start();
						$_SESSION['user_username'] = $row['username'];
						$_SESSION['user_email'] = $row['email'];
						$_SESSION['user_admin'] = $row['admin'];
						$_SESSION['user_verified'] = $row['verified'];
						$_SESSION['user_pfp'] = $row['pfp'];
						session_regenerate_id(true); // Evita la fijación de sesión
						echo "<script>alert('Inicio de sesión exitoso');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}else {
					echo "<script>alert('Usuario o contraseña incorrectos');</script>";
				}
			}
		?>
		<script src="lib/jquery-3.7.1.min.js.js"></script>
		<script src="js/signlog.js"></script>
	</body>
</html>
