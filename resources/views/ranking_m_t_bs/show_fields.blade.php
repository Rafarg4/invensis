<form>
  <div class="row">
    
    <div class="form-group col-md-3">
      <label>Posicion:</label>  
      <input type="text" class="form-control" placeholder="{{ $rankingMTB->posicion }}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Nombre y apellido:</label>
      <input type="text" class="form-control" placeholder="{{ $rankingMTB->nombre_apellido }}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha uno:</label>
      <input type="text" class="form-control" placeholder="{{ $rankingMTB->fecha_uno ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha dos:</label>
      <input type="text" class="form-control" placeholder="{{ $rankingMTB->fecha_dos ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha tres:</label>
      <input type="text" class="form-control" placeholder="{{ $rankingMTB->fecha_tres ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha cuatro:</label>
      <input type="text" class="form-control" placeholder="{{ $rankingMTB->fecha_cuatro ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha cinco:</label>
      <input type="text" class="form-control" placeholder="{{ $rankingMTB->cinco ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Fecha seis:</label>
      <input type="text" class="form-control" placeholder="{{ $rankingMTB->seis ?? 'A competir'}}", disabled="true">
    </div>
    <div class="form-group col-md-3">
        <label>Total:</label>
      <input type="text" class="form-control" placeholder="{{ $totales}}", disabled="true">
    </div>
  </div>
</form>
