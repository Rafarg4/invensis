 <form>
  <div class="row">
    
    <div class="form-group col-md-3">
      <label>Posicion:</label>  
      <input type="text" class="form-control" placeholder="{{ $ranking->posicion }}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Nombre y apellido:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->nombre_apellido }}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha uno:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->fecha_uno}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha dos:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->fecha_dos ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha tres:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->fecha_tres ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha cuatro:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->fecha_cuatro ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha cinco:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->fecha_cinco ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha seis:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->fecha_seis ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha Siete:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->fecha_siete ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha ocho:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->fecha_ocho ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha Nueve:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->fecha_nueve ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha dies:</label>
      <input type="text" class="form-control" placeholder="{{ $ranking->fecha_dies ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Total:</label>
      <input type="text" class="form-control" placeholder="{{ $totales}}", disabled="true">
    </div>
  </div>
</form>