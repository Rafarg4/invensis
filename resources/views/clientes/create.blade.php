@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Crear Cliente</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            {!! Form::open(['route' => 'clientes.store']) !!}

            <div class="card-body">
                <div class="row">
                    @include('clientes.fields')
                </div>

                <!-- Mapa para seleccionar ubicación 
                <div class="form-group col-sm-12">
                    <label for="map">Seleccione la ubicación en el mapa:</label>
                    <div id="map" style="height: 350px; width: 50%;"></div>  
                </div>-->
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('clientes.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // Inicializar el mapa con coordenadas predeterminadas
        var map = L.map('map').setView([51.505, -0.09], 13); 

        // Cargar mapa de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Marcador inicial
        var marker = L.marker([51.505, -0.09], {
            draggable: true
        }).addTo(map);

        // Usar la Geolocation API para obtener la ubicación del usuario
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                // Centrar el mapa en la ubicación del usuario
                map.setView([lat, lng], 13);
                marker.setLatLng([lat, lng]);

                // Establecer los valores de latitud y longitud en los campos del formulario
                document.getElementById('lat').value = lat.toFixed(7);
                document.getElementById('lang').value = lng.toFixed(7);
            });
        } else {
            console.log('Geolocalización no está disponible en este navegador.');
        }

        // Actualizar campos de latitud y longitud con el arrastre del marcador
        marker.on('dragend', function(e) {
            var latlng = marker.getLatLng();
            document.getElementById('lat').value = latlng.lat.toFixed(7);
            document.getElementById('lang').value = latlng.lng.toFixed(7);
        });

        // Click en el mapa para mover el marcador
        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            document.getElementById('lat').value = e.latlng.lat.toFixed(7);
            document.getElementById('lang').value = e.latlng.lat.toFixed(7);
        });
    </script>
@endsection
