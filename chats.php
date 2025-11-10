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
				<input type="text" placeholder="Buscar o iniciar nuevo chat">
				<div class="chat-list">
					<?php
						$current_user_id = $_SESSION['user_id'];
						$sql = 'SELECT * FROM chats WHERE user1_id = ? OR user2_id = ?';
						$stmt = $conn->prepare($sql);
						$stmt->execute([$current_user_id, $current_user_id]);

						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							$other_user_id = ($row['user1_id'] == $current_user_id) ? $row['user2_id'] : $row['user1_id'];
							$sql2 = 'SELECT id, username, pfp FROM users WHERE id = ?';
							$stmt2 = $conn->prepare($sql2);
							$stmt2->execute([$other_user_id]);  
							$userInfo = $stmt2->fetch(PDO::FETCH_ASSOC);
    						if ($userInfo) {
    					?>
        				<div class="chat-item" data-chat-id="<?= $row['id_chat'] ?>">
            					<img src="data:image/webp;base64,<?= base64_encode($userInfo['pfp']) ?>">
            					<div class="chat-info">
                					<strong><?= htmlspecialchars($userInfo['username']) ?></strong>
            					</div>
        				</div>
    					<?php
    								}
							}
?>				</div>
			</div>
			<div class="chat-window">
				<div class="chat-placeholder">
					Selecciona un chat para comenzar a conversar.<br><br>
					(Aquí aparecerán los mensajes cuando selecciones un chat)
				</div>
			</div>
		</div>
	</div>
	<script src="lib/jquery-3.7.1.min.js.js"></script>
	<script src="js/chats.js"</script>
</body>
</html>
