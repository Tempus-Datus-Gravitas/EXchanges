<?php
require_once 'conexion.php';

session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
    exit;
}

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? '';

if (!$email || empty($password)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Por favor, introduce el correo electrónico y la contraseña.']);
    exit;
}

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_username'] = $user['username'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_admin'] = $user['admin'];
        $_SESSION['user_verified'] = $user['verified'];
        $_SESSION['user_pfp'] = $user['pfp'];

        echo json_encode([
            'status' => 'success',
            'message' => 'Inicio de sesión exitoso.'
        ]);
    } else {
        http_response_code(401);
        echo json_encode([
            'status' => 'error',
            'message' => 'Credenciales incorrectas.'
        ]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    error_log("Database error: " . $e->getMessage());
    echo json_encode([
        'status' => 'error',
        'message' => 'Ocurrió un error en el servidor.'
    ]);
}
?>

