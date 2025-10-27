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
    //Lo de abajo es  //Lo de abajo es un montón de sanitización y cosas de esas. 
    $table = isset($_GET['table']) && in_array($_GET['table'], $allowedTables) ? $_GET['table'] : 'posts';
    $order = isset($_GET['order']) && in_array(strtoupper($_GET['order']), $allowedOrderDirections) ? strtoupper($_GET['order']) : 'DESC';
    $what = isset($_GET['what']) ? $_GET['what'] : '*';
    $whereClause = isset($_GET['where']) ? $_GET['where'] : '1';
    $limit = isset($_GET['limit']) ? $_GET['limit'] : '20';
    $sortColumn = isset($_GET['sort']) && in_array($_GET['sort'], $allowedSortColumns) ? $_GET['sort'] : 'id';

    try {
$sql = 'SELECT ' . $what . ' FROM `' . $table . '` WHERE ' . $whereClause . ' ORDER BY `' . $sortColumn . '` ' . $order .' LIMIT ' . $limit;
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
    global $conn, $allowedTables, $allowedSortColumns, $allowedOrderDirections;

    // Campos mínimos
    $table = isset($_GET['table']) && in_array($_GET['table'], $allowedTables) ? $_GET['table'] : 'posts';
    $what = isset($_POST['what']) ? trim($_POST['what']) : '';
    $values = isset($_POST['values']) ? trim($_POST['values']) : '';
}


?>

