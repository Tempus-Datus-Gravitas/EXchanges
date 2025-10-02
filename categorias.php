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
		<?php include 'bar.php'; ?>
	<div id="container">
		<div id="sectiontitle"><p>Categorías disponibles</p></div>
		<div id="categories">
			<?php
				include 'conexion.php';
				$query = "SELECT DISTINCT category FROM posts";
				$result = mysqli_query($conn, $query);
				while ($row = mysqli_fetch_assoc($result)) {
					$categoria = htmlspecialchars($row['category']);
					echo "<div class='ofertas-categoria'>"
						."<h2>$categoria</h2>"
						."<div id='cards'>";
					$query2 = "SELECT * FROM posts WHERE category='$categoria' ORDER BY id DESC LIMIT 5";
					$result2 = mysqli_query($conn, $query2);
					while ($row2 = mysqli_fetch_assoc($result2)) {
						echo "<div class='card'>"
							."<div class='image'>"
							."<img src=data:image/jpeg;base64,".base64_encode($row2['photo'])." alt='Imagen del producto'>"
							."</div>"
							."<h3>".$row2['name']."</h3>"
							."</div>";
					}
					echo "</div>"
					."</div>";
				}
				mysqli_close($conn);
			?>
		</div>
	</div>
	</body>
</html>
