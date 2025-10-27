let cards = $("#cards");


$(window).on("load", function(){
	switch ($('title').text()){
		case "Inicio":
				$.ajax({
					url: "http://localhost/EXchanges/api.php",
					method: "GET",
					success: function(response) {
						let posts = response.data;
						posts.forEach(post => {
							cards.append(`
								<div class="card">
									<div class="image">
									<img src="data:image/webp;base64,${post.photo}" alt="${post.name}">
									</div>
									<h2>${post.name}</h2>
								</div>
											`);

						});
						console.log(posts);
					},
					error: function(response) {
						console.log(response);
					}
				});
		break;
		
		case "Ofertas":
				$.ajax({
					url: "http://localhost/EXchanges/api.php",
					method: "GET",
					data: { where: "status='available'" },
					success: function(response){
						let posts = response.data;
						posts.forEach(post => {
							cards.append(`
								<div class="card">
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
					url: "http://localhost/EXchanges/api.php",
					method: "GET",
					data: { where: `category = "${encodeURIComponent(category)}"`},
					success: function(response){
						let posts = response.data;
						posts.forEach(post => {
							$(`.${encodeURIComponent(category)}`).append(`
								<div class="card">
									<div class="image">
									<img src="data:image/webp;base64,${post.photo}" alt="${post.name}">
									</div>
									<h2>${post.name}</h2>
							</div>
										`);

						});
						console.log(response.data);
					}
				});
			});
	break;	
}

});
