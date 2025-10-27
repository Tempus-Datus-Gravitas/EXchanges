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
						data: {where: `id = ${id}`},
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
	}
});


