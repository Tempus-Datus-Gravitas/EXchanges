<?php
	include_once 'conexion.php';
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
	header('Content-Type: application/json');
	// Verificar si el usuario ya existe
	$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
	$stmt->bind_param("ss", $email, $username);
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows > 0) {
		echo json_encode(array("status" => "error", "message" => "El correo o nombre de usuario ya están en uso"));
	} else {
		// Insertar el nuevo usuario
		$stmt = $conn->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $username, $email, $hashedpassword);
		if ($stmt->execute()) {
			echo json_encode(array("status" => "success"));
		} else {
			echo json_encode(array("status" => "error", "message" => "Error al registrar el usuario"));
		}
	}
?>
