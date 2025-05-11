@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1>Ventas</h1>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex justify-content-end"> <!-- Cambié aquí de 'justify-content-start' a 'justify-content-end' -->
                        @auth
                            @if(Auth::user()->caja)
                                <a href="{{ route('ventas.create') }}" class="btn btn-primary">
                                    Nuevo
                                </a>
                            @else
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#sinCajaModal">
                                    Nuevo
                                </button>

                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="sinCajaModal" tabindex="-1" aria-labelledby="sinCajaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="sinCajaModalLabel">Acceso restringido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <p><strong>No tenés una caja habilitada.</strong></p>
                    <p>Contactá al administrador del sistema para que te habilite una caja.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="content px-3">
        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('ventas.table')
            </div>
        </div>
    </div>
@endsection