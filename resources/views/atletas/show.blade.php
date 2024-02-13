@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('atletas.index') }}">
                        Volver
                    </a>
        </div>
    </section>
        <div class="content px-3">
          <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-header d-flex p-0">
        <ul class="nav nav-pills justify-content-start p-2">
        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><i class="fa fas-solid fa-bicycle"></i> Incrcipciones</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><i class="fa fas-solid fa-credit-card"></i></i> Mis pagos</a></li>

        </ul>
        </div>

<div class="card-body">
    @include('atletas.show_fields')
            <div class="card-body">
                </div>

            </div>
            {!! Form::close() !!}
  </div>
</div>
@endsection
