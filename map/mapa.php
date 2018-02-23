<?php
//key = AIzaSyAULUkxaJlq8-NMAaB4qJisefm1l9nHC6s
?>
<style>
#map{
	height: 600px;
	width: 1100px;
}
</style>
<main role="main" class="container">
	<div class="row">
		<div class="col">
			<div class="form-inline">
				<div class="form-group mb-2">
					<label for="Buscar" class="sr-only">Buscar</label>
					<input type="text" class="form-control" id="lugar" placeholder="Buscar en el mapa">
				</div>
				<button type="button" id="buscarLugar" class="btn btn-primary mx-sm-3 mb-2">buscar</button>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col">
			<div class="form-inline">
				<div class="form-group mb-2">
					<label for="latitud" class="sr-only">Latitud</label>
					<input type="text" class="form-control" id="latitud" placeholder="Latitud">
				</div>
				<div class="form-group mx-sm-3 mb-2">
					<label for="longitud" class="sr-only">Longitud</label>
					<input type="text" class="form-control" id="longitud" placeholder="Longitud">
				</div>
				<button type="button" class="btn btn-primary mb-2" id="buscarCoordenadas">Buscar</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<figure class="figure">
				<div id="map"></div>
				<figcaption class="figure-caption text-right">Mapa.</figcaption>
			</figure>


		</div>
	</div>


	<script>
      	// Note: This example requires that you consent to location sharing when
      	// prompted by your browser. If you see the error "The Geolocation service
      	// failed.", it means you probably did not give permission for the browser to
      	// locate you.

	    function initMap() {
	      	var map = new google.maps.Map(document.getElementById('map'), {
	      		center: {lat: -34.397, lng: 150.644},
	      		zoom: 11
	      	});
	      	var infoWindow = new google.maps.InfoWindow({map: map});

	        // Try HTML5 geolocation.
	        if (navigator.geolocation) {
	        	navigator.geolocation.getCurrentPosition(function(position) {
	        		var pos = {
	        			lat: position.coords.latitude,
	        			lng: position.coords.longitude
	        		};

	        		//infoWindow.setPosition(pos);
	        		//infoWindow.setContent('Ubicación Actual.');
	        		map.setCenter(pos);
	        	}, function() {
	        		handleLocationError(true, infoWindow, map.getCenter());
	        	});
	        } else {
	          	// Browser doesn't support Geolocation
	          	handleLocationError(false, infoWindow, map.getCenter());
	      	}

	      	var geocoder = new google.maps.Geocoder();
	      	var infowindow = new google.maps.InfoWindow;

	        document.getElementById('buscarLugar').addEventListener('click', function() {
	          geocodeAddress(geocoder, map);
	        });
	        document.getElementById('lugar').addEventListener('keypress', function (e) {
			    var key = e.which || e.keyCode;
			    if (key === 13) { // 13 is enter
			      	geocodeAddress(geocoder, map);
			    }
	        });

	        document.getElementById('buscarCoordenadas').addEventListener('click', function() {
	          	geocodeLatLng(geocoder, map, infowindow);
	        });	
	  	}

  		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  			infoWindow.setPosition(pos);
  			infoWindow.setContent(browserHasGeolocation ?
  			'Error: The Geolocation service failed.' :
  			'Error: Your browser doesn\'t support geolocation.');
  		}

  		function geocodeAddress(geocoder, resultsMap) {
        	var address = document.getElementById('lugar').value;
        	geocoder.geocode({'address': address}, function(results, status) {
          		if (status === 'OK') {
            		resultsMap.setCenter(results[0].geometry.location);
            		var marker = new google.maps.Marker({
              			map: resultsMap,
              			position: results[0].geometry.location
           			 });
          		} else {
            	alert('Geocode was not successful for the following reason: ' + status);
          		}
        	});
      	}

      	function geocodeLatLng(geocoder, map, infowindow) {
        	var latitud = document.getElementById('latitud').value;
        	var longitud = document.getElementById('longitud').value;
        	var latlng = {lat: parseFloat(latitud), lng: parseFloat(longitud)};
        	geocoder.geocode({'location': latlng}, function(results, status) {
          		if (status === 'OK') {
            		if (results[1]) {
              			map.setZoom(11);
              			var marker = new google.maps.Marker({
                			position: latlng,
                			map: map
              			});
              			infowindow.setContent(results[1].formatted_address);
              			infowindow.open(map, marker);
		            } else {
		              	window.alert('No results found');
		            }
          		} else {
            		window.alert('Geocoder failed due to: ' + status);
          		}
        	});
      	}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABe8R9oHHCQwHW7OnXKHEhMzCaLAVifd8&callback=initMap"
async defer></script>
</main>
