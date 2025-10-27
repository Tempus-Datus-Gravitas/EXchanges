<?php
include('bar.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Crear publicación</title>
</head>
<body>
</br></br></br>
  <h1>Crear publicación</h1>
  <div class="titu">
    <label for="" class="form-label">Titulo</label> </br>
    <input
      type="text"
      class="form-control"
      name="Titulo"
      id="Tit"
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
      id="Des"
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
      id="Img"
      placeholder=""
      aria-describedby="fileHelpId"
    />
  </div>
  
    <label>Categoría</label> </br>
<select class="form-select" id="Cate" aria-label="Default select example">
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

</br>
<input
  name=""
  id="But"
  class="btn btn-primary"
  type="button"
  value="Publicar"
/>

<script src="js/post.js"></script>
<script src="lib/jquery-3.7.1.min.js.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src=js/bar.js></script>
</body>
</html>