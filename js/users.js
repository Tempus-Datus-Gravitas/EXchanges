let link = "http://localhost/EXchanges";
$(window).on("load", function(){
	switch ($('title')){
		case "Perfil":
			$.ajax({
				url: `${link}/api.php`,
				method: "GET",
				data: {table: "user"}
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
	}
});
