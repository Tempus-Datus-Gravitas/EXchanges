// ---------------
// Notificaciones en el sitio (toast)
// ---------------

function notify(title, message, icon) {
    $('#notify').remove(); // Elimina notificaciones previas
    let notify = $('<div id="notify" class="notify"></div>');
    notify.append(`<h3>${title}</h3>`);
	    notify.append(`<p>${message}</p>`);
	    if (icon) {
	notify.append(`<img src="${icon}" alt="Icono de notificación">`);
		    	    }
	    $('body').append(notify);
	    notify.css({
	'position': 'fixed',
	'top': '20px',
	'right': '20px',
	'background-color': '#333',
	'color': '#fff',
	'padding': '10px 20px',
	'border-radius': '5px',
	'z-index': 1000,
	'box-shadow': '0 2px 10px rgba(0,0,0,0.1)',
	'transition': 'opacity 0.3s ease-in-out'
		    	    });
	    setTimeout(() => {
		notify.css('opacity', '0');
		setTimeout(() => {
		    notify.remove();
		}, 300);
	    }, 3000); // Desaparece después de 3 segundos
	    notify.on('click', function() {
		notify.css('opacity', '0');
		setTimeout(() => {
		    notify.remove();
		}, 300);
}

