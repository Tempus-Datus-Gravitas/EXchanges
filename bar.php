<header>
	<div id="name">
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
		<li><a><i class="fa-solid fa-laptop"></i>Belleza</a></li>
		<li><a>Entretenimiento</a></li>
		<li><a>Hogar y muebles</a></li>
	</ul>
	<i id="usercircle" class="fa-regular fa-user-circle"></i>
	<ul class="listing fromuser">
		<div id="userlogin">
		     <i class="fa-regular fa-circle-user"></i>
		     <a href="login.php"><p>Iniciar sesión</p></a>
		</div>
		<li><a>Configuración de la cuenta</a></li>
		<li><a>Permutaciones hechas</a></li>
		<li><a>Mis publicaciones</a></li>
		<li><a>Notificaciones</a></li>
		<li><a>Cerrar sesión</a></li>
	</ul>
	<i id="burger" class="fa-solid fa-bars"></i>
	<ul id="burger-menu">
		
	</ul>
	
</header>
<script src="lib/jquery-3.7.1.min.js.js"></script>
<script src="js/bar.js"></script>
<?php
header('Content-Type: text/html; charset=UTF-8');
?>
