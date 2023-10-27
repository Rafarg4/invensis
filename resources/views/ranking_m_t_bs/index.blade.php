@extends('layouts.app')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
              @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion','admin'])
            <div class="col-sm-6">
                <h1>Rankings MTB</h1>
            </div>
            <div class="col-sm-6">
                <form method="POST" action="{{ url('/eliminar_ranking_mtb') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger float-right">Eliminar Ranking MTB</button>
                </form>
                <a href="{{ url('importar_mtb') }}" class="btn btn-success float-right mr-2">
                <i class="fa fas-solid fa-file-excel"></i>
                </a>
                <a class="btn btn-primary float-right mr-2" href="{{ route('rankingMTBs.create') }}">Nuevo</a>
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

