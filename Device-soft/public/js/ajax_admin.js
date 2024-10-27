$(document).ready(function(){
    setInterval(function(){
            data_message();
    },5000);
});

function envoyez_admin(){
var message=$('#message').val();
var id=$('#hidden_id').val();
if(message == ''){
    alert('Impossible d\'envoyez un message vide');
}else{
$.ajax({
    url: "data_message",
    type: "POST",
    data: {
        message_admin: message,
        id: id
    },
    success: function(data){
        const audio = new Audio("son/send.mp3" );
        audio.play();
        $('#message').val('');
        $('#scroll').html(data);
        element = document.getElementById('scroll');
        element.scrollTop = element.scrollHeight;
    }
});
}
}
function data_message(){
    var id=$('#hidden_id').val();
$.ajax({
    url: "data_message",
    type: "POST",
    data: {
        data_messages: 1,
        id: id
    },
    success: function(data){
        $('#scroll').html(data);
        element = document.getElementById('scroll');
        element.scrollTop = element.scrollHeight;
    }
});
}

