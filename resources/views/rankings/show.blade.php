@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ranking Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('rankings.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
 <div class="card">
  <div class="card-header">
    Detalles de Ranking
  </div>
  <div class="card-body">
    @include('rankings.show_fields')
            <div class="card-body">
                </div>

            </div>
            {!! Form::close() !!}
  </div>
</div>
@endsection
