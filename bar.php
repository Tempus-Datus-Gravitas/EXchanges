<?php
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	include 'conexion.php';
?>
<header>
	<div id="name" onclick="location.href='index.php'">
			<h1 id="title">EX</h1>
			<h1 id="subtitle">changes</h1>
	</div>
	<input type="text" placeholder=" Buscar"></input>
	<ul id="navegacion">
		<li><a class="normal" href="index.php"><i class="fa-solid fa-house"></i>Inicio</a></li>
		<li><a class="normal" href="ofertas.php"><i class="fa-solid fa-tags"></i>Ofertas</a></li>
		<li><a class="normal" href="categorias.php"><i class="fa-solid fa-shapes"></i>Categorías</a><i class="arrow fa-solid fa-caret-down"></i></li>
		<li><a class="normal" href="chats.php"><i class="fa-solid fa-comment"></i>Chats</a></li>
	</ul>
	<ul class="listing fromcategory">
		<li><a><i class="fa-solid fa-shirt"></i>Vestimenta</a></li>
		<li><a><i class="fa-solid fa-toolbox"></i>Herramientas</a></li>
		<li><a><i class="fa-solid fa-ring"></i>Accesorios</a></li>
		<li><a><i class="fa-solid fa-spoon"></i>Cocina</a></li>
		<li><a><i class="fa-solid fa-laptop"></i>Tecnología</a></li>
		<li><a><i class="fa-solid fa-basketball"></i>Fitness y deporte</a></li>
		<li><a><i class="fa-solid fa-brush"></i>Belleza</a></li>
		<li><a><i class="fa-solid fa-dumbbell"></i>Entretenimiento</a></li>
		<li><a><i class="fa-solid fa-couch"></i>Hogar y muebles</a></li>
	</ul>
	<?php
		if (ISSET($_SESSION['user_username'])){
			echo '<div id="usercircle">
				<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['user_pfp']).'" alt="Tu Foto">
			      </div>';
		}else{
			echo '<div id="usercircle">
				<i class="fa-regular fa-user-circle"></i>
			      </div>';
		}
	?>
	<ul class="listing fromuser">
		<div id="userlogin">
		<?php	
				if (ISSET($_SESSION['user_username'])) {
					echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['user_pfp']).'" alt="Foto de perfil">
					      <a href="perfil.php"><p>'.$_SESSION['user_username'].'</p></a>';
				}else{
					echo '<i class="fa-regular fa-circle-user"></i>
					<a href="login.php"><p>Iniciar sesión</p></a>';
				}
			?>

		</div>
		<?php
			if (ISSET($_SESSION['user_username'])) {
				echo '<li><a href="crearpublicacion.php">Crear publicación</a></li>
				      <li><a href="">Mis publicaciones</a></li>
				      <li><a href="">Notificaciones</a></li>
				      <li><a href="cerrarsesion.php">Cerrar sesión</a></li>';
			}else{
				echo '<li><a href="register.php">Registrarse</a></li>';
			}

			if (ISSET($_SESSION['user_username']) && $_SESSION['user_admin'] == 1) {
				echo '<li><a href="admin.php">Panel de administrador</a></li>';
			}
		?>
	</ul>
	<i id="burger" class="fa-solid fa-bars"></i>
	<ul id="burger-menu">
		
	</ul>
	
</header>
<script src="lib/jquery-3.7.1.min.js.js"></script>
<script src="js/bar.js"></script>

