let link = "http://localhost/EXchanges";
let pollingInterval;
let isFirstLoad = false;

$(document).ready(function(){
	$.ajax({
		url: `${link}/api.php`,
		method: "GET",
		data: {
		    table: 'chats'
		},
		dataType: "json",
		success: function(response) {
		    $('.chat-list').empty();
		    if (response.data && response.data.length > 0) {
			response.data.forEach(chat => {
			    const pfpSource = `data:image/webp;base64,${chat.pfp}`;

			    const chatItem = `
				<div class="chat-item" data-chat-id="${chat.chat_id}">
				    <img src="${pfpSource}" alt="${chat.username}">
				    <div class="chat-info">
					<strong>${chat.username}</strong>
				    </div>
				</div>
			    `;
			    $('.chat-list').append(chatItem);
			});
		    } else {
			$('.chat-list').html('<div class="chat-placeholder">No tienes chats aún.</div>');
		    }
		},error: function(xhr){
			$('.chat-list').empty();
             		$('.chat-list').html('<div class="chat-placeholder">Error al cargar la lista de chats.</div>');
		}
	});
});
$('.chat-list').on('click','.chat-item', function(){
    $('.chat-placeholder').hide();
    $('.chat-item').removeClass('active');
    $(this).addClass('active');

    const chatId = $(this).data('chat-id');
    
    $('.chat-window').data('current-chat-id', chatId); 

    loadChat(chatId);
});

function loadChat(id){
    clearInterval(pollingInterval);

    if ($('.chat-messages').length === 0) {
        $('.chat-window').html('<div class="chat-loading">Cargando mensajes...</div>');
    }
    fetchMessages(id);
    pollingInterval = setInterval(function() {
        fetchMessages(id);
    }, 3000);
}
function fetchMessages(id){
	const shouldInitializeUI = $('.chat-messages').length === 0;
	$.ajax({
        url: `${link}/api.php`,
        method: "GET",
        data: {
            table:'messages',
            where:`chat_id = ${id}`,
	    sort:'timestamp',
            order: 'ASC'
        },
        dataType: "json",
        success: function(response){
            let messages = response.data;
		if (shouldInitializeUI){
                $('.chat-loading').remove();
                $('.chat-window').html('<div class="chat-messages"></div>'); 
                $('.chat-window').append(`
                    <div class="chat-input-area">
                        <input placeholder="Escribe un mensaje aquí" id="message"></input>
                        <button id="send-message" type="button">&#xf1d8</button>
                    </div>
                `);
            } else {
                $('.chat-messages').empty();
            }           
		messages.forEach(message => {
                	if (message.sender_id == CURRENT_USER_ID){
                    		$('.chat-messages').append(`<div class="yourMessage"><p>${message.message}</p></div>`);
                	} else {
                    		$('.chat-messages').append(`<div class="theirMessage"><p>${message.message}</p></div>`);
                	}
            });
            $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);

        }
	});
}

$(document).on('click', '#send-message',function(){
	sendmessage();
 });

$(document).on('keyup', '#message',function(){
	if (e.key === 'Enter'){
		sendmessage();
	}
});
function sendmessage(){
    const chatId = $('.chat-window').data('current-chat-id'); 
    const messageText = $('#message').val();

    $.ajax({
        url: `${link}/api.php`,    
        method: `POST`,
        data: {
	    what: 'message, chat_id, sender_id',
            table: 'messages',
            chat_id: chatId,               
            message: messageText
        },
        success: function(response) {
            $('#message').val(''); 
	    loadChat(chatId); 
        }
    }); 

}
