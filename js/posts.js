let cards = $("#cards");
if ($('title').text() === "Inicio") {
	$(window).on("load", function() {

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
	});
}
