@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Nuevo Cobro</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'cobros.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('cobros.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('cobros.index') }}" class="btn btn-default">Nuevo</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
