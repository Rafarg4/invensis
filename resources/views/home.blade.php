@extends('layouts.app')

@section('content')
<br>
   <link rel="icon" type="image/png" src="/logof.png" />
<div class="container-fluid"style="font-size: 12px;">
<div class="row">
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info elevation-1"> <i class="fa fa-users" aria-hidden="true"></i></span>
<div class="info-box-content">
<span class="info-box-text">Clientes</span>
<span class="info-box-number">
<a href="{{ route('clientes.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a>
</span>
</div>

</div>
</div>
<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fa fas-solid fa-bars"></i></span>
<div class="info-box-content">
<span class="info-box-text">Cobros</span>
<span class="info-box-number"><a href="{{ route('cobros.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>

</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-warning elevation-1"><i class="fa fas-solid fa-bars"></i></span>
<div class="info-box-content">
<span class="info-box-text">Prestamos</span>
<span class="info-box-number"><a href="{{ route('prestamos.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
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
@endsection
