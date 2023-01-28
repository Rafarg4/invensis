  <div class="table-responsive">
    <table class="table" id="tabla">
        <thead>
        <tr>
            <th>Foto</th>
            <th>Nombres</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Fecha de nacimiento</th>
        <th>Cedula de indentidad</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="{{ asset('storage').'/'.$inscripcion->foto}}" width="50" height="50" class="img-circle"></td>
                <td>{{ $inscripcion->primer_y_segundo_nombre }}</td>
            <td>{{ $inscripcion->primer_y_segundo_nombre }}</td>
            <td>{{ $inscripcion->email }}</td>
            <td>{{ $inscripcion->fechanac }}</td>
            <td>{{ $inscripcion->ci }}</td>
            
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
                </div>
            </div>
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <i class="fa fas-light fa-book"></i> Detalles de Documentos
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        
                    <div class="table-responsive" style="padding:15px;">
    <table class="table" id="Tabla">
        <thead>
        <tr>
            <th>Archivo Pago</th>
        <th>Archivo Inscripcion</th>
        <th>Archivo Seguro medico</th>
        <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documento as $documento)
            <tr>
                <td><a href="{{route('documento.download_pago',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_inscripcion',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_seguro',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
             <td>@switch(true)
            @case($documento->estado == 'En espera')
            <span class="badge badge-primary"> {{ $documento->estado }} </span>
            @break
            @case($documento->estado == 'Paralizado')
            <span class="badge badge-warning"> {{ $documento->estado }} </span>
            @break
            @case($documento->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $documento->estado }} </span>
            @break
            @endswitch</td>
                            
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

                </div>
            </div>
        </div>
   
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         <i class="fa fas-regular fa-laptop-medical"></i> Detalles de Seguro
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
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
        @foreach($seguros as $seguro)
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
        @foreach($seguros as $seguro)
            <tr>
            <td>{{ $seguro->especificar_enfermedad }}</td>
            <td>{{ $seguro->presenta_defecto_fisico }}</td>
            <td>{{ $seguro->especifique_defecto_fisico }}</td>
            <td>{{ $seguro->estatura }}</td>
            </tr>
        @endforeach
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
        @foreach($seguros as $seguro)
            <tr>
            <td>{{ $seguro->parentesco_titular_beneficiario }}</td>
            <td>{{ $seguro->ci_beneficiario }}</td>
            <td>{{ $seguro->porcentaje_cesion }}</td>
            <td>{{ $seguro->fechanac_beneficiario }}</td>
             <td>{{ $seguro->created_at }}</td>
            </tr>
        @endforeach
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
        @foreach($seguros as $seguro)
            <tr>
            <td>{{ $seguro->parentesco_titular_beneficiario }}</td>
            <td>{{ $seguro->ci_beneficiario }}</td>
            <td>{{ $seguro->porcentaje_cesion }}</td>
            <td>{{ $seguro->fechanac_beneficiario }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
      </div>
    </div>
  </div>
</div>
        </div>
    
