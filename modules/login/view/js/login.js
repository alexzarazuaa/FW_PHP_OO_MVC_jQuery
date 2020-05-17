

// regexp validators
//	register
function validate_register() {
	var email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

	if (document.register_form.email.value.length === 0) {
		document.getElementById('err_email').innerHTML = "Tienes que escribir el mail";
		document.register_form.email.focus();
		return 0;
	}
	if (!email.test(document.register_form.email.value)) {
		document.getElementById('err_email').innerHTML = "El formato del mail es invalido";
		document.register_form.email.focus();
		return 0;
	}
	document.getElementById('err_email').innerHTML = "";

	if (document.register_form.nickname.value.length === 0) {
		document.getElementById('err_nickname').innerHTML = "Tienes que escribir el nombre";
		document.register_form.nickname.focus();
		return 0;
	}
	if (document.register_form.nickname.value.length < 2) {
		document.getElementById('err_nickname').innerHTML = "El nombre tiene que tener más de 2 caracteres";
		document.register_form.nickname.focus();
		return 0;
	}

	document.getElementById('err_nickname').innerHTML = "";
	if (document.register_form.password.value.length === 0) {
		document.getElementById('pasw_er').innerHTML = "Tienes que escribir la contraseña";
		document.register_form.password.focus();
		return 0;
	}
	if (document.register_form.password.value.length < 6) {
		document.getElementById('pasw_er').innerHTML = "La contraseña tiene que tener más de 6 caracteres";
		document.register_form.password.focus();
		return 0;
	}
	document.getElementById('pasw_er').innerHTML = "";

	if (document.register_form.c_password.value.length === 0) {
		document.getElementById('pasw_er').innerHTML = "Tienes que escribir la contraseña";
		document.formregister.rpassword.focus();
		return 0;
	}
	if (document.register_form.c_password.value != document.register_form.password.value) {
		document.getElementById('pasw_er_c').innerHTML = "La contraseña tiene que ser la misma";
		document.register_form.rpassword.focus();
		return 0;
	}
	document.getElementById('pasw_er_c').innerHTML = "";
}




//LOGIN
function validate_login() {
	var email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	if (document.formlogin.email_log.value.length === 0) {
		document.getElementById('err_emaillog').innerHTML = "Tienes que escribir el mail";
		document.formlogin.email_log.focus();
		return 0;
	}
	if (!email.test(document.formlogin.email_log.value)) {
		document.getElementById('err_emaillog').innerHTML = "El formato del mail es invalido";
		document.formlogin.email_log.focus();
		return 0;
	}
	document.getElementById('err_emaillog').innerHTML = "";


	if (document.formlogin.logpassword.value.length === 0) {
		document.getElementById('err_passlog').innerHTML = "Tienes que escribir la contraseña";
		document.formlogin.logpassword.focus();
		return 0;
	}
	if (document.formlogin.logpassword.value.length < 6) {
		document.getElementById('err_passlog').innerHTML = "La contraseña tiene que tener más de 6 caracteres";
		document.formlogin.logpassword.focus();
		return 0;
	}
	document.getElementById('err_passlog').innerHTML = "";
}

//RECOVER PASSWORD
function validate_recover_passwd() {

	//
	if (document.recoverpass.newpassword.value.length < 6) {
		document.getElementById('err_passnew').innerHTML = "La contraseña tiene que tener más de 6 caracteres";
		document.recoverpass.newpassword.focus();
		return 0;
	}
	document.getElementById('err_passnew').innerHTML = "";


	//
	if (document.recoverpass.reppassword.value.length === 0) {
		document.getElementById('err_passnew').innerHTML = "Tienes que escribir la contraseña";
		document.recoverpass.rpassword.focus();
		return 0;
	}
	if (document.recoverpass.reppassword.value != document.recoverpass.newpassword.value) {
		document.getElementById('err_passrepeat').innerHTML = "La contraseña tiene que ser la misma";
		document.recoverpass.rpassword.focus();
		return 0;
	}
	document.getElementById('err_passrepeat').innerHTML = "";

}

//RECOVER ONLY MAIL
function send_mail_recover() {
	var mail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	if (document.mailrecover.recmail.value.length === 0) {
		document.getElementById('err_emailrecover').innerHTML = "Tienes que escribir el mail";
		document.mailrecover.mail.focus();
		return 0;
	}
	if (!mail.test(document.mailrecover.recmail.value)) {
		document.getElementById('err_emailrecover').innerHTML = "El formato del mail es invalido";
		document.mailrecover.mail.focus();
		return 0;
	}
	document.getElementById('err_emailrecover').innerHTML = "";
}


function redirect_home() {
	url = amigable('?module=home');
	$(window).attr('location', url)

}

function redirect_cart() {
	var url = "index.php?page=controller_cart&op=view"
	$(window).attr('location', url);

}

function redirect_login() {
	url = amigable('?module=login');
	$(window).attr('location', url)
}



function logout() {
	$.ajax({
		type: 'GET',
		url: 'module/login/controller/controller_login.php?op=logout',
	})
		.done(function (data) {
			// console.log('asdf');

			console.log(data);
			if (data == '"done"') {
				redirect_home();
			}
		})

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

function register(viene) {
	console.log("Click register1");
	//register form
	console.log("entra");
	if (validate_register() != 0) {
		var userinfo = $('#register-form').serialize();
		console.log(userinfo)
		var info_data = { module: 'login', function: 'exist_id', data: userinfo, viene: 'manual' }
		reg('?', info_data)
			.then(function (data) {
				console.log("entra1");
				console.log(data);
				data = JSON.parse(data);
				console.log(data)
				if (data == null) {
					var info_data = { module: 'login', function: 'insert_user', data: userinfo }
					reg('?', info_data)
						.then(function (data) {
							console.log("entra2");
							console.log(data);
							alert("email")
							toastr.success("you have been registered correctly", "Email sent.");
							alert("email send")
							//envia correo y redirect home
							redirect_home()
						})
				} else if (data == 'THIS USER NAME IS ALREADY IN USE') {
					toastr.error("THIS USER NAME IS ALREADY IN USE", "Email was not sent.");
					window.setTimeout(function () {
						redirect_login();
					}, 1000)
				}

			})//end_promise

	}//end_validate_register
}//end_register


var ipu = new Promise(function (resolve) { //obtener  ip for user no logged

	$.getJSON('https://api.ipify.org?format=json', function (data) {
		//console.log(data.ip);
		console.log(data.ip);
		resolve(data.ip);
	})
})

function login() {
	console.log("ENTRA FUNC LOGIN");
	
	if (validate_login() != 0) {
		var userinfo = $('#formlogin').serialize();
		console.log(userinfo);
		var info_data = { module: 'login', function: 'login_user', data: userinfo }
		reg('?', info_data)
			.then(function (info) {
				console.log("entra")
				console.log(info)
				var data = JSON.parse(info)
				console.log(data);
				//localStorage.remove('id_token',data['token_jwt']);
				localStorage.setItem('id_token',data['token_jwt']);
				var correct = data['response']
				if (data['response'] == correct ) {
					console.log("todo ok")
					// ipu
					// 	.then(function (ipu) {
					// 		var change = userinfo.split("&");
					// 		console.log(change)
					// 		var change2 = change[0].split("=");
					// 		console.log(change2)

					// 		var email = change2[1].replace("%40", "@");
					// 		var info = { email: email, ip: ipu };

					// 		console.log(ipu)
					// 		reg('module/login/controller/controller_login.php?op=change_us', info)
					// 			.then(function (info) {
					// 				console.log(info);
					// 				alert("change");
					// 				reg('module/login/controller/controller_login.php?op=log_user')
					// 					.then(function (data) {
					// 						if (data == "on") {
					// 							console.log(data);
					// 							alert("on");
					// 							redirect_cart();
					// 						} else {
					// 							console.log(data);
					// 							toastr.succes("EL CARRITO ESTA VACIO ", "CARRITO.");
					// 							// localStorage.setItem('user',data.user_email);
					// 							//redirect_home();
					// 						}

					// 					})
					// 			})
					// 	})
					toastr.success("LOGEADO CORRECTAMENTE.");
					//alert("comprueba");
					//redirect home
					window.setTimeout(function () {
						redirect_home();
					}, 1000)
				} else {
					toastr.error("FALLO EN EL INICIO DE SESION", "ERROR.");
					window.setTimeout(function () {
						redirect_login();
					}, 1000)
				}

			})

	}



}




function apend_mail_recover() {
	$('#forgotpasswd').on("click", function () {
		console.log("entra recover pass");

		$("#formlogin").empty()
		$("#register-form").empty()

		// '<div class="form-group">' +
		// '<input type="email" name="recemail" id="recemail" tabindex="1" class="form-control" placeholder="EmailAddress" value="">' +
		// '<span id="err_emailrec"></span>' +
		// '</div>' +

		$("#recover_mail").append(


			'<div class="panel-body">' +
			' <div class="row">' +
			'  <div class="col-lg-12">' +
			'<form id="mailrecover" name="mailrecover" role="form" style="display: block;">' +


			'<div class="form-group">' +
			'<input type="email" name="recmail" id="recmail" tabindex="1" class="form-control" placeholder="EmailAddress" value="">' +
			'<span id="err_emailrecover"></span>' +
			'</div>' +

			'  <div class="form-group">' +
			'    <div class="row">' +
			'    <div class="col-sm-6 col-sm-offset-3">' +
			'     <input type="button" name="login-submit" id="recoverbtn" tabindex="4" class="form-control btn btn-login" value="CHANGE PASSWORD">' +
			' </div>' +
			'  </div>' +
			'   </div>' +

			'</form>'



		);



	})
}

function recover_pass() {
	console.log("entra recoevr");

	if (validate_recover_passwd() != 0) {
		var userinfo = $('#recoverpass').serialize();
		console.log(userinfo)
		var token = get_token(window.location.href);
		console.log(token);
		var info_data = { module: 'login', function: 'change_password', data: userinfo , token : token}
		reg('?', info_data)
			.then(function (data) {
				console.log("entra recover pass");
				toastr.success("Password correctly changed.");
							//redirect home
							window.setTimeout(function () {
								redirect_home();
							}, 1000)
						
			})

	 }

}


function mail_recover() {
	console.log("entra mail recover");
	if (send_mail_recover() != 0) {

		var userinfo = $('#mailrecover').serialize();
		console.log(userinfo)
		var info_data = { module: 'login', function: 'recover_mail', data: userinfo }
		reg('?', info_data)
			.then(function (data) {
				console.log("entra1");
				console.log(data);
				if (data == "ERROR") {
					toastr.error("THIS USER NAME IS ALREADY IN USE", "Email was not sent.");
				} else {
					toastr.success("THE EMAIL HAS BEEN SENT", "Email was  sent.");
				}
			})

	}
}


function btn_login_reg() {
	// login form
	$('#loginbtn').on("click", function () {
		//console.log("entra CLICK LOGIN");
		login();

	})

	//register
	$('#register-submit').on("click", function () {
		//console.log("entra CLICK LOGIN");
		register();

	})

	//recover send mail
	$(document).on("click", '#recoverbtn', function () {
		console.log("entra CLICK REC0VER");
		mail_recover();

	})




}


function key_log_reg() {
	//KEY LOG LOGIN OPTION
	$('#logpassword').on("keydown", function (e) {
		// console.log("clickpass")
		if (e.which == 13) {
			login();
		}
	});

	//KEY LOG CONFIRM PASSWORD REGISTER
	$('#c_password').on("keydown", function (e) {
		console.log("clickpass recover")
		if (e.which == 13) {
			register();
		}
	});

	//KEY_LOG del recover pass
	$('#recmail').on("keydown", function (e) {
		console.log("clickpass")
		if (e.which == 13) {
			console.log("entra CLICK REC0VER mail");
			mail_recover();
		}
	});

	//KEYLOG_RECOVER PASS
	$('#reppassword').on("keydown", function (e) {
		console.log("clickpass")
		if (e.which == 13) {
			console.log("entra CLICK recover password");
			recover_pass();
		}
	});



}





$(document).ready(function () {

	console.log("valideate login");

	key_log_reg();
	btn_login_reg();

	apend_mail_recover();


});//ENDREADY



