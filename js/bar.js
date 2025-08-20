//Función que definie cual .php se cargó para poner una linea abajo del nombre
window.onload = (event) => {
	$('.normal').each(function() {
		if ($(this).text() == document.querySelector('title').textContent) {
			$(this).addClass('active');
		}
	});
};

let state='inactive';
$('.arrow').on('click', function() {
   if (state === 'inactive') {
		if (userstatus === 'active') {
			$('.fromuser').css('display', 'none');
			userstatus = 'inactive';
		}
		$('.arrow').removeClass('fa-caret-down');
        	$('.arrow').addClass('fa-caret-up');
	   	$('.fromcategory').css('display', 'block');
	   	state = 'active';
	}else if (state === 'active') {
		$('.arrow').removeClass('fa-caret-up');
 		$('.arrow').addClass('fa-caret-down');
		$('.fromcategory').css('display', 'none');
	    	state = 'inactive';
	}});

let userstatus = "inactive";
$('#usercircle').on('click', function() {
        if (userstatus === "inactive") {
            if (state === 'active') {
                $('.fromcategory').css('display', 'none');
                state = 'inactive';
            }
            if (burgerstatus === 'active') {
		    $('.arrow').removeClass('fa-caret-up');
		    $('.arrow').addClass('fa-caret-down');
		    $('#navegacion').css('display', 'none');
		    $('.fromburger').css('display', 'none');
		    $('.fromcategory').css('display', 'none');
		    burgerstatus = 'inactive';
            }
	    $('.fromuser').css('display', 'block');
	    userstatus = "active";
	}else if (userstatus === "active") {
	    $('.fromuser').css('display', 'none');
	    userstatus = "inactive";
	}
});

// Crea hamburgesa con su contenido 
let burgerstatus = 'inactive';
$('#burger').on('click', function() {
   if (userstatus === 'active') {
	$('.fromuser').css('display', 'none');
	$('#navegacion').css('display', 'none');
	userstatus = 'inactive';
    }
   if (burgerstatus === 'active') {
	$('#navegacion').css('display', 'none');
	burgerstatus = 'inactive';
    }else if (burgerstatus === 'inactive') {
	$('#navegacion').css('display', 'block');
	burgerstatus = 'active';
	
    }
});
