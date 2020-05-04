$(document).ready(function () {
  // console.log("ENTRA MAP");
  if (document.getElementById("mapa") != null) {
    console.log("ENTRA MAP 2");
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?key=" + KEY_API + "&callback=initMap";

    script.async;
    script.defer;
    document.getElementsByTagName('script')[0].parentNode.appendChild(script);
    //console.log(script);
  }
})


function initMap() {
  // var
  var markers = [];

  //console.log(jewelry_stores)
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 6,
    center: new google.maps.LatLng(40.891859, -3.695447),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var infowindow = new google.maps.InfoWindow();


  var info_data = { module: 'contact', function: 'shops_map' }
  cmap(amigable("?"), info_data)
    .then(function (data) {

      console.log(data);
      //var info = JSON.parse(data);
      //console.log(info)

      for (row in data) {
        console.log(data);

        var newMarker = new google.maps.Marker({
          position: new google.maps.LatLng(
            data[row].latitud,
            data[row].longitud),
          map: map,
          title:
            data[row].Tienda
        });

        google.maps.event.addListener(newMarker, 'click', (function (newMarker, row) {
          return function () {
            infowindow.setContent(
              data[row].dscp);
            infowindow.open(map, newMarker);
          }
        })(newMarker, row));

        markers.push(newMarker);
      }
    });
}

var cmap = function (url, data) { //function-promise GENERAL 

  console.log(data)

  return new Promise(function (resolve) {
    console.log(url)
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
