$(document).ready(function(){
    data_count();
});
function data_count(){
    $.ajax({
        url: "add_cart",
        type: "POST",
        data:{
        count: 1
        },
        success: function(data){
            $('#count').html(data);
        }
    });
}
function add_cart(id){
        $.ajax({
            url: "add_cart",
            type: "POST",
            data:{
            add_cart: id
            },
            success: function(data){
                $('#add_success').toast('show');
                data_count();
            }
        });
}

function open_cart(){
    $('#open_cart').offcanvas('show');
    data_panier();
}

function data_panier(){
    $.ajax({
        url: "add_cart",
        type: "POST",
        data:{
        data_panier: 1
        },
        success: function(data){
           $('#content_panier').html(data);
           total();
        }
    });
}
function total(){
    $.ajax({
        url: "add_cart",
        type: "POST",
        data:{
        total: 1
        },
        success: function(data){
           $('#total_value').html(data);
        }
    });
}

function delete_cart(id){

    $.ajax({
        url: "add_cart",
        type: "POST",
        data:{
        delete: id
        },
        success: function(data){
            data_panier();
            data_count();
        }
    });
}