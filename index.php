<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" href="img/logo.png">
		<link rel="stylesheet" href="css/inicio.css">
		<link rel="stylesheet" href="css/bar.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Expletus Sans' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Inicio</title>
	</head>
	<body> 
		<?php 
			header('Content-Type: text/html; charset=UTF-8');
			include 'bar.php';
		?>
		<div id="container">
				<div id="sectiontitle">
				<p>Publicados recientemente</p>
				</div>
			<div id="cards">
				<?php 
					require_once 'conexion.php';
					$query = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 8";
					$result = mysqli_query($conn, $query);
					$json = array();
					if ($result) {
						while ($row = mysqli_fetch_assoc($result)) {
							$json[] = array(
								'photo' => $row['photo'],
								'name' => $row['name'],
								'description' => $row['description']
							);
							echo '<div class="card">
								<div class="image">
									<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'" alt="Imagen del producto">
								</div>
									<h2>'.$row['name'].'</h2>
									<p>'.$row['description'].'</p>
								</div>';
						}
					}else{
						echo "<p style=text-align:center>No hay publicaciones</p>";
					}
				?>
			</div>
		</div>
		<script src="lib/jquery-3.7.1.min.js.js"></script>
		<script src="js/posts.js"></script>

	</body>
</html>
