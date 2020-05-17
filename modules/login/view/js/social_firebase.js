// function config() {
//     // Initialize Firebase
//     var config = {
//         apiKey: "GHUB_API",
//         authDomain: "fw-php-mastersport.firebaseapp.com",
//         databaseURL: "https://fw-php-mastersport.firebaseapp.com",
//         projectId: "fw-php-mastersport",
//         storageBucket: "",
//         messagingSenderId: "messageSender"
//       };
//     firebase.initializeApp(config);
// }

// function login_ghub() {

//     var provider = new firebase.auth.GithubAuthProvider();
//     //provider.addScope('email');
//     var authService = firebase.auth();

//     document.getElementById('github-button').addEventListener('click', function() {
//         authService.signInWithPopup(provider)
//             .then(function (result) {
//                 alert("stop")
//                 var data = result.user.providerData[0];
//                 var info_data = { module: 'login', function: 'social_login', data: data }
//                 social('?', info_data)
//                 .then(function (data) {
//                     alert("stop")
//                     console.log(data)
//                     localStorage.setItem('id_token',data);
//                     toastr.success("LOGEADO CORRECTAMENTE.");
//                 })
//             }).catch(function (error) {
//                 console.log("error")
//                 toastr.error("FALLO EN EL INICIO DE SESION", "ERROR.");
//             });
    
//     })

// }


// // function google_login(){
// //     var provider = new firebase.auth.GoogleAuthProvider();
// //     provider.addScope('email');

// //     var authService = firebase.auth();

// //     $('#google_login').on('click', function(){
// //         authService.signInWithPopup(provider)
// //         .then(function(result) {
// //             var datos = result.user.providerData[0];
// //             $.ajax({
// //                 type: 'POST', 
// //                 url: pretty("?module=login&function=social_login"),
// //                 async:false, 
// //                 data : {datos: datos},
// //                 success: function (data) { 
// //                     localStorage.setItem('id_token',data);
// //                     coger_carrito_bd();
// //                     toastr.success("Login con exito","Done");
// //                     if(localStorage.getItem('last_page')!=null){
// //                         page=localStorage.getItem('last_page');
// //                         if(page=='carrito'){
// //                             setTimeout(' window.location.href = pretty("?module=cart");',1000);
// //                             localStorage.removeItem('last_page');
// //                         }
// //                     }else{
// //                         setTimeout(' window.location.href = pretty("?module=home");',1000);
// //                     }
// //                 },
// //                 error: function(){
// //                     toastr.error("Fallo","Fail");
// //                     setTimeout(' window.location.href = pretty("?module=login");',1000);
// //                 }
// //             });
// //         })
// //         .catch(function(error) {
// //             console.log('Se ha encontrado un error:', error);
// //         });
// //     })
// // }



// var social = function (url, data) { //GENERAL FUNCTION RETURN PROMISE

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
// $(document).ready(function () {

//     console.log(" social login ");

//     config();
//     login_ghub();




// });//ENDREADY