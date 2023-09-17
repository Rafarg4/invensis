 <div class="row">    
<div class="form-group col-md-3">
    <label for="tipo_plan">Tipo de Plan:</label>
    <input type="text" class="form-control" id="tipo_plan" value="{{ $tarifa->tipo_plan }}" >
</div>
<div class="form-group col-md-3">
    <label for="tarifa">Tarifa:</label>
    <input type="text" class="form-control" id="tarifa" value="{{ $tarifa->tarifa }}" >
</div><div class="form-group col-md-3">
    <label for="descripcion">Descripción:</label>
    <input type="text" class="form-control" id="descripcion" value="{{ $tarifa->descripcion }}" >
</div>
<div class="form-group col-md-3">
    <label for="created_at">Fecha de Creación:</label>
    <input type="text" class="form-control" id="created_at" value="{{ $tarifa->created_at }}" >
</div>
<div class="form-group col-md-3">
    <label for="updated_at">Fecha de Actualización:</label>
    <input type="text" class="form-control" id="updated_at" value="{{ $tarifa->updated_at }}" >
</div>
</div>
