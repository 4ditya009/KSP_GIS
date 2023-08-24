@extends('layouts.app')
@section('title', $viewData["title"])
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

    const mLittleton = L.marker([-8.7216959, 116.2547783]).bindPopup('Kota Praya').addTo(cities);
    const mDenver = L.marker([-8.5776016, 116.0724435]).bindPopup('Kota Mataram').addTo(cities);
    const mAurora = L.marker([-8.5687102, 116.5227798]).bindPopup('Aikmel').addTo(cities);
    const mGolden = L.marker([-8.388583, 116.5228833]).bindPopup('Sembalun').addTo(cities);

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
@endsection