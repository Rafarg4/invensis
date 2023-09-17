@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                 @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion','admin'])
                <div class="col-sm-6">
                    <h1>Ranking MTB</h1>
                </div> 
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('rankingMTBs.create') }}">
                        Nuevo
                    </a>
                </div>
                @endcan
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')
            <div class="card-body p-0">
                @include('ranking_m_t_bs.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
            
                </div>
            </div>

        </div>
    </div>

@endsection

