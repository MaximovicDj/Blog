    <style media="screen">
        /* Set the size of the div element that contains the map */
        #map {
          height: 400px;
          /* The height is 400 pixels */
          width: 100%;
          /* The width is the width of the web page */
        }
    </style>
      <!--The div element for the map -->
      <div id="map"></div>

      <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADbk8arEbgkwt7hqpknVmVvrbIQHZsfVU&callback=initMap&v=weekly" async></script>

<script>
    // Initialize and add the map
    function initMap() {
      // The location of Uluru
      const uluru = { lat: 44.985, lng: 20.16083 };
      // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 10,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
    }
</script>
