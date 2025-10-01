<?php
	include_once 'conexion.php';
	$email= $_POST['email'];
	$password = $_POST['password'];
	header('Content-Type: application/json');
	// Verificar si el usuario ya existe
	$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
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
			echo json_encode(array("status" => "success"));
		}
	} else {
		echo json_encode(array("status" => "error"));
	}
	
?>
