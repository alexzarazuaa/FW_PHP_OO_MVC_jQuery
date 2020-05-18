

function activiti() {
    console.log("entra activiti");
    var info_data = { module: 'login', function: 'activity' }
    reg('?', info_data)
        .then(function (data) {
            console.log("entra activiti done");
            //console.log(data)
            if (data == "inactive") {
                toastr.error("Se ha cerrado la cuenta por inactividad", "SESSION CERRADA.");
                //OJO CAMBIAR LA URL
                //setTimeout('window.location.href = "index.php?page=controller_login&op=logout";', 1000);

            }
        })

}

function session() {

    console.log("entra session");
    //if (document.getElementById('nick')) {
        // var info_data = { module: 'login', function: 'session' }
        // reg('?', info_data)
        //     .then(function (data) {
        //            console.log("entra session done");
        //         //console.log(data);
        //         var ElementDiv = document.createElement('div');
        //         ElementDiv.id = "container_session";
        //         ElementDiv.innerHTML = "<div id='content'>" + data.nickname + "</div>"
        //             + "<img  style='width:50px; height50px;' src=" + data.avatar + ".jpg></img>";
        //         document.getElementById("container").appendChild(ElementDiv);
        //     })

    //}

}


// var act = function (url, data) { //GENERAL FUNCTION RETURN PROMISE

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


$(document).ready(function () {

    console.log("entra activiti js");

    activiti();
    session();

});
