 <div class="table-responsive" style="padding:15px;">
    <table class="table" id="Tabla">
        <thead>
        <tr>
            <th>Ci</th>
            <th>Nombre y Apellido</th>
            <th>Estado Civil</th>
        <th>Edad</th>
        <th>Usted Es</th>
        <th>Padece Enfermedad</th>
        </tr>
        </thead>
        <tbody>
       
            <tr>
                <td>{{ $seguro->inscripto->ci  ?? 'Incripto no asignada' }}</td>
            <td>{{ $seguro->inscripto->primer_y_segundo_nombre  ?? 'Incripto no asignada' }} {{ $seguro->inscripto->primer_y_segundo_apellido  ?? 'Incripto no asignada' }}</td>
                <td>{{ $seguro->estado_civil }}</td>
            <td>{{ $seguro->edad }}</td>
            <td>{{ $seguro->usted_es }}</td>
            <td>{{ $seguro->padece_enfermedad }}</td>
            </tr>
      
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
            <td>{{ $seguro->especificar_enfermedad ??'Sin asignar'}}</td>
            <td>{{ $seguro->presenta_defecto_fisico }}</td>
            <td>{{ $seguro->especifique_defecto_fisico ??'Sin asignar'}}</td>
            <td>{{ $seguro->estatura }}</td>
            </tr>
      
        </tbody>
    </table>
     <table class="table" id="Tabla">
        <thead>
        <tr>
        <th>Peso</th>
        <th>Plan</th>
        <th>Nombre Apellido Fallecimiento Titular</th>
        <th>Fecha de nacimiento de beneficiario</th>
        </tr>
        </thead>
        <tbody>
       
            <tr>
           <td>{{ $seguro->peso }}</td>
            <td>{{ $seguro->tipo_plan }}</td>
            <td>{{ $seguro->nombre_apellido_fallecimiento_titular }}</td>
            <td>{{ $seguro->fechanac_beneficiario }}</td>
            </tr>
      
        </tbody>
    </table>

    <table class="table" id="Tabla">
        <thead>
        <tr>
      <th>Parentesco Titular Beneficiario</th>
        <th>Ci Beneficiario</th>
        <th>Porcentaje Cesion</th>
        <th>Fecha de registro</th>
        
        </tr>
        </thead>
        <tbody>
       
            <tr>
            <td>{{ $seguro->parentesco_titular_beneficiario }}</td>
            <td>{{ $seguro->ci_beneficiario }}</td>
            <td>{{ $seguro->porcentaje_cesion }}</td>
            <td>{{ $seguro->created_at }}</td>

            </tr>
      
        </tbody>
    </table>
</div>
