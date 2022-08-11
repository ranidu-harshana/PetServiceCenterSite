</div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app1.js"></script>
</body>

<script>
    function initMap() {
        const location = <?php echo json_encode($location)?>;
        var infowindow = new google.maps.InfoWindow();
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 18,
            center: location,
        });

        const marker = new google.maps.Marker({
            position: location,
            map: map,
        });

        makeInfoWindowEvent(map, infowindow,
            "<h3>Location</h3>",
            marker);

        function makeInfoWindowEvent(map, infowindow, contentString, marker) {
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(contentString);
                infowindow.open(map, marker);
            });
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1bJkJIsMOT-J7WXjVIzbS_6kAjDY4pLQ&callback=initMap&libraries=&v=weekly" async></script>

</html>