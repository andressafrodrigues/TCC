// window.testeGeolocation = function() {
//   if ("geolocation" in navigator) {
//     navigator.geolocation.getCurrentPosition(function(posicao) {
//        alert(posicao.coords.latitude + ', ' + posicao.coords.longitude); 
//     });
//   } else {
//     alert('Seu navegador não suporta a Geolocation, lamento.');
//   }
// }
$(document).ready(function() {
// Call Geocode
//geocode();

// Get location form
var locationForm = document.getElementById('location-form');

// Listen for submiot
locationForm.addEventListener('submit', geocode);
function geocode(e){
// Prevent actual submit
e.preventDefault();
var location = document.getElementById('location-input').value;
$.ajax({
  url: 'https://maps.googleapis.com/maps/api/geocode/json',
  data:{
    address:location,
    key:'AIzaSyDszBEyHeAp1sInwk6775RjS63bah3j7rs'
  },
  dataType:"json",
  type: 'GET',
  cache: false,
  async : true,
  error: function(response){
    console.log(response);
  },
  success: function(response) {
    console.log(response);
    var formattedAddress = response.results[0].formatted_address;
    var formattedAddressOutput = `
    <ul class="list-group">
    <li class="list-group-item">${formattedAddress}</li>
    </ul>
    `;
    var addressComponents = response.results[0].address_components;
    var addressComponentsOutput = '<ul class="list-group">';
    for(var i = 0;i < addressComponents.length;i++){
      addressComponentsOutput += `
      <li class="list-group-item"><strong>${addressComponents[i].types[0]}</strong>: ${addressComponents[i].long_name}</li>
      `;
    }
    addressComponentsOutput += '</ul>';

    var lat = response.results[0].geometry.location.lat;
    var lng = response.results[0].geometry.location.lng;
    var geometryOutput = `
    <ul class="list-group">
    <li class="list-group-item"><strong>Latitude</strong>: ${lat}</li>
    <li class="list-group-item"><strong>Longitude</strong>: ${lng}</li>
    </ul>
    `;

    document.getElementById('formatted-address').innerHTML = formattedAddressOutput;
    document.getElementById('address-components').innerHTML = addressComponentsOutput;
    document.getElementById('geometry').innerHTML = geometryOutput;
  }
});
}


  
});