<?php
require_once 'conexion.php';

// Las siguientes variables son para poder enviar desde JS valores que se usen para las peticiones y así utilizar la api sin miedo de inyecciones
$allowedTables = ['posts', 'users', 'photos'];
$allowedSortColumns = ['id', 'created_at', 'name'];
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
    //Lo de abajo es un montón de sanitización y cosas de esas. 
    $table = isset($_GET['table']) && in_array($_GET['table'], $allowedTables) ? $_GET['table'] : 'posts';
    $order = isset($_GET['order']) && in_array(strtoupper($_GET['order']), $allowedOrderDirections) ? strtoupper($_GET['order']) : 'DESC';
    $what = isset($_GET['what']) ? $_GET['what'] : '*';
    $whereClause = isset($_GET['where']) ? $_GET['where'] : '1';
    $limit = isset($_GET['limit']) ? $_GET['limit'] : '20';
    
    $sortColumn = isset($_GET['sort']) && in_array($_GET['sort'], $allowedSortColumns) ? $_GET['sort'] : 'id';
    
    try {
        $sql = 'SELECT ' . $what . ' FROM `' . $table . '` WHERE ' . $whereClause . ' ORDER BY `' . $sortColumn . '` ' . $order . ' LIMIT ' . $limit;
        $stmt = $conn->prepare($sql);

	$processedRow = [];
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
        } else {
            http_response_code(404);
            echo json_encode([
                'status' => 'error',
                'message' => 'No se encontraron publicaciones'
            ]);
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
    global $conn;

    // Campos mínimos
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $user_id = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
    $category = isset($_POST['category']) ? $_POST['category'] : 'Vestimentas';
    $status = isset($_POST['status']) ? $_POST['status'] : 'available';

    // Validación mínima
    if ($name === '' || $description === '' || $user_id <= 0) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Faltan campos obligatorios: name, description, user_id']);
        return;
    }

    // La imagen se procesa en $_FILES['photo']
    // Convertimos el binario a base64 y guardamos esa cadena en la columna photo.
    $photoBase64 = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['photo']['tmp_name'];
        $data = @file_get_contents($tmpName);
        if ($data !== false) {
            $photoBase64 = base64_encode($data);
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'No se pudo leer el archivo subido']);
            return;
        }
    }

    try {
        $sql = "INSERT INTO posts (name, description, user_id, photo, category, status)
                VALUES (:name, :description, :user_id, :photo, :category, :status)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);

        if ($photoBase64 !== null) {
            // guardamos la cadena base64
            $stmt->bindValue(':photo', $photoBase64, PDO::PARAM_STR);
        } else {
            $stmt->bindValue(':photo', null, PDO::PARAM_NULL);
        }

        $stmt->bindValue(':category', $category);
        $stmt->bindValue(':status', $status);

        $stmt->execute();
        $newId = (int)$conn->lastInsertId();

        http_response_code(201);
        echo json_encode([
            'status' => 'success',
            'message' => 'Publicación creada correctamente',
            'post_id' => $newId
        ]);
    } catch (PDOException $e) {
        http_response_code(500);
        error_log('DB POST error: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Error al insertar en la base de datos']);
    }
}
?>

