function config() {
    // Initialize Firebase
    var config = {
        apiKey: GHUB_API,
        authDomain: "fw-php-mastersport.firebaseapp.com",
        databaseURL: "https://fw-php-mastersport.firebaseapp.com",
        projectId: "fw-php-mastersport",
        storageBucket: "",
        messagingSenderId: messageSender
    };
    firebase.initializeApp(config);
}

function login_ghub() {

    var provider = new firebase.auth.GithubAuthProvider();
    var authService = firebase.auth();

    $(document).on('click', '#github-button', function () {
        authService.signInWithPopup(provider)
            .then(function (result) {
                console.log(result);
                // console.log(result.user);
                // console.log(result.user.displayName);
                // console.log(result.user.email);
                // console.log(result.user.photoURL);
                var data = result.user.providerData[0];
                var info_data = { module: 'login', function: 'social_login', data: data }
                social('?', info_data)
                    .then(function (data) {
                        alert("stop")
                        console.log(data)
                        localStorage.setItem('id_token', data);
                        toastr.success("LOGEADO CORRECTAMENTE.");
                        window.setTimeout(function () {
                            redirect_home();
                        }, 1000)
                    })//endPromiseSocial
            }).catch(function (error) {
                // var errorCode = error.code;
                // console.log(errorCode);
                // var errorMessage = error.message;
                // console.log(errorMessage);
                // var email = error.email;
                // console.log(email);
                // var credential = error.credential;
                // console.log(credential);
                console.log("error")
                toastr.error("FALLO EN EL INICIO DE SESION", "ERROR.");
                window.setTimeout(function () {
                    redirect_login();
                }, 1000)

            });//endCatch
    })//end_documenClick

}

function login_google() {

    var provider = new firebase.auth.GoogleAuthProvider();
    provider.addScope('email');

    var authService = firebase.auth();

    // manejador de eventos para loguearse
    $(document).on('click', '#google-button', function () {
        authService.signInWithPopup(provider)
            .then(function (result) {
                console.log('Hemos autenticado al usuario ', result.user);
                console.log(result.user.displayName);
                console.log(result.user.email);
                console.log(result.user.photoURL);
                var data = result.user.providerData[0];
                var info_data = { module: 'login', function: 'social_login', data: data }
                social('?', info_data)
                    .then(function (data) {
                        //alert("stop")
                        console.log(data)
                        localStorage.setItem('id_token', data);
                        toastr.success("LOGEADO CORRECTAMENTE.");
                        window.setTimeout(function () {
                            redirect_home();
                        }, 1000)
                    })
            })
            .catch(function (error) {
                console.log("error")
                toastr.error("FALLO EN EL INICIO DE SESION", "ERROR.");
                window.setTimeout(function () {
                    redirect_login();
                }, 1000)
            });
    })



}

function auth_state() {
    // manejador de eventos para los cambios del estado de autenticación
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) { //loggeado
            return true;

        }else{ //not logged
            return false;
        }
    });
}



var social = function (url, data) { //GENERAL FUNCTION RETURN PROMISE

    //console.log("entra")
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
$(document).ready(function () {

    console.log(" social login ");

    config();
    login_ghub();
    login_google();
     auth_state();



});//ENDREADY