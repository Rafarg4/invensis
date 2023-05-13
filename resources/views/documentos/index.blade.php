@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Documentos</h1>
                </div>
                @if(Auth::user()->hasRole('super_admin'))
                 @else
                 @if($documentos->isempty())
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('documentos.create') }}">
                        Nuevo
                    </a>
                </div>
                @endif
                @endif
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('documentos.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

