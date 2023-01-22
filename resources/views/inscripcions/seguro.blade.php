<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<br>
 <div class="content px-3">
 <div class="card">
  <div class="card-header">
    Detalles de seguro
  </div>
  <div class="card-body">
  <div class="table-responsive">
    <table class="table" id="tabla">
        <thead>
        <tr>
            <th>Nombres</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Fecha de nacimiento</th>
        <th>Cedula de indentidad</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $inscripcion->primer_y_segundo_nombre }}</td>
            <td>{{ $inscripcion->primer_y_segundo_nombre }}</td>
            <td>{{ $inscripcion->email }}</td>
            <td>{{ $inscripcion->fechanac }}</td>
            <td>{{ $inscripcion->ci}}</td>
            
            </tr>
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table" id="Tabla">
        <thead>
        <tr>
    
        <th>Sexo</th>
        <th>Grupo Sanguineo</th>
        <th>Nacionalidad</th>
         <th>Celular</th>
         <th>Region</th>
        </tr>
        </thead>
        <tbody>
            <tr>
               
            <td>{{ $inscripcion->sexo }}</td>
            <td>{{ $inscripcion->grupo_sanguineo }}</td>
            <td>{{ $inscripcion->nacionalidad }}</td>
            <td>{{ $inscripcion->celular }}</td>
            <td>{{ $inscripcion->region }}</td>
            
            </tr>
        </tbody>
    </table>
</div>


<div class="table-responsive">
    <table class="table" id="Tabla">
        <thead>
        <tr>
       
        <th>Domiciolio</th>
        <th>Departamento</th>
        <th>Ciudad</th>
        <th>Categoria</th>
         <th>Estado</th>
         <th>Monto</th>
        

        </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{ $inscripcion->domiciolio }}</td>
            <td>{{ $inscripcion->departamento }}</td>
            <td>{{ $inscripcion->ciudad }}</td>
            <td>{{ $inscripcion->categoria->nombre }}</td>
            <td>@switch(true)
            @case($inscripcion->estado == 'En espera')
            <span class="badge badge-primary"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Paralizado')
            <span class="badge badge-warning"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $inscripcion->estado }} </span>
            @break
            @endswitch</td>
             <td>{{number_format ($inscripcion->monto) }} Gs</td>
            
            
            </tr>
        </tbody>
    </table>
</div>
<div class="table-responsive">
    <table class="table" id="Tabla">
        <thead>
        <tr>
            <th>Federacion Id</th>
        <th>Nombre de equipo</th>   
        <th>Contacto Emergencia</th>
        <th>Nombre Apellido Contacto Emergencia</th>
        <th>Fecha de registro</th>

        </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{ $inscripcion->federacion_id }}</td>
            <td>{{ $inscripcion->nombre_equipo }}</td>
            <td>{{ $inscripcion->contacto_emergencia }}</td>
                <td>{{ $inscripcion->nombre_apellido_contacto_emergencia }}</td>
            <td>{{ $inscripcion->created_at }}</td>
            </tr>
        </tbody>
    </table>
</div>
               
       <div class="table-responsive" style="padding:15px;">
    <table class="table" id="Tabla">
        <thead>
        <tr>
            <th>Estado Civil</th>
        <th>Edad</th>
        <th>Usted Es</th>
        <th>Padece Enfermedad</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seguro as $seguro)
            <tr>
                <td>{{ $seguro->estado_civil }}</td>
            <td>{{ $seguro->edad }}</td>
            <td>{{ $seguro->usted_es }}</td>
            <td>{{ $seguro->padece_enfermedad }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
     <table class="table" id="Tabla">
        <thead>
        <tr>
        <th>Especificar Enfermedad</th>
        <th>Presenta Defecto Fisico</th>
        <th>Especifique Defecto Fisico</th>
        <th>Estatura</th>
        </tr>
        </thead>
        <tbody>
    
            <tr>
            <td>{{ $seguro->especificar_enfermedad }}</td>
            <td>{{ $seguro->presenta_defecto_fisico }}</td>
            <td>{{ $seguro->especifique_defecto_fisico }}</td>
            <td>{{ $seguro->estatura }}</td>
            </tr>
    
        </tbody>
    </table>
     <table class="table" id="Tabla">
        <thead>
        <tr>
        <th>Peso</th>
        <th>Plan</th>
        <th>Tipo de Plan</th>
        <th>Nombre Apellido Fallecimiento Titular</th>
         <th>Fecha de registro</th>
        </tr>
        </thead>
        <tbody>
    
            <tr>
            <td>{{ $seguro->parentesco_titular_beneficiario }}</td>
            <td>{{ $seguro->ci_beneficiario }}</td>
            <td>{{ $seguro->porcentaje_cesion }}</td>
            <td>{{ $seguro->fechanac_beneficiario }}</td>
             <td>{{ $seguro->created_at }}</td>
            </tr>
    
        </tbody>
    </table>
    <table class="table" id="Tabla">
        <thead>
        <tr>
      <th>Parentesco Titular Beneficiario</th>
        <th>Ci Beneficiario</th>
        <th>Porcentaje Cesion</th>
        <th>Fechanac Beneficiario</th>
        </tr>
        </thead>
        <tbody>

            <tr>
            <td>{{ $seguro->parentesco_titular_beneficiario }}</td>
            <td>{{ $seguro->ci_beneficiario }}</td>
            <td>{{ $seguro->porcentaje_cesion }}</td>
            <td>{{ $seguro->fechanac_beneficiario }}</td>
            </tr>
        
        </tbody>
    </table>
</div>
    
    </div>


            
  </div>
</div>
