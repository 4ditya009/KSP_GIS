@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/assets/leaflet/leaflet.css" />
    <script type="text/javascript" src="/assets/leaflet/leaflet.js"></script>
    <script type="text/javascript" src="/assets/desa_beraim.js"></script>
    <script type="text/javascript" src="/assets/kerembong.js"></script>
    <!-- Styles -->
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .leaflet-container {
            height: 400px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>

<body>
    <div id="map" style="width: auto; height: 600px;"></div>
    <script type="text/javascript">
        const cities = L.layerGroup();

        const mLittleton = L.marker([-8.7046333, 116.3483281]).bindPopup('Dusun Jorong').addTo(cities);
        const mDenver = L.marker([-8.7036496, 116.3490952]).bindPopup('Dusun Itik').addTo(cities);
        const mAurora = L.marker([-8.7070301, 116.3505141]).bindPopup('Dusun Dasan').addTo(cities);
        const mdaye = L.marker([-8.7037639, 116.3388935]).bindPopup('Beraim Daye').addTo(cities);
        const mlauk = L.marker([-8.7109148, 116.3389062]).bindPopup('Beraim Lauk').addTo(cities);

        const mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
        const mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

        const streets = L.tileLayer(mbUrl, {
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });

        const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        const map = L.map('map', {
            center: [-8.5680771, 116.2770597],
            zoom: 10,
            layers: [osm, cities]
        });

        function popUp(f, l) {
            var out = [];
            if (f.properties) {
                for (key in f.properties) {
                    out.push(key + ": " + f.properties[key]);
                }
                l.bindPopup(out.join("<br />"));
            }
        }

        L.geoJSON([desa_beraim], {
            style: function(feature) {
                return feature.properties && feature.properties.style;
            }
        }).addTo(map);

        L.geoJSON([kerembong], {
            style: function(feature) {
                return feature.properties && feature.properties.style;
            }
        }).addTo(map);

        const baseLayers = {
            'OpenStreetMap': osm,
            'Streets': streets
        };

        const overlays = {
            'Cities': cities
        };

        const layerControl = L.control.layers(baseLayers, overlays).addTo(map);
        const crownHill = L.marker([-8.7150666, 116.2847251]).bindPopup('Taman Biao Praya');
        const rubyHill = L.marker([-8.6977972, 116.2770943]).bindPopup('Taman Telu-Telu');

        const parks = L.layerGroup([crownHill, rubyHill]);

        const satellite = L.tileLayer(mbUrl, {
            id: 'mapbox/satellite-v9',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });
        layerControl.addBaseLayer(satellite, 'Satellite');
        layerControl.addOverlay(parks, 'Parks');
    </script>
</body>

</html>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection