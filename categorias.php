<!DOCTYPE html>
<html>
	<head>
	   <link rel="icon" href="img/logo.png">
	   <link rel="stylesheet" href="css/inicio.css">
	   <link rel="stylesheet" href="css/bar.css">
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	   <link rel="stylesheet" href="css/categorias.css">
	   <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
	   <link href='https://fonts.googleapis.com/css?family=Expletus Sans' rel='stylesheet'>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <title>Categorías</title>
	</head>
	<body>
		<div class="cargando">
			<img src="https://i.gifer.com/ZZ5H.gif" alt="Cargando">
		</div>
		<?php include 'bar.php'; ?>
	<div id="container">
		<div id="sectiontitle"><p>Categorías disponibles</p></div>
		<div id="categories">
			<?php
				include 'conexion.php';
				try{
					$sql = 'SELECT DISTINCT category FROM posts';
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
						$category = htmlspecialchars($row['category']);
						echo "<div class='ofertas-categoria'>"
							."<h2>$category</h2>"
							."<div id='cards' class='{$category}'></div>"
							."</div>";
					       	
					} 
					
				} catch (PDOException $e) {
					http_response_code(500);
					error_log('Database query failed: ' . $e->getMessage());
					echo json_encode([
					    'status' => 'error',
					    'message' => 'Error de server'
					]);
					
				}	
			?>

		</div>
	</div>
	<script src="lib/jquery-3.7.1.min.js.js"></script>
	<script>
	var cargando = document.querySelector(".cargando");
	window.addEventListener('load', function() {
		cargando.style.display = 'none';
	})
	</script>
	<script src="js/posts.js"></script>
	</body>
</html>
