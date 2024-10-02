<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- CI Número Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ci_numero', 'CI Número:') !!}
    {!! Form::text('ci_numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Dirección Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Dirección:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Teléfono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    {!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
</div>

<!-- País Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pais', 'País:') !!}
    {!! Form::text('pais', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', 'Latitud:') !!}
    {!! Form::text('lat', null, ['class' => 'form-control', 'readonly' => 'readonly', 'id' => 'lat']) !!}
</div>

<!-- Longitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lang', 'Longitud:') !!}
    {!! Form::text('lang', null, ['class' => 'form-control', 'readonly' => 'readonly', 'id' => 'lang']) !!}
</div>

<!-- Mapa Field -->
<div class="form-group col-sm-12">
    {!! Form::label('mapa', 'Mapa:') !!}
    <div id="map" style="height: 350px; width: 50%;"></div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

@push('scripts')
<script>
    // Inicializar el mapa con coordenadas predeterminadas o las actuales del cliente
    var lat = document.getElementById('lat').value || 51.505;
    var lng = document.getElementById('lang').value || -0.09;
    var map = L.map('map').setView([lat, lng], 13); 

    // Cargar mapa de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Marcador inicial
    var marker = L.marker([lat, lng], {
        draggable: true
    }).addTo(map);

    // Usar la Geolocation API para obtener la ubicación del usuario solo si está creando un cliente
    if (!lat && !lng && navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            lat = position.coords.latitude;
            lng = position.coords.longitude;

            // Centrar el mapa en la ubicación del usuario
            map.setView([lat, lng], 13);
            marker.setLatLng([lat, lng]);

            // Establecer los valores de latitud y longitud en los campos del formulario
            document.getElementById('lat').value = lat.toFixed(7);
            document.getElementById('lang').value = lng.toFixed(7);
        });
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
        document.getElementById('lang').value = e.latlng.lng.toFixed(7);
    });
</script>
@endpush



