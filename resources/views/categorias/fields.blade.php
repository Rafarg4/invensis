<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
</div>

<!-- tipo categoria Field -->
<div class="form-group col-sm-6">
                    {!! Form::label('tipo_categoria', 'Categoria:') !!}
                    {!! Form::select('tipo_categoria',array('Principal' => 'Principal', 'Master ' => 'Master ','Ciclismo para todos ' => 'Ciclismo para todos '),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
</div>