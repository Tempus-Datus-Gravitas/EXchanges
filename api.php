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

    $whereClause = '1';
    $whereParams = [];
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $whereClause = 'id = :id';
        $whereParams[':id'] = $_GET['id'];
    }
    
    $sortColumn = isset($_GET['sort']) && in_array($_GET['sort'], $allowedSortColumns) ? $_GET['sort'] : 'id';
    
    try {
        $sql = 'SELECT ' . $what . ' FROM `' . $table . '` WHERE ' . $whereClause . ' ORDER BY `' . $sortColumn . '` ' . $order;
        $stmt = $conn->prepare($sql);
        
        foreach ($whereParams as $placeholder => $value) {
            $stmt->bindValue($placeholder, $value);
       	}

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
?>

