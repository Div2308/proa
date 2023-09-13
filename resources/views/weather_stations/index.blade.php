<!DOCTYPE html>
<html>
<head>
    <title>Weather Stations Map</title>
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
</head>
<body>
    <div id="map" style="height: 500px;"></div>
    <script>
        var map = L.map('map').setView([0, 0], 2); // Initial center coordinates and zoom level

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var stations = {!! $stations->toJson() !!}; // Convert Eloquent Collection to JSON

        // Add markers for each weather station
        stations.forEach(function(station) {
            L.marker([station.latitude, station.longitude]).addTo(map)
                .bindPopup(`
                    <h3>${station.ws_name}</h3>
                    <p>Site: ${station.site}</p>
                    <p>Portfolio: ${station.portfolio}</p>
                    <p>State: ${station.state}</p>
                `);
        });
    </script>
</body>
</html>
