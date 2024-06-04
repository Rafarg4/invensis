@extends('layouts.app')

@section('content')
<br>
   <link rel="icon" type="image/png" src="/logof.png" />
@if(Auth::user()->hasRole('super_admin'))
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<div class="container-fluid"style="font-size: 12px;">
<div class="row">
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info elevation-1"><i class="fa fas-solid fa-bicycle"></i></span>
<div class="info-box-content">
<span class="info-box-text">Licencias</span>
<span class="info-box-number">
<a href="{{ route('inscripcions.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a>
</span>
</div>

</div>
</div>
<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fa fas-regular fa-laptop-medical"></i></span>
<div class="info-box-content">
<span class="info-box-text">Seguros</span>
<span class="info-box-number"><a href="{{ route('seguros.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>

</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fa fas-light fa-book"></i></span>
<div class="info-box-content">
<span class="info-box-text">Documentos</span>
<span class="info-box-number"><a href="{{ route('documentos.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>

</div>

</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-trophy"></i></span>
<div class="info-box-content">
<span class="info-box-text">Ranking</span>
<span class="info-box-number"><a href="{{ route('rankings.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-warning elevation-1"><i class="fa fas-solid fa-bars"></i></span>
<div class="info-box-content">
<span class="info-box-text">Categorias</span>
<span class="info-box-number"><a href="{{ route('categorias.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-solid fa-chart-area"></i></span>
<div class="info-box-content">
<span class="info-box-text">Reportes</span>
<span class="info-box-number"><a href="{{ route('reporte_inscripcion') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-light elevation-1"><i class="fa fas-solid fa fa-chart-bar"></i></span>
<div class="info-box-content">
<span class="info-box-text">Grafico</span>
<span class="info-box-number"><a href="{{ route('graficos') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-black elevation-1"><i class="fa fas-light fa-user"></i></span>
<div class="info-box-content">
<span class="info-box-text">Usuarios</span>
<span class="info-box-number"><a href="{{ route('users.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@endcan
@else
<!-- Home de usuarios -->
   <!-- Agrega la referencia a la biblioteca de Bootstrap (asegúrate de usar la versión adecuada) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Agrega la referencia a la biblioteca de Popper.js (necesaria para Bootstrap) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<!-- Agrega la referencia a la biblioteca de Bootstrap (necesaria para Bootstrap) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- fin de Modal para descargar licencia -->

  @foreach($inscripcions as $inscripcion)
    @if($inscripcion->seguro === null)
        <div class="modal fade" id="miModal2" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miModalLabel">Paso 2 Registrar seguro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Para continuar con el registro se debe de subir datos de seguro, EN CASO DE CONTAR CON SEGURO PROPIO DESCARGAR FORMLARIO DE DESLINDE.</p>
                    </div>
                    <div class="modal-footer">
                        <button id="btnCrearSeguro" class="btn btn-primary" data-dismiss="modal">
                            <i class="fas fa-clipboard"></i> Crear seguro
                        </button>
                        <a href="formulario.pdf" id="btnDescargarDeslinde" download class="btn btn-warning" data-toggle="tooltip" title="Deslinde">
                            <i class="fas fa-file-pdf"></i> Formulario de deslinde 
                        </a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $('#miModal2').modal('show');

                // Manejar el clic en el botón "Crear seguro"
                $('#btnCrearSeguro').on('click', function() {
                    // Redireccionar y actualizar la columna seguro
                    $.post("{{ route('actualizarSeguro', ['id' => $inscripcion->id]) }}", { _token: "{{ csrf_token() }}" }, function(data) {
                        console.log(data);
                        window.location.href = "{{ route('seguros.create') }}";
                    });
                });

                // Manejar el clic en el botón "Descargar deslinde"
                $('#btnDescargarDeslinde').on('click', function() {
                    // Realizar la descarga del formulario de deslinde
                    var link = document.createElement('a');
                    link.href = "/formulario.pdf";
                    link.download = "formulario.pdf";
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    // Actualizar la columna seguro
                    $.post("{{ route('actualizarSeguro', ['id' => $inscripcion->id]) }}", { _token: "{{ csrf_token() }}" }, function(data) {
                        console.log(data);
                        // Opcional: Puedes realizar alguna acción adicional después de la actualización
                    });
                });
            });
        </script>
        @elseif($inscripcion->seguro === 'S'))
        <!-- Modal para mostrar cuando seguro es 'S' -->
        <div class="modal fade" id="miModal3" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miModalLabel">Registro terminado <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Felicidades, el registro se ha completado correctamente!.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script para mostrar el modal solo una vez -->
         <script>
            // Verificar si el modal3 ya ha sido mostrado
            var modal3Mostrado = localStorage.getItem('modal3Mostrado');
            if (!modal3Mostrado) {
                // Mostrar el modal
                $('#miModal3').modal('show');
                // Marcar que el modal ha sido mostrado
                localStorage.setItem('modal3Mostrado', true);
            }
        </script>
    @endif
@endforeach
<div class="container-fluid">
<div class="row">
@if($inscripcions->isempty())	
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-danger elevation-1"><a href="{{ route('inscripcions.create') }}"  class="fa fas-solid fa-user-plus"></i></a></span>
<div class="info-box-content">
<span class="info-box-text"><b>Paso 1: Registro de Licnecia</b></span>
<span class="info-box-number">
<a href="{{ route('inscripcions.create') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a>
</span>
</div>
</div>
</div>
@else
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success elevation-1"><i class="fa fas-solid fa-check"></i></span>
<div class="info-box-content">
<span class="info-box-text">Licencia creada!</span>
<span class="info-box-number">
<a href="{{ route('inscripcions.index') }}" class="small-box-footer">Mi Licencia<i class="fas fa-arrow-circle-right"></i></a>
</span>
</div>
</div>
</div>
@endif
 @if($seguros->isempty())
<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><a href="{{ route('seguros.create') }}"   class="fa fas-solid fa-user-plus"></i></a></span>
<div class="info-box-content">
<span class="info-box-text"><b>Paso: 2 Registro de seguro</b></span>
<span class="info-box-number"><a href="{{ route('seguros.create') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@else
<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fa fas-solid fa-check"></i></span>
<div class="info-box-content">
<span class="info-box-text">Seguro creado!</span>
<span class="info-box-number"><a href="{{ route('seguros.index') }}" class="small-box-footer">Mi seguro <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@endif
@if($documentos->isempty())
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><a href="{{ route('documentos.create') }}"  class="fa-solid fas fa-folder-plus"></i></a></span>
<div class="info-box-content">
<span class="info-box-text"><b>Paso 3: Subir documentos</b></span>
<span class="info-box-number"><a href="{{ route('documentos.create') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>

</div>

</div>
@else
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fa fas-solid fa-check"></i></span>
<div class="info-box-content">
<span class="info-box-text">Documentos registrado!</span>
<span class="info-box-number"><a href="{{ route('documentos.index') }}" class="small-box-footer">Mis documentos <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@endif
@if($pagos->isempty())
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><a href="{{ route('documentos.create') }}"  class="fa-solid fas fa-folder-plus"></i></a></span>
<div class="info-box-content">
<span class="info-box-text"><b>Paso 4: Cargar pago</b></span>
<span class="info-box-number"><a href="{{ route('pagos.create') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>

</div>

</div>
@else
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fa fas-solid fa-check"></i></span>
<div class="info-box-content">
<span class="info-box-text">Pago registrado!</span>
<span class="info-box-number"><a href="{{ route('pagos.index') }}" class="small-box-footer">Mis Pagos <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@endif
@foreach($inscripcions as $inscripcions)
@if($inscripcions->estado=='Verificado')
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-id-card"></i></span>
<div class="info-box-content">
<span class="info-box-text">Licencia verificada</span>
<!--<span class="info-box-number"><a href="{{ url('imprimir/licencias') }}" class="small-box-footer">Mi licencia <i class="fas fa-arrow-circle-right"></i></a></span>/-->
</div>
</div>
</div>
@else
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-id-card"></i></span>
<div class="info-box-content">
<span class="info-box-text">En espera de aprobacion</span>
<!--<span class="info-box-number"><a href="{{ url('imprimir/licencias') }}" class="small-box-footer">Mi licencia<i class="fas fa-arrow-circle-right"></i></a></span>-->
</div>
</div>
</div>
@endif
@endforeach
@endif
</div>
</div>
@endsection
