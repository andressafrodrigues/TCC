function geocode(cep){
  var location = cep;
  var longLat = {latitude:"",longitude:""};
  $.ajax({
    url: 'https://maps.googleapis.com/maps/api/geocode/json',
    data:{
      address:location,
      key:'AIzaSyDszBEyHeAp1sInwk6775RjS63bah3j7rs'
    },
    dataType:"json",
    type: 'GET',
    cache: false,
    async : false,
    error: function(response){
      console.log(response);
    },
    success: function(response) {
      var lat = response.results[0].geometry.location.lat;
      var lng = response.results[0].geometry.location.lng;
      longLat = {latitude:lat,longitude:lng};
    }
  });
return longLat;
}

function getDistanceFromLatLonInKm(position1, position2) {
    // "use strict";
    var deg2rad = function (deg) { return deg * (Math.PI / 180); },
        R = 6371,
        dLat = deg2rad(position2.lat - position1.lat),
        dLng = deg2rad(position2.lng - position1.lng),
        a = Math.sin(dLat / 2) * Math.sin(dLat / 2)
            + Math.cos(deg2rad(position1.lat))
            * Math.cos(deg2rad(position1.lat))
            * Math.sin(dLng / 2) * Math.sin(dLng / 2),
        c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return ((R * c *1000).toFixed());
}

function exibeProximos30KM(){
  pageurl = 'ajax/usuario/getAutonomos.php';
  $.ajax({
      url: pageurl,
      data: null,
      dataType: 'Json',
      type: 'POST',
      cache: false,
      async : true,
      error: function(ret){
          swal("ERROU!","ERRRRRROOOOOOUUUUUU!","error");
      },
      success: function(ret){
        for (i in ret) {
          var autonomo = ret[i];
          if (autonomo != null){
            var div = document.createElement('div');
            div.className = 'col-lg-4';
            div.innerHTML = ret[i].divAnexavel;
            document.getElementById('dadosAutonomos').appendChild(div);
          }
        }
      }
  });
}