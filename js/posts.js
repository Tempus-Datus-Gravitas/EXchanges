let cards = $("#cards");
let link = "http://localhost/EXchanges/";
$(window).on("load", function(){
	switch ($('title').text()){
		case "Inicio":
			$.ajax({
				url: `${link}/api.php`,
				method: "GET",
				success: function(response) {
					let posts = response.data;
					posts.forEach(post => {
						cards.append(`
							<div class="card" onclick="window.location.href='${link}/publicacion.php?where=id=${post.id}'">
								<div class="image">
								<img src="data:image/webp;base64,${post.photo}" alt="${post.name}">
								</div>
								<h2>${post.name}</h2>
							</div>
										`);

					});
				},
				error: function(response) {
					console.log(response);
				}
				});
		break;
		
		case "Ofertas":
			$.ajax({
				url: `${link}/api.php`,
				method: "GET",
				data: { where: "status='available'" },
				success: function(response){
					let posts = response.data;
					posts.forEach(post => {
						cards.append(`
							<div class="card" onclick="window.location.href='${link}/publicacion.php?where=id=${post.id}'">
								<div class="image">
								<img src="data:image/webp;base64,${post.photo}" alt="${post.name}">
								</div>
								<h2>${post.name}</h2>
							</div>
						`);

					});
				}
			});
		break;

		case "Categorías":
			$('div.ofertas-categoria').each(function(){
				const category = $(this).find('h2').text();
				$.ajax({
					url: `${link}/api.php`,
					method: "GET",
					data: { where: `category = "${encodeURIComponent(category)}"`},
					success: function(response){
						let posts = response.data;
						posts.forEach(post => {
							$(`.${encodeURIComponent(category)}`).append(`
							<div class="card" onclick="window.location.href='${link}/publicacion.php?where=id=${post.id}'">
									<div class="image">
									<img src="data:image/webp;base64,${post.photo}" alt="${post.name}">
									</div>
									<h2>${post.name}</h2>
							</div>
										`);

						});
					}
				});
			});
		break;	

		case "Publicación":
			const queryString = window.location.search;
			const urlParams = new URLSearchParams(queryString);
			const whereClause = urlParams.get('where');
				if (whereClause) {
				    const parts = whereClause.split('=');
				    const id = parts[1];

					$.ajax({
						url: `${link}/api.php`,
						method: "GET",
						data: {where: `id = ${id}`, limit: "1"},
						success: function(response){
							let posts = response.data;
							posts.forEach(post => {
								$('.contenedor-producto').append(`
									   <div class="imagen-producto">
										<img src="data:image/webp;base64,${post.photo}" alt="${post.name}">
									    </div>

									    <div class="info-producto">
									      <div>
										<h1 class="titulo">${post.name}</h1>

										<p class="descripcion">${post.description}</p>
									      </div>

									      <div class="botones"post.description>
										<button class="comprar">EXchange</button>
										<button class="carrito">Mensaje</button>
									      </div>
									    </div>
								`);

							});
						}
					});

				} else {
				    console.log("Hubo un error al inresar");
				}			
		break;
		case "Crear Publicación":
			$('#But').on('click', function(){
				const name = $('#Tit').val();
				const description = $('#Des').val();
				const category = $('#Cate').val();
				const photoFile = $('#Img')[0].files[0];

				// Convertir imagen a base64
				const reader = new FileReader();
				reader.onload = function(e) {
					const base64Image = e.target.result.split(',')[1]; // Obtiene la img en base64 (q vaguez hacer esto)

					$.ajax({
						url: `${link}/api.php`,
						type: "POST",
						data: { 
							table: "posts", what: "name, description, user_id, photo, category, status", values:  `'${name}', '${description}', 1, '${base64Image}', '${category}', 'available'`
						},
						dataType: "json",
						success: function(response){
							if (response.status === "success") {
								alert("Publicación creada exitosamente. Redirigiendo...");
							} else {
								alert("Hubo un error al crear la publicación. Por favor, inténtalo de nuevo.");
							}}
					});
				};
				reader.readAsDataURL(photoFile);
			});
		break;
	}
});


