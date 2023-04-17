<br>
@if(Auth::user()->hasRole('super_admin'))
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">
<form class=" float-center">
<div class="input-group">
<input name="buscarpor" type="search" class="form-control form-control" placeholder="Ingresar Ci para buscar">
<div class="input-group-append">
<button type="submit" class="btn btn- btn-default">
<i class="fa fa-search"></i>
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
@endcan
<div class="card-body pb-0">
<div class="row">
     @if(!empty($inscripcions) && $inscripcions->count() > 0)
      @foreach($inscripcions as $inscripcion)
<div class="col d-flex justify-content-center">
<div class="card" style="width: 23rem;">
<div class="card-body pt-0">
<div class="row">
<div class="col-7">
<ul class="ml-3 mb-0 fa-ul text-muted">
<br>     
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-user"></i></span> Nombres: {{ $inscripcion->primer_y_segundo_nombre}}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-bars"></i></span> Categoria:{{ $inscripcion->categoria->nombre ?? 'Categoria no asignada'}}</li><br>	
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-id-badge"></i></span> Cedula:{{ $inscripcion->ci }}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-address-book"></i></span>Estado: @switch(true)
            @case($inscripcion->estado == 'En espera')
            <span class="badge badge-primary"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Paralizado')
            <span class="badge badge-warning"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $inscripcion->estado }} </span>
            @break
            @endswitch</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono: {{ $inscripcion->celular }}</li>
</ul>
</div>
<div class="col-5 text-center">
	<br>
<img src="{{ asset('storage').'/'.$inscripcion->foto}}" width="110" height="110" class="img-circle">
</div>
</div>
</div>
{!! Form::open(['route' => ['inscripcions.destroy', $inscripcion->id], 'method' => 'delete']) !!}
<div class="card-footer">
<div class="text-right">
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<a class="class='btn btn-default btn-xs">
<button type="submit"  class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro?')"><i class="fa fas-solid fa-trash"></i></button>
</a>@endcan
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<a href="{{ route('inscripcions.edit', [$inscripcion->id]) }}" class="btn btn-sm btn-warning">
<i class="fas fa-edit"></i>
</a>@endcan
</a>

<a href="{{ route('inscripcions.show', [$inscripcion->id]) }}" class="btn btn-sm btn-primary">
<i class="fas fa-eye"></i>
</a>
<a href="{{route('pdf.show', $inscripcion->id)}}" class="btn btn-sm btn-danger">
<i class="fas fa-file-pdf"></i> 
</a>
<a href="{{route('seguro',$inscripcion->id)}}" class="btn btn-sm btn-info">
<i class="fa fas-regular fa-laptop-medical"></i></a>
</div>
</div>{!! Form::close() !!}
</div>
</div>

@endforeach
@else
<div class="container"> 

   <div class="alert alert-light" role="alert">
  <b><h4><center>Aun no se ha registrado ninguna inscripcion!</center></h4></b>   
</div>                               
@endif
</div>
{{ $inscripcions->links() }}

    


@else
<br>
 @if(!empty($inscripcions) && $inscripcions->count() > 0)
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">
<form class=" float-center">
<div class="input-group">
<input name="buscarpor" type="search" class="form-control form-control-lg" placeholder="Ingresar Ci para buscar">
<div class="input-group-append">
<button type="submit" class="btn btn-lg btn-default">
<i class="fa fa-search"></i>
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
@endcan
<div class="card-body pb-0">
  
<div class="row">
      @foreach($inscripcions as $inscripcion)
 <div class="col d-flex justify-content-center">
<div class="card" style="width: 23rem;">
<div class="card-body pt-0">
<div class="row">
<div class="col-7">
<ul class="ml-3 mb-0 fa-ul text-muted">
<br>     
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-user"></i></span> Nombres: {{ $inscripcion->primer_y_segundo_nombre}}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-bars"></i></span> Categoria:{{ $inscripcion->categoria->nombre ?? 'Categoria no asignada'}}</li><br>    
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-id-badge"></i></span> Cedula:{{ $inscripcion->ci }}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-address-book"></i></span>Estado: @switch(true)
            @case($inscripcion->estado == 'En espera')
            <span class="badge badge-primary"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Paralizado')
            <span class="badge badge-warning"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $inscripcion->estado }} </span>
            @break
            @endswitch</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono: {{ $inscripcion->celular }}</li>
</ul>
</div>
<div class="col-5 text-center">
    <br>
<img src="{{ asset('storage').'/'.$inscripcion->foto}}" width="110" height="110" class="img-circle">
</div>
</div>
</div>
{!! Form::open(['route' => ['inscripcions.destroy', $inscripcion->id], 'method' => 'delete']) !!}
<div class="card-footer">
<div class="text-right">
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<a class="class='btn btn-default btn-xs">
<button type="submit"  class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro?')"><i class="fa fas-solid fa-trash"></i></button>
</a>@endcan
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<a href="{{ route('inscripcions.edit', [$inscripcion->id]) }}" class="btn btn-sm btn-warning">
<i class="fas fa-edit"></i>
</a>@endcan
</a>

<a href="{{ route('inscripcions.show', [$inscripcion->id]) }}" class="btn btn-sm btn-primary">
<i class="fas fa-eye"></i>
</a>
<a href="{{route('pdf.show', $inscripcion->id)}}" class="btn btn-sm btn-danger">
<i class="fas fa-file-pdf"></i> 
</a>               
<a href="{{route('seguro',$inscripcion->id)}}" class="btn btn-sm btn-info">
<i class="fa fas-regular fa-laptop-medical"></i></a>
</div>
</div>{!! Form::close() !!}
</div>
</div>
@endforeach
@else
<div class="container"> 

   <div class="alert alert-light" role="alert">
  <b><h4><center>Aun no se ha registrado ninguna inscripcion!</center></h4></b>   
</div>                               
@endif
</div>
{{ $inscripcions->links() }}


 @endif
 <style type="text/css">
 

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #eff0f2;
    border-radius: 1rem;
}
</style>