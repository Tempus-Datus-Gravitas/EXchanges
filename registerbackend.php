<?php
require_once 'conexion.php';

header('Content-Type: application/json');

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? '';

$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email OR username = :username");
    $stmt->execute([':email' => $email, ':username' => $username]);
    
    if ($stmt->fetchColumn() > 0) {
        http_response_code(409);
        echo json_encode(['status' => 'error', 'message' => 'El email o nombre de usuario ya está en uso.']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)");
    
    $stmt->execute([
        ':name' => $name,
        ':username' => $username,
        ':email' => $email,
        ':password' => $hashedpassword
    ]);

    if ($stmt->rowCount() > 0) {
        http_response_code(201);
        echo json_encode(['status' => 'success', 'message' => 'Usuario registrado con exito.']);
    } else {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Fallo al registrar al usuario.']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    error_log("Database error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Algo salió mal.']);
}

