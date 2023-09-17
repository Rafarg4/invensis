<div class="row">
    <div class="form-group col-md-3">
    <label for="estado_civil">Estado Civil:</label>
    <input type="text" class="form-control" id="estado_civil" value="{{ $seguro->estado_civil }}">
</div>

<div class="form-group col-md-3">
    <label for="edad">Edad:</label>
    <input type="text" class="form-control" id="edad" value="{{ $seguro->edad }}">
</div>

<div class="form-group col-md-3">
    <label for="usted_es">Usted es:</label>
    <input type="text" class="form-control" id="usted_es" value="{{ $seguro->usted_es }}">
</div>

<div class="form-group col-md-3">
    <label for="padece_enfermedad">Padece Enfermedad:</label>
    <input type="text" class="form-control" id="padece_enfermedad" value="{{ $seguro->padece_enfermedad }}">
</div>

<div class="form-group col-md-3">
    <label for="especificar_enfermedad">Especificar Enfermedad:</label>
    <input type="text" class="form-control" id="especificar_enfermedad" value="{{ $seguro->especificar_enfermedad ??'Sin asignar'}} ">
</div>

<div class="form-group col-md-3">
    <label for="presenta_defecto_fisico">Presenta Defecto Fisico:</label>
    <input type="text" class="form-control" id="presenta_defecto_fisico" value="{{ $seguro->presenta_defecto_fisico ?? 'Sin asignar' }}">
</div>

<div class="form-group col-md-3">
    <label for="especifique_defecto_fisico">Especifique Defecto Fisico:</label>
    <input type="text" class="form-control" id="especifique_defecto_fisico" value="{{ $seguro->especifique_defecto_fisico ?? 'Sin asignar' }}">
</div>

<div class="form-group col-md-3">
    <label for="estatura">Estatura:</label>
    <input type="text" class="form-control" id="estatura" value="{{ $seguro->estatura }}">
</div>

<div class="form-group col-md-3">
    <label for="peso">Peso:</label>
    <input type="text" class="form-control" id="peso" value="{{ $seguro->peso }}">
</div>

<div class="form-group col-md-3">
    <label for="tipo_plan">Plan:</label>
    <input type="text" class="form-control" id="tipo_plan" value="{{ $seguro->tipo_plan }}">
</div>

<div class="form-group col-md-3">
    <label for="nombre_apellido_fallecimiento_titular">Nombre Apellido Fallecimiento Titular:</label>
    <input type="text" class="form-control" id="nombre_apellido_fallecimiento_titular" value="{{ $seguro->nombre_apellido_fallecimiento_titular }}">
</div>

<div class="form-group col-md-3">
    <label for="fechanac_beneficiario">Fecha de nacimiento de beneficiario:</label>
    <input type="text" class="form-control" id="fechanac_beneficiario" value="{{ $seguro->fechanac_beneficiario }}">
</div>

<div class="form-group col-md-3">
    <label for="parentesco_titular_beneficiario">Parentesco Titular Beneficiario:</label>
    <input type="text" class="form-control" id="parentesco_titular_beneficiario" value="{{ $seguro->parentesco_titular_beneficiario }}">
</div>

<div class="form-group col-md-3">
    <label for="ci_beneficiario">Ci Beneficiario:</label>
    <input type="text" class="form-control" id="ci_beneficiario" value="{{ $seguro->ci_beneficiario }}">
</div>

<div class="form-group col-md-3">
    <label for="porcentaje_cesion">Porcentaje Cesion:</label>
    <input type="text" class="form-control" id="porcentaje_cesion" value="{{ $seguro->porcentaje_cesion }}">
</div>

<div class="form-group col-md-3">
    <label for="created_at">Fecha de registro:</label>
    <input type="text" class="form-control" id="created_at" value="{{ $seguro->created_at }}">
</div>
</div>
    