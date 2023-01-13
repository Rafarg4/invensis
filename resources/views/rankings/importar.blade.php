@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Importar</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card"> 

            {!! Form::open(['route' => 'rankings.importar','enctype' => 'multipart/form-data']) !!}
            <input type="file" name="import_file">
            <button class="btn btn-primary" type="submit">Importar</button>
            <div class="card-body">
                </div>

            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
