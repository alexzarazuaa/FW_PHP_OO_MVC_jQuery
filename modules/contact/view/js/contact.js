function send_cont(){
	console.log("ENTRA EN CONTACT JS");
	$('.ajaxLoader').fadeOut("fast");

	$(document).on('click', '#send_contact', function () {
		console.log("click send contact");
		result = true;
		$(".error").remove();

		var pname = /^[a-zA-Z]+[\-'\s]?[a-zA-Z]{2,51}$/;
		var pmessage = /^[0-9A-Za-z\s]{20,100}$/;
		var pmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
		var pasunt = /^[a-zA-Z]+[\-'\s]?[a-zA-Z]{2,51}$/;

		if ($("#cname").val() === "" || $("#cname").val() === "Introduce tu nombre") {
			$("#cname").focus().after("<span class='error'>Introduce tu nombre</span>");
			return false;
		} else if (!pname.test($("#cname").val())) {
			$("#cname").focus().after("<span class='error'>El nombre tiene un minimo de 3 caracteres</span>");
			return false;
		}

		if ($("#cemail").val() === "" || $("#cemail").val() === "Introduce tu email") {
			$("#cemail").focus().after("<span class='error'>Introduce tu email</span>");
			return false;
		} else if (!pmail.test($("#cemail").val())) {
			$("#cemail").focus().after("<span class='error'>El formato del mail es incorrecto</span>");
			return false;
		}


		if ($("#asunto").val() === "" || $("#asunto").val() === "Introduzca un asunto") {
			$("#asunto").focus().after("<span class='error'>Introduce un asunto</span>");
			return false;
		} else if (!pasunt.test($("#asunto").val())) {
			$("#asunto").focus().after("<span class='error'>El asunto tiene un mínimo de 3 caracteres</span>");
			return false;
		}

		if ($("#message").val() === "" || $("#message").val() === "Introduzca el mensaje") {
			$("#message").focus().after("<span class='error'>Introduzca su mensaje</span>");
			return false;
		} else if (!pmessage.test($("#message").val())) {
			$("#message").focus().after("<span class='error'>El mensaje tiene un minimo de 20 caracteres</span>");
			return false;
		}

		if (result) {
			 var data = $('#contactus').serialize();
			 alert("ENTRA")
			 //console.log(data)
			 var info_data = {module:'contact',function:'send_cont',data:data}
			cont(amigable("?"), info_data)
				.then(function (data) {
				//alert("ENTRA , SEND MAIL");
					//console.log(data)
					info = JSON.parse(data)
					//console.log(info);
					if (info['message'] == "Queued. Thank you.") {
						toastr.success("We sent the email, please check your inbox.", "Email sent.");
						//alert("enviado loco")
						//console.log("send mail")
						window.setTimeout(function(){
							//document.location.href = "/SPORT_V1.6/";
							redirect_contact()
						},2000)
					}else{
						console.log("toaster error")
						toastr.error("A failure has been made when sending your message","Email Not Sent.")
					}
				})

		}

	});
}

function redirect_contact() {
	url = amigable('?module=contact');
	$(window).attr('location', url)
}


var cont = function (url, data) { //function-promise GENERAL 

 //console.log(data)

	return new Promise(function (resolve) {
		 //console.log(url)
		 console.log(data)
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
	console.log("entra function send_cont")
	send_cont()

});