<?php
include('conexion.php');
include('bar.php');
session_start();

if ($_POST); {

  $id=(isset($_POST['id']))?$_POST['id']:"";
	$name=(isset($_POST['name']))?$_POST['name']:"";
	$description=(isset($_POST['description']))?$_POST['description']:"";
	$user_id=(isset($_POST['user_id']))?$_POST['user_id']:"";
	$FOREIGN=(isset($_POST['FOREIGN']))?$_POST['FOREIGN']:"";
	$category=(isset($_POST['category']))?$_POST['category']:"";
	$photo=(isset($_FILES['photo']['name']))?$_FILES['photo']['name']:"";
	$status=(isset($_POST['status']))?$_POST['status']:"";
	$created_at=(isset($_POST['created_at']))?$_POST['created_at']:"";
}



?>
<!doctype html>
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
  <title>Crear publicación</title>
</head>
<body>
  <h1>Crear publicación</h1>
  <div class="titu">
    <label for="" class="form-label">Titulo</label> </br>
    <input
      type="text"
      class="form-control"
      name="Titulo"
      id=""
      aria-describedby="helpId"
      placeholder="Titulo"
    />
  </div>

  <div class="descrip">
    <label for="" class="form-label">Descripción</label></br>
    <input
      type="text"
      class="form-control"
      name="Descripción"
      id=""
      aria-describedby="helpId"
      placeholder="Descripción"
    />
  </div>

  <div class="img">
    <label for="" class="form-label">Imagen</label> </br>
    <input
      type="file"
      class="form-control"
      name="Imagen"
      id="Imagen"
      placeholder=""
      aria-describedby="fileHelpId"
    />
  </div>
  
  
    <label for="" class="form-select">Categoría</label> </br>
<select class="form-select" aria-label="Default select example">
  <option selected>Ninguna</option>
  <option value="1">Vestimenta</option>
  <option value="2">Herramientas</option>
  <option value="3">Accesorios</option>
  <option value="4">Cocina</option>
  <option value="5">Tecnologia</option>
  <option value="6">Fitness & Deporte</option>
  <option value="7">Belleza</option>
  <option value="8">Entretenimiento</option>
  <option value="9">Hogar & Muebles</option>
</select>
<script src=js/bar.js></script>
</body>
</html>