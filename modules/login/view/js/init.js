$(document).ready(function () {
    console.log("entra paint menu")
    paint_type_menu();
    
});

function paint_type_menu() {
    var token = localStorage.getItem("id_token");
    //console.log(token)
    if (token) {
        var info_data = { module: 'login', function: 'type_user' }
        main('?', info_data)
            .then(function (data) {
                //console.log(data)
                if (data != 'false') {
                    var type = JSON.parse(data);
                    //console.log(type)

                    if (type[0]['type'] === 'admin') {
                        console.log("admin")
                        //añadir las opciones de usuarios y el orde de favoritos
                        $('#print_menu').html(
                         
                            '<li>'+
                        
                            '<label for="drop-2" class="toggle"> USUARIOS <span class="fa fa-angle-down" aria-hidden="true"></span>'+
                            '</label>'+
                            '<a href="#">USUARIOS <span class="fa fa-angle-down" aria-hidden="true"></span></a>'+
                           ' <input type="checkbox" id="drop-2" />'+
                            '<ul>'+
                            '<li><a href="index.php?page=controller_sport&op=list" data-tr="Usuarios">Usuarios</a></li>'+
                            '<li><a href="index.php?page=controller_like&op=list" data-tr="Likes">Likes</a></li>'+
                            '</ul>'+
                          '</li>'
                                 

                        )
                        $("#print_main").html(
                           
                            '<li><a href="index.php?page=controller_sport&op=list" data-tr="Usuarios">Usuarios</a></li>'+
                            '<li><a href="index.php?page=controller_like&op=list" data-tr="Likes">Likes</a></li>'+
                            '<li><a href="shop-single.html">Single Page</a></li>'
                          )
  
                        $('#logout_btn').html(
                            ' <li><a type="button" class="btn btn-danger" data-tr="Log Out" value="">SALIR</a></li>' 
                        )
                    } else if(type[0]['type'] === 'Client') {
                        console.log("cliente")
                        //añadir las opciones de usuarios y el orde de favoritos
                        $('#print_menu_client').html(
                      
                            ' <li>' +
                            '   <div id="nick" class="nick_user"></div>' +
                            '  <div id="container"></div>' +
                            '  </li>' +
                            ' <li><a type="button" class="btn btn-danger" data-tr="Log Out" value="">SALIR</a></li>' 


                           
                        )
                        }
                }//endiftoken
            });//emd_ifpromise
        

    }else {
        //console.log("fail");
         $('#login_register').append("<li><a   type='button' class='btn btn-danger' href='<?php amigable('?module=login'); ?>' data-tr='Login'></a>></a></li>");
    }
}

function logout(){
    console.log("LOGOUT!")
        if(auth_state()){
            firebase.auth().signOut()
            .then(function(){
                console.log("SOCIAL LOGOUT");
            });
        }
        localStorage.removeItem("id_token");
}



var main = function (url, data) { //GENERAL FUNCTION RETURN PROMISE

    console.log(data)

    return new Promise(function (resolve) {
        $.ajax({
            type: "POST",
            url: url,
            data: data
        })
            .done(function (data) {
                resolve(data);
            })
    })
};