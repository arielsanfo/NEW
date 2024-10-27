$(document).ready(function(){
        setInterval(function(){
                data_message();
        },5000);
});
function charger(id){
    $.ajax({
        url: "data_categorie",
        type: "POST",
        data: {
            id_categorie: id
        },
        success: function(data){
            $('#content_data').html(data);
        }
    });
}
function menu(){
    $('#menu').offcanvas('show');
}
function change_categorie(id){
    $.ajax({
        url: "data_categorie",
        type: "POST",
        data: {
            id_categories: id
        },
        beforeSend: function(){
            $('#content').html("<i class='bx bx-color bx-flashing bx-md'></i>");
        },
        success: function(data){
            $('#content').html(data);
        }
      
    });
}

function envoyez(){
    var message=$('#message').val();
    var id=$('#hidden_id').val();
   if(message == ''){
        alert('Impossible d\'envoyez un message vide');
   }else{
    $.ajax({
        url: "data_message",
        type: "POST",
        data: {
            message: message,
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
    $.ajax({
        url: "data_message",
        type: "POST",
        data: {
            data_message: 1
        },
        success: function(data){
            $('#scroll').html(data);
            element = document.getElementById('scroll');
            element.scrollTop = element.scrollHeight;
        }
    });
}

function chatbot(){
    $('#chatbot').modal('show');
    $('#menu').offcanvas('hide');
    data_bot();
    element = document.getElementById('scrolls');
    element.scrollTop = element.scrollHeight;
}
function data_bot(){
    $.ajax({
        url: "chatbot",
        type: "POST",
        data: {
            data_message: 1
        },
        success: function(data){
            $('#discussion').html(data);
            element = document.getElementById('scrolls');
            element.scrollTop = element.scrollHeight;
        }
    });
}
function bot(){
    var question=$('#question').val();
    if(question != ''){
        $.ajax({
                url: "chatbot",
                type: "POST",
                data: {
                    question: question
                },
                beforeSend: function(){
                    $('#en_cours').html('<div class="d-flex justify-content-center"><div class=""><p class="bg-dark text-white p-1" style="cursor: pointer;"><i class="bx bx-stop"></i>&nbsp;Recherche en cours <span class="bx-flashing">...</span></p></div></div>');
                },
                success: function(data){
                    element = document.getElementById('scrolls');
                    element.scrollTop = element.scrollHeight;
                    $('#question').val('');
                        setTimeout(function(){
                            data_bot(); 
                            $('#en_cours').html('');
                            element = document.getElementById('scrolls');
                            element.scrollTop = element.scrollHeight;

                        },2000);
                        

                        // on prend les dernières reponse dans la bd 
                        setTimeout(function(){
                            $.ajax({
                                url: "chatbot",
                                type: "POST",
                                data: {
                                    last_search:1
                                },
                                success: function(data){
                                    data_bot();
                                    $('#last_search').html(data);
                                    element = document.getElementById('scrolls');
                                    element.scrollTop = element.scrollHeight;
                                }
                            });
                        },5000);
                }
        });
       
    }
}

