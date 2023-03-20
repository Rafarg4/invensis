<!-- Categoria Field -->
  <div class="form-group col-sm-12">
                {!! Form::label('id_inscripcion', 'Inscripto:') !!}
                {!! Form::select('id_inscripcion', $inscripcion, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion','required']) !!}
            </div>

<!-- Posicion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('posicion', 'Posicion:') !!}
    {!! Form::text('posicion', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Nombre Apellido Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre_apellido', 'Nombre Apellido:') !!}
    {!! Form::text('nombre_apellido', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Categoria Field -->
  <div class="form-group col-sm-12">
                {!! Form::label('id_categoria', 'Categoria:') !!}
                {!! Form::select('id_categoria', $categoria, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion','required','required']) !!}
            </div>

<!-- Club Field -->
<div class="form-group col-sm-12">
    {!! Form::label('club', 'Club:') !!}
    {!! Form::text('club', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Sexo Field -->
<div class=" form-group col-sm-12">
                {!! Form::label('sexo', 'Sexo:') !!}
                {!! Form::select('sexo',array('Masculino' => 'Masculino', 'Femenino' => 'Femenino','Otro' => 'Otro'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
                </div>

<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('primer_fecha', '1 Fecha:') !!}
    {!! Form::text('primer_fecha', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>

<!-- 2 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('segundo_fecha', '2 Fecha:') !!}
    {!! Form::text('segundo_fecha', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>

<!-- 3 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tercero_fecha', '3 Fecha:') !!}
    {!! Form::text('tercero_fecha', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>

<!-- 4 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cuarto_fecha', '4 Fecha:') !!}
    {!! Form::text('cuarto_fecha', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null,['class' => 'form-control','required']) !!}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script >

  /* Sumar dos números. */
function sumar (valor) {
    var total = 0;  
    valor = parseInt(valor); // Convertir el valor a un entero (número).
    
    total = document.getElementById('total').value;
    
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;
    
    /* Esta es la suma. */
    total = (parseInt(total) + parseInt(valor));
    
    // Colocar el resultado de la suma en el control "span".
    document.getElementById('total').value = total;

}
</script>