<br>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">
<form class=" float-center">
<div class="input-group">
<input name="buscarpor" type="search" class="form-control form-control-lg" placeholder="Ingresar clave para buscar">
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
<div class="card-body pb-0">
   
<div class="row">
      @foreach($inscripcions as $inscripcion)
<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
<div class="card bg-light d-flex flex-fill">
<div class="card-header text-muted border-bottom-0">
Carnet de inscripcion
</div>
<div class="card-body pt-0">
<div class="row">
<div class="col-7">
<ul class="ml-4 mb-0 fa-ul text-muted">
<br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-user"></i></span> Nombres: {{ $inscripcion->primer_y_segundo_nombre}}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-bars"></i></span> Categoria:{{ $inscripcion->categoria->nombre}}</li><br>	
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-id-badge"></i></span> Cedula:{{ $inscripcion->ci }}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Domiciolio:{{ $inscripcion->domiciolio }}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-address-book"></i></span> Contacto de emergencia:{{ $inscripcion->contacto_emergencia }}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-regular fa-city"></i></span> Ciudad:{{ $inscripcion->ciudad }}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono: {{ $inscripcion->celular }}</li>
</ul>
</div>
<div class="col-5 text-center">
	<br>
<img src="{{ asset('storage').'/'.$inscripcion->foto}}" width="150" height="150" class="img-circle">
</div>
</div>
</div>
{!! Form::open(['route' => ['inscripcions.destroy', $inscripcion->id], 'method' => 'delete']) !!}
<div class="card-footer">
<div class="text-right">
<a class="class='btn btn-default btn-xs">
<button type="submit"  class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro?')"><i class="fa fas-solid fa-trash"></i></button>
</a>
<a href="{{ route('inscripcions.edit', [$inscripcion->id]) }}" class="btn btn-sm btn-warning">
<i class="fas fa-edit"></i>
</a>
</a>
<a href="{{ route('inscripcions.show', [$inscripcion->id]) }}" class="btn btn-sm btn-primary">
<i class="fas fa-eye"></i>
</a>
<a href="{{route('pdf.show', $inscripcion->id)}}" class="btn btn-sm btn-danger">
<i class="fas fa-file-pdf"></i> 
</a>
<a href="{{ route('licencias.show',$inscripcion->id)}}" class="btn btn-sm btn-success">
<i class="fa fas-solid fa-id-card"></i></a>
</div>
</div>{!! Form::close() !!}
</div>
</div>
@endforeach
</div>
{{ $inscripcions->links() }}

    
