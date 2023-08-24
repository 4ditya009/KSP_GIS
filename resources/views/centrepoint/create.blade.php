@extends('layouts.app')

@section('style-css')
{{-- load cdn leaflet css --}}

<head>
    <link rel="stylesheet" href="/public/assets/css/all.min.css">
    <link rel="stylesheet" href="/public/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="/public/assets/leaflet/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <style>
        #map {
            height: 400px;
            width: auto;
        }
    </style>
</head>
<link rel="stylesheet" href="/public/assets/leaflet/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
<!-- <style>
    #map {
        height: 500px;
    }
</style> -->
@endsection

@section('content')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-2">
                <div class="card">
                    <div class="card-header">Add Spot</div>
                    <div class="card-body">
                        <form action="https://leafletrouting.samplekoding.com/centre-point" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="DqAiOnjKk4yqTMSMFkaXfOAiqrfpq8idul9ISr7w">
                            <div class="form-group mb-2">
                                <label for="">Latitude</label>
                                <input type="text" readonly id="latitude" name="latitude" readonly class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Longitude</label>
                                <input type="text" readonly id="longitude" name="longitude" readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Full Coordinates</label>
                                <input type="text" name="coordinates" id="coordinates" class="form-control" readonly id="">
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="card">
                    <div class="card-header">Map</div>
                    <div class="card-body">
                        <div id="m"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection

@push('javascript')
{{-- load cdn js leaflet --}}
<script src="/public/assets/leaflet/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script type="text/javascript">
    // Menambah attribut pada leaflet
    var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        mbUrl =
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

    // membuat beberapa layer untuk tampilan map diantaranya satelit, dark mode, street
    var satellite = L.tileLayer(mbUrl, {
            id: 'mapbox/satellite-v9',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        }),
        dark = L.tileLayer(mbUrl, {
            id: 'mapbox/dark-v10',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        }),
        streets = L.tileLayer(mbUrl, {
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });

    // Membuat var map untuk instance object map ke dalam tag div yang mempunyai id map
    // menambahkan titik koordinat latitude dan longitude peta indonesia kedalam opsi center
    // mengatur zoom map dan mengatur layer yang akan digunakan  
    var map = L.map('map', {
        center: [-0.789275, 113.921327],
        zoom: 5,
        layers: [streets]
    });

    var baseLayers = {
        //"Grayscale": grayscale,
        "Streets": streets,
        "Satellite": satellite
    };

    var overlays = {
        "Streets": streets,
        "Satellite": satellite,
    };

    //Menambahkan beberapa layer ke dalam peta/map
    L.control.layers(baseLayers, overlays).addTo(map);

    // set current location / lokasi sekarang dengan koordinat peta indonesia
    var curLocation = [-0.789275, 113.921327];
    map.attributionControl.setPrefix(false);

    // set marker map agar bisa di geser
    var marker = new L.marker(curLocation, {
        draggable: 'true',
    });
    map.addLayer(marker);

    // ketika marker di geser kita akan mengambil nilai latitude dan longitude
    // kemudian memasukkan nilai tersebut ke dalam properti input text dengan name-nya location
    marker.on('dragend', function(event) {
        var location = marker.getLatLng();
        marker.setLatLng(location, {
            draggable: 'true',
        }).bindPopup(location).update();

        $('#location').val(location.lat + "," + location.lng).keyup()
    });

    // untuk fungsi di bawah akan mengambil nilai latitude dan longitudenya
    // dengan cara klik lokasi pada map dan secara otomatis marker juga akan ikut bergeser dan nilai
    // latitude dan longitudenya akan muncul pada input text location
    var loc = document.querySelector("[name=location]");
    map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        loc.value = lat + "," + lng;
    });
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        })
    }, 3000)
</script>
<script>
    var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        mbUrl =
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

    var satellite = L.tileLayer(mbUrl, {
            id: 'mapbox/satellite-v9',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        }),
        dark = L.tileLayer(mbUrl, {
            id: 'mapbox/dark-v10',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        }),
        streets = L.tileLayer(mbUrl, {
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });


    var map = L.map('map', {

        center: [-0.4961271259042143, 117.14031862619812],
        zoom: 14,
        layers: [streets]
    });
    console.log(map);

    var baseLayers = {
        //"Grayscale": grayscale,
        "Streets": streets,
        "Satellite": satellite
    };

    var overlays = {
        "Streets": streets,
        "Satellite": satellite,
    };

    L.control.layers(baseLayers, overlays).addTo(map);

    var curLocation = [-0.4961271259042143, 117.14031862619812];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true',
    });
    map.addLayer(marker);

    marker.on('dragend', function(event) {
        var coordinate = marker.getLatLng();
        marker.setLatLng(coordinate, {
            draggable: 'true',
        }).bindPopup(coordinate).update();

        $('#coordinates').val(coordinate.lat + "," + coordinate.lng).keyup()
        $('#latitude').val(coordinate.lat).keyup()
        $('#longitude').val(coordinate.lng).keyup()

    });

    var coords = document.querySelector("[name=coordinates]");
    var latitude = document.querySelector("[name=latitude]");
    var longitude = document.querySelector("[name=longitude]");

    map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        latitude.value = lat;
        longitude.value = lng;
        coords.value = lat + "," + lng;
    });
</script>
@endpush