$(document).ready(function(){
    console.log("entra paint menu")
    paint_type_menu();
});


function paint_type_menu(){
    //var token = localStorage.getItem("id_token");
  
    	var info_data = { module: 'login', function: 'type_user' }
		reg('?', info_data)
			.then(function (data) {
                console.log(data)
             if (data != 'false') {
                 var type = data ;
                 console.log(type)
            //     if (type[0].type === 'admin') {

            //         //añadir las opciones de usuarios y el orde de favoritos
            //         $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=dogs&funciton=create_dogs') + '">Perros</a></li>');
            //         $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=ubication&funciton=list_ubication') + '">Ubicacion</a></li>');
            //         $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=login&funciton=profile_list') + '">Profile</a></li>');
            //     }
            //     if (type[0].type === 'Client') {
            //                 //hacer un print añadiendo el avatar i nick del user como anteriormente
            //         $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=dogs&funciton=create_dogs') + '">Perros</a></li>');
            //         $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=ubication&funciton=list_ubication') + '">Ubicacion</a></li>');
            //         $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=login&funciton=profile_list') + '">Profile</a></li>');
            //     }
            // }else{
            //     $('#print_menu').before('<li class="nav-item" ><a class="nav-link" href="' + amigable('?module=login&funciton=list_login') + '">Iniciar Sesion</a></li>');        
             }
        });
    
}

var reg = function (url, data) { //GENERAL FUNCTION RETURN PROMISE

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