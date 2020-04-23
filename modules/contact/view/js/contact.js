$(document).ready(function(){
	console.log("ENTRA EN CONTACT JS");
	$('.ajaxLoader').fadeOut("fast");

	$(document).on('click','#send_contact',function(){
		console.log("click send contact");
		result = true;
		$(".error").remove();

		var pname = /^[a-zA-Z]+[\-'\s]?[a-zA-Z]{2,51}$/;
	    var pmessage = /^[0-9A-Za-z\s]{20,100}$/;
		var pmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
		var pasunt = /^[a-zA-Z]+[\-'\s]?[a-zA-Z]{2,51}$/;

		if ($("#cname").val() === "" || $("#cname").val() === "Introduce tu nombre" ) {
			$("#cname").focus().after("<span class='error'>Introduce tu nombre</span>");
			return false;
		}else if (!pname.test($("#cname").val())) {
			$("#cname").focus().after("<span class='error'>El nombre tiene un minimo de 3 caracteres</span>");
			return false;
		}

		if ($("#cemail").val() === "" || $("#cemail").val() === "Introduce tu email" ) {
			$("#cemail").focus().after("<span class='error'>Introduce tu email</span>");
			return false;
		}else if (!pmail.test($("#cemail").val())) {
			$("#cemail").focus().after("<span class='error'>El formato del mail es incorrecto</span>");
			return false;
		}

		
		if ($("#asunto").val() === "" || $("#asunto").val() === "Introduzca un asunto" ) {
			$("#asunto").focus().after("<span class='error'>Introduce un asunto</span>");
			return false;
		}else if (!pasunt.test($("#asunto").val())) {
			$("#asunto").focus().after("<span class='error'>El asunto tiene un mínimo de 3 caracteres</span>");
			return false;
		}

		if ($("#message").val() === "" || $("#message").val() === "Introduzca el mensaje" ) {
			$("#message").focus().after("<span class='error'>Introduzca su mensaje</span>");
			return false;
		}else if (!pmessage.test($("#message").val())) {
			$("#message").focus().after("<span class='error'>El mensaje tiene un minimo de 20 caracteres</span>");
			return false;
		}
		
		if (result) {
			$('#send_contact').attr('disabled', true);
			$('.ajaxLoader').fadeIn("fast");
			var data = {"cname":$("#cname").val(),"cemail":$("#cemail").val(),"asunto":$("#asunto").val(),"message":$("#message").val()};
			var infodata = JSON.stringify(data);
			console.log(infodata);
			$.post("index.php?module=contact&function=send_cont",{"inf_data":infodata},function(infodata,event){
				console.log("envia_mail");
				console.log(infodata)
				$('.ajaxLoader').fadeOut("fast");
				//console.log(data);
				$("#rltsendmessage").html(data).fadeIn("slow");
                    //toastr
			    setTimeout(function() {
			        $("#rltsendmessage").fadeOut("slow")
			    }, 2000);
			});
			// $.ajax({
			// 	type: 'GET',
			// 	dataType: "json",
			// 	url: "index.php?module=contact&function=send_cont",
			// })
			// .done(function (data) {
			// 	{"fin_data":fin_data}
			// $('.ajaxLoader').fadeOut("fast");
			// 	console.log(data);
			// 	$("#rltsendmessage").html(data).fadeIn("slow");
                    
			//     setTimeout(function() {
			//         $("#rltsendmessage").fadeOut("slow")
			//     }, 5000);
			// })
		}
	});

});