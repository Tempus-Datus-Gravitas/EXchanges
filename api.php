<?php
require_once 'conexion.php';
// Las siguientes variables son para poder enviar desde JS valores que se usen para las peticiones y así utilizar la api sin miedo de inyecciones
$allowedTables = ['posts', 'users', 'photos', 'messages','chats'];
$allowedSortColumns = ['id', 'created_at', 'name', 'timestamp'];
$allowedOrderDirections = ['ASC', 'DESC'];

header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        handleGetRequest();
        break;
        case 'POST':
        handlePostRequest();
        break;
    default:
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Method not allowed.']);
        break;
}

function handleGetRequest() {
    global $conn, $allowedTables, $allowedSortColumns, $allowedOrderDirections;
    //Lo de abajo es  //Lo de abajo es un montón de sanitización y cosas de esas. 
    $table = isset($_GET['table']) && in_array($_GET['table'], $allowedTables) ? $_GET['table'] : 'posts';
    $order = isset($_GET['order']) && in_array(strtoupper($_GET['order']), $allowedOrderDirections) ? strtoupper($_GET['order']) : 'DESC';
    $what = isset($_GET['what']) ? $_GET['what'] : '*';
    $whereClause = isset($_GET['where']) ? $_GET['where'] : '1';
    $limit = isset($_GET['limit']) ? $_GET['limit'] : '20';
    $sortColumn = isset($_GET['sort']) && in_array($_GET['sort'], $allowedSortColumns) ? $_GET['sort'] : 'id';
    $type = isset($_GET['type']) ? $_GET['type'] : 'nose';
    try {
	if ($table === "users"){
		$passwordL= isset($_GET['passwd']) ? $_GET['passwd'] : 'asdsad';
		$sql = 'SELECT '. $what . ' FROM '. $table . ' WHERE '. $whereClause;
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($user && password_verify($passwordL, $user['password'])) {
			session_regenerate_id(true);
			session_start();
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['user_username'] = $user['username'];
			$_SESSION['user_email'] = $user['email'];
			$_SESSION['user_admin'] = $user['admin'];
			$_SESSION['user_pfp'] = $user['pfp'];
			$_SESSION['user_verified'] = $user['verified'];

			echo json_encode([
			    'status' => 'success',
			    'message' => 'inicio de sesión exitoso.'
			]);
		} else {
			http_response_code(401);
			echo json_encode([
			    'status' => 'error',
			    'message' => 'Credenciales incorrectas.'
			]);
		}

	}else if ($table == 'posts'){	
		$sql = 'SELECT ' . $what . ' FROM `' . $table . '` WHERE ' . $whereClause . ' ORDER BY `' . $sortColumn . '` ' . $order .' LIMIT ' . $limit;
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		$json = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$json[] = array(
				'id' => $row['id'],
				'name' => $row['name'],
				'description' => $row['description'],
				'user_id' => $row['user_id'],
				'photo' => base64_encode($row['photo']),
				'category' =>$row['category'],
				'status' =>$row['status'],
				'created_at' =>$row['created_at']	
			);
		} 
			
		if (!empty($json)) {
		    echo json_encode([
			'status' => 'success',
			'data' => $json
		    ]);
		}else {
		    http_response_code(404);
		    echo json_encode([
			'status' => 'error',
			'message' => 'No se encontraron publicaciones'
		    ]);
		}
	}else if($table == "messages"){
		$sql = 'SELECT ' . $what . ' FROM `' . $table . '` WHERE ' . $whereClause . ' ORDER BY `' . $sortColumn . '` ' . $order .' LIMIT ' . $limit;
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		$json = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$json[] = array(
				'id_message' => $row['id_message'],
				'chat_id' => $row['chat_id'],
				'sender_id' => $row['sender_id'],
				'message' => $row['message'],
				'timestamp' => $row['timestamp']
			);
		} 
			
		if (!empty($json)) {
		    echo json_encode([
			'status' => 'success',
			'data' => $json
		    ]);
		}else {
		    echo json_encode([
			'status' => 'error',
			'message' => 'Comienza un chat con este usuario'
		    ]);
		}

	}else if ($table == "chats"){
		global $conn, $allowedTables;
		session_start();
		$current_user_id = $_SESSION['user_id']; 
		$json = array();
		$sql = 'SELECT * FROM chats WHERE user1_id = ? OR user2_id = ?';
                $stmt = $conn->prepare($sql);
		$stmt->execute([$current_user_id, $current_user_id]);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $other_user_id = ($row['user1_id'] == $current_user_id) ? $row['user2_id'] : $row['user1_id'];
                            $sql2 = 'SELECT id, username, pfp FROM users WHERE id = ?';
                            $stmt2 = $conn->prepare($sql2);
                            $stmt2->execute([$other_user_id]);  
				    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					    $json[] = array(
					    	'chat_id' => $row['id_chat'],
						'pfp' => base64_encode($row2['pfp']),
						'username' => $row2['username']
					    );
				    }
		}
		http_response_code(200); 
        	echo json_encode(['status' => 'success', 'data' => $json]);
	}
	
    } catch (PDOException $e) {
        http_response_code(500);
        error_log('Database query failed: ' . $e->getMessage());
        echo json_encode([
            'status' => 'error',
            'message' => 'Error de server'
        ]);
    }
}
function handlePostRequest() {
    global $conn, $allowedTables;
    // Campos mínimos
    $table = isset($_POST['table']) && in_array($_POST['table'], $allowedTables) ? $_POST['table'] : 'posts';
    $what = isset($_POST['what']) ? trim($_POST['what']) : '';
    $values = isset($_POST['values']) ? trim($_POST['values']) : '';
    $type = isset($_POST['type']) ? trim($_POST['type']): 'else';
	
    try{
	    if ($table == "posts"){
		    session_start();
		    $name = $_POST['name'];
		    $description = $_POST['description'];
		    $category = $_POST['category'];
		    $base64image = $_POST['photo'];
		    $user_id = $_SESSION['user_id'];
		    $rawbase64 = trim($base64image, " '");
		    $sql = 'INSERT INTO '. $table . ' ('.$what.') VALUES (?,?,?,?,?)';

		    $binaryImage = base64_decode($rawbase64);
		    $stmt = $conn->prepare($sql);
		    $stmt->bindParam(1, $name, PDO::PARAM_STR);
		    $stmt->bindParam(2, $description, PDO::PARAM_STR);
		    $stmt->bindParam(3, $binaryImage, PDO::PARAM_LOB);
		    $stmt->bindParam(4, $category, PDO::PARAM_STR);
		    $stmt->bindParam(5, $user_id, PDO::PARAM_INT);
		    $stmt->execute();
		    echo json_encode(['status' => 'success']);
		    return;

	    }else if ($table == "users"){
		    $name = isset($_POST['name']) ? $_POST['name'] : '';
		    $username = isset($_POST['username']) ?$_POST['username'] : '';
		    $email = isset($_POST['email']) ? $_POST['email'] : '';
		    $password = isset($_POST['password']) ? $_POST['password'] : '';
		    $pfp = isset($_POST['pfp']) ? $_POST['pfp'] : '';
		    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
		    $binarypfp = base64_decode($pfp);
		    $pfp_length = strlen($binarypfp);

		    $sql = 'INSERT INTO '. $table . ' (' . $what . ') VALUES ( ?, ?, ?, ?, ?)';
		    $stmt = $conn->prepare($sql);
		    $stmt->bindParam(1, $name, PDO::PARAM_STR);
		    $stmt->bindParam(2, $username, PDO::PARAM_STR);
		    $stmt->bindParam(3, $email, PDO::PARAM_STR);
		    $stmt->bindParam(4, $hashedpassword, PDO::PARAM_STR);
		    $stmt->bindParam(5, $binarypfp, PDO::PARAM_LOB, $pfp_length);
		    $stmt->execute();
		    echo json_encode(['status' => 'success']);
		    return;

	    }else if($table == "messages"){
		    session_start();
		    $sender = $_SESSION['user_id'];
    		    $chat_id = $_POST['chat_id'];
		    $message = $_POST['message']; 
		    
		    $sql = 'INSERT INTO '. $table . ' (' . $what .') VALUES (?,?,?)';
		    $stmt = $conn->prepare($sql);
		    $stmt->bindParam(1, $message, PDO::PARAM_STR);
		    $stmt->bindParam(2, $chat_id, PDO::PARAM_INT);
		    $stmt->bindParam(3, $sender, PDO::PARAM_INT);
		    $stmt->execute();
		    echo json_encode(['status'=>'success']);
		    return;

	    }else if ($table == "chats"){
	    	session_start();
		$user1_id = $_SESSION['user_id'];
		$user2_id = $_POST['otheruser'];

		$sql = 'SELECT * FROM ' . $table . ' WHERE (user1_id= ? AND user2_id= ?) OR (user2_id= ? AND user1_id= ?)';
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $user1_id, PDO::PARAM_INT);
    		$stmt->bindParam(2, $user2_id, PDO::PARAM_INT);
    		$stmt->bindParam(3, $user2_id, PDO::PARAM_INT);
		$stmt->bindParam(4, $user1_id, PDO::PARAM_INT);
		$stmt->execute();
		if ($stmt->rowCount() > 0){
			echo json_encode(['status' => 'success', 'message' => 'exists']);
			
		}else{
			if ($user2_id == $user2_id){
				echo json_encode(['status' => 'success', 'message' => 'Ese es tu propia publicación']);
				return;
			}
			$sql2 = 'INSERT INTO '. $table . ' (user1_id,user2_id) VALUES (?,?)';
				$stmt2= $conn->prepare($sql2);
				$stmt2->bindParam(1, $user1_id, PDO::PARAM_INT);
				$stmt2->bindParam(2, $user2_id, PDO::PARAM_INT);
				$stmt2->execute();
				echo json_encode(['status' => 'success', 'message' => 'Fly me to the moon']);
		}
		return;
	    }
	}catch (PDOException $e) {
		http_response_code(500);
		error_log('Query Falló: ' . $e->getMessage());
		echo json_encode([
		    'status' => 'error',
		    'message' => 'Error de server'
		]);
    }

}


?>

