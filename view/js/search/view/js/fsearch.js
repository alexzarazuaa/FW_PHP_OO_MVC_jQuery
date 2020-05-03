

function chargefirstajax() {
    valtalla = "where 1=1"// muestra las opcines del select de las tallas 
    var info_data = {module:'search',function:'talla', data:valtalla }
    search(amigable("?"), info_data)
        .then(function (data) {
            console.log(data);
            data = JSON.parse(data)
            console.log(data)
            var $talla = $("#talla");
            $talla.empty();//
            $talla.append("<option value=0>" + "Selecciona talla" + "</option>");
            for (row in data) {///bucle para rellenar el dropdown talla 
                $talla.append("<option>" + data[row].talla + "</option>")
            }

        });
}
function offer_talla() {
    chargefirstajax();
    $("#marca").on("change", function () {

        console.log("entra marca change");
        var valtalla = $(this).val();
        var talla = $('#talla').val();
        console.log(talla);



        //console.log(valtalla);


        if ((valtalla === "") || (valtalla == 0)) {
            valtalla = "where 1=1"
        } else {
            var valtalla = 'where marca = "' + valtalla + '" ';
            console.log(valtalla)
        }
        var info_data = {module:'search',function:'talla', data:valtalla }
        search(amigable("?"), info_data)
            .then(function (data) {
                console.log(data);
                data = JSON.parse(data)
                console.log(data)
                var $talla = $("#talla");
                $talla.empty();//

                $talla.append("<option value=0>" + "Selecciona talla" + "</option>");
                for (row in data) {///bucle para rellenar el dropdown talla 
                    $talla.append("<option value='" + data[row].talla + "'>" + data[row].talla + "</option>")
                }
                //$marca.show();
                //console.log(talla);
                $("#talla option[value=" + talla + "]").attr("selected", true);

            });

    });

}


function marca_empty() {
    valmarca = "where 1=1"
    var info_data = {module:'search',function:'marca', data:valmarca }
    search(amigable("?"), info_data)
        .then(function (data) {
            console.log(data);
            data = JSON.parse(data)
            console.log(data);
            var $marca = $("#marca");
            $marca.empty();//
            $marca.append("<option value=0>" + "Selecciona Marca" + "</option>");
            for (row in data) {///bucle para rellenar el dropdown talla 
                $marca.append("<option>" + data[row].marca + "</option>")
            }
        });

}
function offer_marca() {
    //console.log("entra offer");
    marca_empty();
    $("#talla").on("change", function () {
        console.log("entra talla change");
        var valmarca = $(this).val();
        var talla = $(this).val();
        var marca = $('#marca').val();
        console.log(valmarca);
        if ((valmarca === "") || (valmarca == 0)) {
            var valmarca = "WHERE 1=1";
            console.log(valmarca);
        } else {
            var valmarca = 'where talla = "' + valmarca + '" ';
            console.log(valmarca)
        }
        var info_data = {module:'search',function:'marca', data:valmarca }
        search(amigable("?"), info_data)
            .then(function (data) {
                console.log(data);
                data = JSON.parse(data)
                console.log(data)
                var $marca = $("#marca");
                $marca.empty();//
                $marca.append("<option value=0>" + "Selecciona Marca" + "</option>");
                for (row in data) {///bucle para rellenar el dropdown talla 
                    $marca.append("<option value='" + data[row].marca + "'>" + data[row].marca + "</option>")
                }
                $(talla).hide();
                // $(marca).show();
                $("#marca option[value=" + marca + "]").attr("selected", true);
            });

    });

}

function autocom() {


    $("#talla ,#marca").on("change", function () {
        console.log("jaja auto ")

        $("name").empty();
        var marca = $("#marca").val();
        console.log(marca);
        var talla = $("#talla").val();
        console.log(talla)


        if ((marca != 0) && (talla == 0)) {
          //  console.log("if")
            complete = 'where marca="' + marca + '"'
            //console.log(complete);
        } else if ((marca == 0) && (talla != 0)) {
            complete = 'where talla= "' + talla + '"'
           // console.log(complete);
        } else if ((marca == 0) && (talla == 0)) {
            complete = ''
           /// console.log(complete);
        } else {
            console.log("else")
            complete = 'where talla= "' + talla + '" and marca="' + marca + '"'
           // console.log(complete);
        }
        var info_data = {module:'search',function:'autocomplete', data:complete }
        search(amigable("?"), info_data)
            .then(function (data) {
                console.log(data)
                data = JSON.parse(data);
                console.log(data)
                var nombre = []
                for (row in data) {
                    nombre.push(data[row].nombre);
                }
                console.log(nombre);
                for (i = 0; i < nombre.length; i++) {
                    console.log(nombre[i]);
                    // console.log(nombre[row])
                    $("#name").append(
                        '<option value="' + nombre[i] + '">' + nombre[i] + '</option>'
                    )
                }
            });
    });
}

function buttonsearch() {

    //// BTN SEARCH
    $(".btn").on("click", function () {
        //console.log("ENTRA EN EL button");

        var talla = $("#talla").val();
        var marca = $("#marca").val();
        var auto = $("#prod").val(); // cojo name del list and datalists
        console.log(talla);
        console.log(marca);
        console.log(auto);
        localStorage.setItem('talla', talla); // save data
        localStorage.setItem('marca', marca); // save data
        localStorage.setItem('autocomplete', auto); // save data

        //alert("vad")
        url=amigable('?module=shop');
        $(window).attr('location',url)

    });

}
function keyenter() {
   
    $(document).keyup(function (e) {
        console.log("keyenter");
        if ($(".prod").is(":focus") && (e.keyCode == 13)) {
           console.log("keyenter");
        }
    });
}




var search = function (url, data) { //function-promise GENERAL 

 console.log(data)

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


// function prueba () {
//     var info_data = {module:'search',function:'search'}
//     search(amigable("?"), info_data)
//         .then(function (data) {
//             console.log(data)
            
            
//         })
// }

$(document).ready(function () {

    console.log("entra fseacrh")



    offer_marca();
    offer_talla();
    keyenter();
    autocom();
    buttonsearch();
    keyenter();
    //prueba();

});


