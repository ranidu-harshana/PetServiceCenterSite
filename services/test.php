<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>

	<style>
		#map {
			height: 400px;
			width: 100%;
		}
	</style>
  </head>
  <body>
  <h3>My Google Maps Demo</h3>
    <div id="map"></div>

	<?php
		$locations = [["lat" => 7.091479, "lng" => 79.998690],
					  ["lat" => 7.091958, "lng" => 79.999850],
					  ["lat" => 7.091016, "lng" => 79.998749]
					];
	?>
    <script>
		function initMap() {
			const uluru = <?php echo json_encode($locations)?>;
			var infowindow = new google.maps.InfoWindow();
			const map = new google.maps.Map(document.getElementById("map"), {
				zoom: 17,
				center: uluru[0],
			});

			for(i = 0; i < 3; i++){
				const marker = new google.maps.Marker({
					position: uluru[i],
					map: map,
				});
				makeInfoWindowEvent(map, infowindow, 
						"<h1>Hello</h1>" + i, 
				marker);
			}

			function makeInfoWindowEvent(map, infowindow, contentString, marker) {
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.setContent(contentString);
					infowindow.open(map, marker);
				});
			}
		}
	</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATzfW-i6VmOL7Ayq8UOtloupuKaHmGDYo&callback=initMap&libraries=&v=weekly" async></script>

	</body>
</html>