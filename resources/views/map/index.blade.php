<!DOCTYPE html>
<html>
<head>
    <title>Leaflet Map Laravel - Rute Terpendek</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map { height: 80vh; width: 100%; margin-bottom: 10px; }
        .form-container {
            margin: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }
        input[type="number"] {
            width: 140px;
            padding: 5px;
        }
        button {
            padding: 6px 14px;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Peta Lokasi - Rute Terpendek dengan Leaflet.js</h2>

    <div class="form-container">
        <label>Lat 1: <input type="number" step="any" id="lat1" value="-7.982298"></label>
        <label>Lng 1: <input type="number" step="any" id="lng1" value="112.630974"></label>
        <label>Lat 2: <input type="number" step="any" id="lat2" value="-7.951346"></label>
        <label>Lng 2: <input type="number" step="any" id="lng2" value="112.615414"></label>
        <button onclick="drawRoute()">Hitung Rute Terpendek</button>
    </div>

    <div id="map"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Leaflet Routing Machine -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script>
        let map = L.map('map').setView([-7.982298, 112.630974], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        let routingControl;

        function drawRoute() {
            const lat1 = parseFloat(document.getElementById('lat1').value);
            const lng1 = parseFloat(document.getElementById('lng1').value);
            const lat2 = parseFloat(document.getElementById('lat2').value);
            const lng2 = parseFloat(document.getElementById('lng2').value);

            if (routingControl) {
                map.removeControl(routingControl); // hapus rute sebelumnya
            }

            routingControl = L.Routing.control({
                waypoints: [
                    L.latLng(lat1, lng1),
                    L.latLng(lat2, lng2)
                ],
                routeWhileDragging: false,
                show: false
            }).addTo(map);
        }

        // Auto run saat halaman pertama dibuka
        drawRoute();
    </script>
</body>
</html>
