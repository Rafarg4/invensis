@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Editar Cliente</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            {!! Form::model($cliente, ['route' => ['clientes.update', $cliente->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('clientes.fields')
                </div>

                <!-- Mapa para seleccionar ubicación
                <div class="form-group col-sm-12">
                    <label for="map">Seleccione la ubicación en el mapa:</label>
                    <div id="map" style="height: 350px; width: 50%;"></div> Cambiamos el tamaño del mapa 
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
        // Obtener coordenadas del cliente para usar en la edición, o usar coordenadas predeterminadas
        var lat = {!! json_encode($cliente->lat ?? 51.505) !!};
        var lng = {!! json_encode($cliente->lang ?? -0.09) !!};

        // Inicializar el mapa con las coordenadas obtenidas
        var map = L.map('map').setView([lat, lng], 13);

        // Cargar mapa de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Crear marcador con las coordenadas obtenidas
        var marker = L.marker([lat, lng], {
            draggable: true
        }).addTo(map);

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
            document.getElementById('lang').value = e.latlng.lng.toFixed(7);
        });
    </script>
@endsection
