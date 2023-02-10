 <div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
            <td>{{ $inscripcion->primer_y_segundo_apellido }}</td>
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
        <th>Uciid</th>
        <th>Nombre de equipo</th>   
        <th>Contacto Emergencia</th>
        <th>Nombre Apellido Contacto Emergencia</th>
        <th>Fecha de registro</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $inscripcion->federacion_id }}</td>
            <td>{{ $inscripcion->uciid }}</td>
            <td>{{ $inscripcion->nombre_equipo }}</td>
            <td>{{ $inscripcion->contacto_emergencia }}</td>
                <td>{{ $inscripcion->nombre_apellido_contacto_emergencia }}</td>
            <td>{{ $inscripcion->created_at }}</td>
            </tr>
        </tbody>
    </table>
</div>
                </div>
        

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
           <div class="table-responsive" style="padding:15px;">
    <table class="table" id="Tabla">
        <thead>
        <tr>
            <th>Pago</th>
        <th>Inscripcion</th>
        <th> Seguro medico</th>
        <th>Certificado medico</th>
        <th> Copia de cedula</th>
        <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documento as $documento)
            <tr>
               <td><a href="{{route('documento.download_pago',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_inscripcion',$documento->id)}}"><img src="pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_seguro',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_certificado',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_copia',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
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
   
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
        <th>Nombre Apellido Fallecimiento Titular</th>
        <th>Fecha de nacimiento de beneficiario</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seguros as $seguro)
            <tr>
           <td>{{ $seguro->peso }}</td>
            <td>{{ $seguro->tipo_plan }}</td>
            <td>{{ $seguro->nombre_apellido_fallecimiento_titular }}</td>
            <td>{{ $seguro->fechanac_beneficiario }}</td>
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
        <th>Fecha de registro</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seguros as $seguro)
            <tr>
            <td>{{ $seguro->parentesco_titular_beneficiario }}</td>
            <td>{{ $seguro->ci_beneficiario }}</td>
            <td>{{ $seguro->porcentaje_cesion }}</td>
            <td>{{ $seguro->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div></div>
  </div>
</div> 
</div></div>
  

<script type="text/javascript">
    $('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>