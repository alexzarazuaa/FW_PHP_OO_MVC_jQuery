// $(document).ready(function () {
//     console.log("entra paint menu")
//     paint_type_menu();
// });


// function paint_type_menu() {
//     var token = localStorage.getItem("id_token");
//     //console.log(token)
//     if (token) {
//         var info_data = { module: 'login', function: 'type_user' }
//         main('?', info_data)
//             .then(function (data) {
//                 console.log(data)
//                 if (data != 'false') {
//                     var type = JSON.parse(data);
//                     console.log(type)

//                     if (type[0]['type'] === 'admin') {
//                         console.log("admin")
//                         //añadir las opciones de usuarios y el orde de favoritos
//                         $('#print_menu').html(

//                             ' <div class="main-banner inner" id="home">' +

//                             '<header class="header">' +
//                             ' <div class="container-fluid px-lg-5">' +

//                             ' <nav class="py-4">' +
//                             '  <div id="logo">' +
//                             '  <h1> <a href="index.php?page=controller_home&op=list" data-tr="MASTERSPORT"><span class="fa fa-bold" aria-hidden="true"></span></a></h1></div>' +

//                             ' <label for="drop" class="toggle">Menu</label>' +
//                             '<input type="checkbox" id="drop" />' +
//                             '<ul class="menu mt-2">' +
//                             '<li><a href="index.php?page=controller_home&op=list" data-tr="Inicio"></a></li>' +

//                             '<li><a href="index.php?page=controller_shop&op=view" data-tr="Tienda"></a></li>' +
//                             '<li>' +

//                             '<label for="drop-2" class="toggle"> USUARIOS <span class="fa fa-angle-down" aria-hidden="true"></span>' +
//                             '</label>' +
//                             '<a href="#">USUARIOS <span class="fa fa-angle-down" aria-hidden="true"></span></a>' +
//                             '<input type="checkbox" id="drop-2" />' +
//                             '<ul>' +
//                             '<li><a href="index.php?page=controller_sport&op=list" data-tr="Usuarios"></a></li>' +
//                             '<li><a href="index.php?page=controller_like&op=list" data-tr="Likes"></a></li>' +
//                             '<li><a href="shop-single.html">Single Page</a></li>' +
//                             '</ul>' +
//                             '</li>' +

//                             '<li>' +

//                             '<label for="drop-2" class="toggle" data-tr="CONOCENOS"><span class="fa fa-angle-down" aria-hidden="true"></span></label>' +
//                             '<li>' +

//                             '<label for="drop-2" class="toggle">IDIOMA<span class="fa fa-angle-down" aria-hidden="true"></span> </label>' +
//                             '<a href="#">IDIOMA<span class="fa fa-angle-down" aria-hidden="true"></span></a>' +
//                             '<input type="checkbox" id="drop-2" />' +
//                             '<ul>' +

//                             '<select id="idioma">' +
//                             '<option id="btn-es" value="2" data-tr="Castellano"></option>' +
//                             '<option id="btn-en" value="0" data-tr="Inglés"></option>' +
//                             '<option id="btn-va" value="1" data-tr="Valenciano"></option>' +
//                             '</select>' +
//                             ' </ul>' +
//                             ' </li>' +
//                             '  <li><a href="index.php?page=contactus" data-tr="Contacto">Contact</a></li>' +
//                             ' <li>' +
//                             '   <div id="nick" class="nick_user"></div>' +
//                             '  <div id="container"></div>' +
//                             '  </li>' +

//                             ' <li>' +
//                             '   <a type="button" class="btn btn-success" href="index.php?page=controller_cart&op=view" data-tr="CARRITO"></a>' +
//                             ' </li>' +

//                             ' <li><a type="button" class="btn btn-danger" href="index.php?page=controller_login&op=logout" data-tr="Log Out"></a></li>' +


//                             '  </ul>' +

//                             '   </nav>' +

//                             '  </div>' +


//                             '  <ol class="breadcrumb2">' +

//                             '   <form class="search">' +


//                             '  <select id="talla">' +
//                             '   <option value="0" data-tr="Selecciona La Talla"></option>' +
//                             ' </select>' +


//                             '   <select id="marca">' +
//                             '   <option value="0" data-tr="Selecciona La Marca"></option>' +
//                             ' </select>' +


//                             '<section class="prod">' +
//                             '<input list="name" id="prod" name="prod" />' +
//                             '  <datalist id="name">' +
//                             '   </datalist>' +
//                             '    <div class="btn"><span id="searchlist" class="fa fa-search" aria-hidden="true"></span></div>' +
//                             '   </section>' +




//                             '  </form>' +
//                             ' </ol>' +


//                             ' </header>'
//                         )
//                     }
//                     if (type[0]['type'] === 'Client') {
//                         console.log("cliente")
//                         //añadir las opciones de usuarios y el orde de favoritos
//                         $('#print_menu').html(

//                             ' <div class="main-banner inner" id="home">' +

//                             '<header class="header">' +
//                             ' <div class="container-fluid px-lg-5">' +

//                             ' <nav class="py-4">' +
//                             '  <div id="logo">' +
//                             '  <h1> <a href="index.php?page=controller_home&op=list" data-tr="MASTERSPORT"><span class="fa fa-bold" aria-hidden="true"></span></a></h1></div>' +

//                             ' <label for="drop" class="toggle">Menu</label>' +
//                             '<input type="checkbox" id="drop" />' +
//                             '<ul class="menu mt-2">' +
//                             '<li><a href="index.php?page=controller_home&op=list" data-tr="Inicio"></a></li>' +

//                             '<li><a href="index.php?page=controller_shop&op=view" data-tr="Tienda"></a></li>' +
//                             '<li>' +

//                             '<label for="drop-2" class="toggle"> USUARIOS <span class="fa fa-angle-down" aria-hidden="true"></span>' +
//                             '</label>' +
//                             '<a href="#">USUARIOS <span class="fa fa-angle-down" aria-hidden="true"></span></a>' +
//                             '<input type="checkbox" id="drop-2" />' +
//                             '<ul>' +
//                             '<li><a href="index.php?page=controller_sport&op=list" data-tr="Usuarios"></a></li>' +
//                             '<li><a href="index.php?page=controller_like&op=list" data-tr="Likes"></a></li>' +
//                             '<li><a href="shop-single.html">Single Page</a></li>' +
//                             '</ul>' +
//                             '</li>' +

//                             '<li>' +

//                             '<label for="drop-2" class="toggle" data-tr="CONOCENOS"><span class="fa fa-angle-down" aria-hidden="true"></span></label>' +
//                             '<li>' +

//                             '<label for="drop-2" class="toggle">IDIOMA<span class="fa fa-angle-down" aria-hidden="true"></span> </label>' +
//                             '<a href="#">IDIOMA<span class="fa fa-angle-down" aria-hidden="true"></span></a>' +
//                             '<input type="checkbox" id="drop-2" />' +
//                             '<ul>' +

//                             '<select id="idioma">' +
//                             '<option id="btn-es" value="2" data-tr="Castellano"></option>' +
//                             '<option id="btn-en" value="0" data-tr="Inglés"></option>' +
//                             '<option id="btn-va" value="1" data-tr="Valenciano"></option>' +
//                             '</select>' +
//                             ' </ul>' +
//                             ' </li>' +
//                             '  <li><a href="index.php?page=contactus" data-tr="Contacto">Contact</a></li>' +
//                             ' <li>' +
//                             '   <div id="nick" class="nick_user"></div>' +
//                             '  <div id="container"></div>' +
//                             '  </li>' +

//                             ' <li>' +
//                             '   <a type="button" class="btn btn-success" href="index.php?page=controller_cart&op=view" data-tr="CARRITO"></a>' +
//                             ' </li>' +

//                             ' <li><a type="button" class="btn btn-danger" href="index.php?page=controller_login&op=logout" data-tr="Log Out"></a></li>' +


//                             '  </ul>' +

//                             '   </nav>' +

//                             '  </div>' +


//                             '  <ol class="breadcrumb2">' +

//                             '   <form class="search">' +


//                             '  <select id="talla">' +
//                             '   <option value="0" data-tr="Selecciona La Talla"></option>' +
//                             ' </select>' +


//                             '   <select id="marca">' +
//                             '   <option value="0" data-tr="Selecciona La Marca"></option>' +
//                             ' </select>' +


//                             '<section class="prod">' +
//                             '<input list="name" id="prod" name="prod" />' +
//                             '  <datalist id="name">' +
//                             '   </datalist>' +
//                             '    <div class="btn"><span id="searchlist" class="fa fa-search" aria-hidden="true"></span></div>' +
//                             '   </section>' +




//                             '  </form>' +
//                             ' </ol>' +


//                             ' </header>'
//                         )
//                     } else {
//                         console.log("fail");
//                         // $('#print_menu').before('<li><a type="button" class="btn btn-danger" href="<?php amigable("?module=login"); ?> data-tr="Login"></a></li>');
//                     }
//                 }//endiftoken
//             });//emd_ifpromise

//     }
// }


// var main = function (url, data) { //GENERAL FUNCTION RETURN PROMISE

//     console.log(data)

//     return new Promise(function (resolve) {
//         $.ajax({
//             type: "POST",
//             url: url,
//             data: data
//         })
//             .done(function (data) {
//                 resolve(data);
//             })
//     })
// };