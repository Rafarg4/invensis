<div class="tab-content">
<div class="tab-pane active" id="tab_1">
 <div class="row">    
    <div class="form-group col-md-3">
    <label for="nombre">Nombres:</label>
    <input type="text" class="form-control" id="nombre" value="{{ $inscripcion->primer_y_segundo_nombre }}">
</div>
<div class="form-group col-md-3">
    <label for="apellido">Apellidos:</label>
    <input type="text" class="form-control" id="apellido" value="{{ $inscripcion->primer_y_segundo_apellido  }}">
</div>
<div class="form-group col-md-3">
    <label for="email">Email:</label>
    <input type="text" class="form-control" id="email" value="{{ $inscripcion->email }}">
</div>
<div class="form-group col-md-3">
    <label for="sexo">Sexo:</label>
    <input type="text" class="form-control" id="sexo" value="{{ $inscripcion->sexo }}">
</div>
<div class="form-group col-md-3">
    <label for="grupo_sanguineo">Grupo Sanguíneo:</label>
    <input type="text" class="form-control" id="grupo_sanguineo" value="{{ $inscripcion->grupo_sanguineo }}Sanguineo">
</div>
<div class="form-group col-md-3">
    <label for="nacionalidad">Nacionalidad:</label>
    <input type="text" class="form-control" id="nacionalidad" value="{{ $inscripcion->nacionalidad }}">
</div>
<div class="form-group col-md-3">
    <label for="celular">Celular:</label>
    <input type="text" class="form-control" id="celular" value="{{ $inscripcion->celular }}">
</div>
<div class="form-group col-md-3">
    <label for="region">Región:</label>
    <input type="text" class="form-control" id="region" value="{{ $inscripcion->region }}">
</div>
<div class="form-group col-md-3">
    <label for="domicilio">Domicilio:</label>
    <input type="text" class="form-control" id="domiciolio" value="{{ $inscripcion->domiciolio }}">
</div>
<div class="form-group col-md-3">
    <label for="departamento">Departamento:</label>
    <input type="text" class="form-control" id="departamento" value="{{ $inscripcion->departamento }}">
</div>
<div class="form-group col-md-3">
    <label for="ciudad">Ciudad:</label>
    <input type="text" class="form-control" id="ciudad" value="{{ $inscripcion->ciudad }}">
</div>
<div class="form-group col-md-3">
    <label for="categoria">Categoría:</label>
    <input type="text" class="form-control" id="categoria" value="{{ $inscripcion->categoria->nombre ?? 'Sin asignar' }}">
</div>
<div class="form-group col-md-3">
    <label for="estado">Estado:</label>
    <input type="text" class="form-control" id="estado" value="{{ $inscripcion->estado }}">
</div>
<div class="form-group col-md-3">
    <label for="monto">Monto:</label>
    <input type="text" class="form-control" id="monto" value="{{ number_format($inscripcion->monto) }}.Gs">
</div>
<div class="form-group col-md-3">
    <label for="federacion_id">Federación Id:</label>
    <input type="text" class="form-control" id="federacion_id" value="{{ $inscripcion->federacion_id ?? 'Sin asignar' }}">
</div>
<div class="form-group col-md-3">
    <label for="uciid">Uciid:</label>
    <input type="text" class="form-control" id="uciid" value="{{ $inscripcion->uciid ?? 'Sin asignar' }}">
</div>
<div class="form-group col-md-3">
    <label for="nombre_equipo">Nombre de equipo:</label>
    <input type="text" class="form-control" id="nombre_equipo" value="{{ $inscripcion->nombre_equipo }}">
</div>
<div class="form-group col-md-3">
    <label for="contacto_emergencia">Contacto de Emergencia:</label>
    <input type="text" class="form-control" id="contacto_emergencia" value="{{ $inscripcion->contacto_emergencia }}">
</div>
<div class="form-group col-md-3">
    <label for="nombre_apellido_contacto_emergencia">Nombre Apellido Contacto de Emergencia:</label>
    <input type="text" class="form-control" id="nombre_apellido_contacto_emergencia" value="{{ $inscripcion->nombre_apellido_contacto_emergencia }}">
</div>
<div class="form-group col-md-3">
    <label for="created_at">Fecha de Registro:</label>
    <input type="text" class="form-control" id="created_at" value="{{ $inscripcion->created_at }}">
</div>
<div class="form-group col-md-3">
    <label for="usuario">Creado por:</label>
    <input type="text" class="form-control" id="usuario" value="{{ $inscripcion->usuario->name }}">
</div>
</div>
</div>
<div class="tab-pane" id="tab_2">
 <div class="table-responsive" style="padding:15px;">
    <table class="table" id="tables">
        <thead>
        <tr>
        <th>Ci Inscripto</th>
        <th>Nombre y Apellido</th>
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
                <td>{{ $documento->inscripto->ci  ?? 'Inscripto no asignada' }}</td>
                <td>{{ $documento->inscripto->primer_y_segundo_nombre  ?? 'Inscripto no asignada' }} {{ $documento->inscripto->primer_y_segundo_apellido  ?? 'Inscripto no asignada' }}</td>
                <td><a href="{{route('documento.download_pago',$documento->id)}}"><img src="/pdf.jpg" width="35" height="35"></a></td>
            <td><a href="{{route('documento.download_inscripcion',$documento->id)}}"><img src="/pdf.jpg" width="35" height="35"></a></td>
            <td><a href="{{route('documento.download_seguro',$documento->id)}}"><img src="/pdf.jpg" width="35" height="35"></a></td>
            <td><a href="{{route('documento.download_certificado',$documento->id)}}"><img src="/pdf.jpg" width="35" height="35"></a></td>
            <td><a href="{{route('documento.download_copia',$documento->id)}}"><img src="/pdf.jpg" width="35" height="35"></a></td>
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
<div class="tab-pane" id="tab_3">
     @if(!empty($seguros) && $seguros->count() > 0)
        @foreach($seguros as $seguro)
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
        @endforeach
    @else
  <strong><h6><center>Aun no has registrado seguro? <a class="btn btn-primary" href="{{ route('seguros.create') }}"><i class="fa fas-solid fa-user-plus"></i></a></center></h6></strong>                                
@endif
</div>
<div class="tab-pane" id="tab_5">
<div class="table-responsive" style="padding:15px;">
    <table class="table" id="table">
        <thead>
        <tr>
        <th>Ci</th>
        <th>Inscripto</th>
        <th>Tipo Pago</th>
        <th>Comprobante</th>
        <th>Forma de pago</th>
        <th>Estado</th>
        <th>Observacion</th>
        <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pago)
            <tr>
            <td>{{ $pago->inscripcion->ci ?? 'Sin datos' }}</td>
            <td>{{ $pago->inscripcion->primer_y_segundo_nombre ?? 'Sin datos' }} {{ $pago->inscripcion->primer_y_segundo_apellido ?? 'Sin datos' }}</td>
            <td>{{ $pago->tarifa->tipo_plan ?? 'Sin datos' }}</td>
            <td><a href="{{route('comprobante.download_comprobante',$pago->id)}}"><img src="/pdf.jpg" width="35" height="35"></a></td>
            <td>{{ $pago->forma_pago }}</td>
             </td>
             <td>@switch(true)
            @case($pago->estado == 'En espera')
            <span class="badge badge-warning"> {{ $pago->estado }} </span>
            @break
            @case($pago->estado == 'Rechazado')
            <span class="badge badge-danger"> {{ $pago->estado }} </span>
            @break
            @case($pago->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $pago->estado }} </span>
            @break
            @endswitch</td>
            <td>{{ $pago->observacion }}</td>
                <td width="120">
                {!! Form::open(['route' => ['pagos.destroy', $pago->id], 'method' => 'delete']) !!}
                    <!-- Para que solo los usuarios normales puedan ver los botones, porque no cambia al mismo tiempo que el select -->
                    @if($pago->estado=='En espera')
                    <div class='btn-group'>
                        <button type="button" class='btn btn-warning btn-sm'>
                            <i class="fa fa-history" aria-hidden="true"></i>
                        </button>
                    </div>
                    @elseif($pago->estado=='Verificado')
                    <div class='btn-group'>
                        <button type="button" class='btn btn-success btn-sm'>
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                    </div>
                    @elseif($pago->estado=='Rechazado')
                    <div class='btn-group'>
                        <button type="button" class='btn btn-danger btn-sm'>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
<div class="tab-pane" id="tab_4">
  <br>
    <br>
     <div class="col d-flex justify-content-center">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <style type="text/css">
        table {border-collapse: collapse;}
table td {padding: 10px}

     </style>
<div style="position:absolute;top:3.31in;left:2.96in;width:1.07in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Validuntil:</span></SPAN><br/></div>
<div style="position:absolute;top:3.31in;left:2.96in;width:1.07in;line-height:0.15in;"><DIV style="position:relative; left:0.48in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">31.3.2023</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>

<img style="position:absolute;top:1.22in;left: 2.82in;width:3.69in;height:2.33in" src="/imagenes/ri_1.png">
<img style="position:absolute;top:1.22in;left: 6.51in;width:3.69in;height:2.33in" src="/imagenes/ri_2.png">
<div style="position:absolute;top:1.28in;left: 4.38in;width:0.87in;line-height:0.40in;"><span style="font-style:normal;font-weight:bold;font-size:19pt;font-family:Calibri;color:#231f20;">2023</span><span style="font-style:normal;font-weight:bold;font-size:19pt;font-family:Calibri;color:#231f20"></span><br></div>
<div style="position:absolute;top:1.67in;left:4.17in;width:1.87in;line-height:0.21in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20">UCI</span></SPAN><br/></div>
<div style="position:absolute;top:1.67in;left:4.17in;width:1.87in;line-height:0.21in;"><DIV style="position:relative; left:0.25in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20">ID</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.67in;left:4.17in;width:1.87in;line-height:0.21in;"><DIV style="position:relative; left:0.77in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20">{{$inscripcion->uciid}}</span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:1.86in;left:4.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Last</span></SPAN><br/></div>
<div style="position:absolute;top:1.86in;left:4.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.20in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">name(s) </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.86in;left: 4in;width:1.75in;line-height:0.14in;"><div style="position:relative;left: 1in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcion->primer_y_segundo_apellido}}</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br></div></div>
<div style="position:absolute;top:2.00in;left:4.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">First</span></SPAN><br/></div>
<div style="position:absolute;top:2.00in;left:4.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.21in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">name(s) </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.00in;left:2.17in;width:1.75in;line-height:0.15in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcion->primer_y_segundo_nombre }}</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.14in;left:4.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Nationality </span></SPAN><br/></div>
<div style="position:absolute;top:2.14in;left:2.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000">{{$inscripcion->nacionalidad}}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.28in;left:4.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Dateof</span></SPAN><br/></div>
<div style="position:absolute;top:2.28in;left:4.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.34in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">birth </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.28in;left:2.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcion->fechanac}}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.42in;left:4.17in;width:0.43in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Gender</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.42in;left:4.94in;width:0.42in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcion->sexo }}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.65in;left:4.17in;width:0.48in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Role</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.65in;left:2.17in;width:1.11in;line-height:0.15in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">Rider</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.79in;left:4.17in;width:0.48in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Function</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.79in;left:2.17in;width:1.11in;line-height:0.15in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">-</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.92in;left:4.17in;width:1.11in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">UCI</span></SPAN><br/></div>
<div style="position:absolute;top:2.92in;left:5.17in;width:1.11in;line-height:0.14in;"><DIV style="position:relative; left:0.18in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Category </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.92in;left:2.17in;width:1.11in;line-height:0.15in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">WU</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:3.06in;left:4.17in;width:0.34in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Team</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{ $inscripcion->nombre_equipo}}</span><br/></SPAN></div>
<div style="position:absolute;top:3.06in;left:2.94in;width:0.14in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">-</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:1.64in;left:6.59in;width:1.60in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">FederationID </span></SPAN><br/></div>
<div style="position:absolute;top:1.64in;left: 6.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:0.88in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{ $inscripcion->federacion_id}}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:1.80in;left: 6.59in;width:1.60in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">National</span></SPAN><br/></div>
<div style="position:absolute;top:1.80in;left: 6.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:0.39in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Category </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.80in;left: 6.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:0.88in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{ $inscripcion->categoria->nombre ?? 'Sin asignar'}}</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.80in;left: 6.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:1.20in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:1.97in;left: 6.59in;width:0.30in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Club</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:1.97in;left:6.59in;width:1.09in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">ClubCiclistaAmanecer</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.19in;left: 6.59in;width:1.46in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">FED</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Calibri;color:#231f20">.</span></SPAN><br/></div>
<div style="position:absolute;top:2.19in;left: 6.59in;width:1.46in;line-height:0.15in;"><DIV style="position:relative; left:0.22in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">PARAGUAYADECICLISMO</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.33in;left: 6.59in;width:2.61in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Medallistas</span></SPAN><br/></div>
<div style="position:absolute;top:2.33in;left: 6.59in;width:2.61in;line-height:0.14in;"><DIV style="position:relative; left:0.51in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">OlímpicoNº</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.33in;left: 6.59in;width:2.61in;line-height:0.14in;"><DIV style="position:relative; left:1.06in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">1COPParqueOlímpico-ÑuGuasu</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></DIV><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000">www.fpc.org.py</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000"></span><br/></SPAN></div>
<div style="position:absolute;top:2.60in;left: 6.59in;width:2.61in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000">secretaria@fpc.org.py</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000"></span><br/></SPAN></div>
<div style="position:absolute;top:2.74in;left: 6.59in;width:2.61in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">00595992558974</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.93in;left: 6.59in;width:2.77in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#d2232a">EMERGENCYCONTACT </span></SPAN><br/></div>
<div style="position:absolute;top:2.93in;left: 6.59in;width:2.77in;line-height:0.14in;"><DIV style="position:relative; left:1.19in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">CynthiaMendez,</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.93in;left: 6.59in;width:2.77in;line-height:0.14in;"><DIV style="position:relative; left:1.94in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">+595982864497</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<img style="position:absolute;top:1.32in;left: 5.6in;width:0.67in;height:0.29in" src="/imagenes/ri_3.png">
<img style="position:absolute;top:1.33in;left: 6.75in;width:0.38in;height:0.27in" src="/imagenes/ri_4.png">
<img style="position:absolute;top:1.33in;left: 9.42in;width:0.65in;height:0.16in" src="/imagenes/ri_5.png">
<img style="position:absolute;top:1.34in;left: 2.92in;width:1.13in;height:0.27in" src="/imagenes/ri_6.png">
<img style="position:absolute;top:1.74in;left:0.89in;width:1.22in;height:1.40in" src="/imagenes/ri_7.png" >
<img style="position:absolute;top:1.80in;left: 2.9in;width:1.21in;height:1.29in" src="{{ asset('storage/uploads/' . $inscripcion->foto) }}">
<img style="position:absolute;top:3.10in;left: 6.62in;width:3.47in;height:0.38in" src="/imagenes/ri_9.png">
<div style="position:absolute;top:3.14in;left:6.66in;width:3.34in;line-height:0.10in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">“I</span></SPAN><br/></div>
<div style="position:absolute;top:3.14in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.07in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">agreetoabideandbeboundby</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.07in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">theUCI</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.32in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">ConstitutionandRegulations,</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.24in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">inparticular</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.63in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">theUCI</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.88in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Anti-</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:3.05in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Doping</span><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:3.25in;left:6.66in;width:3.34in;line-height:0.10in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Rules.</span></SPAN><br/></div>
<div style="position:absolute;top:3.25in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.20in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">I</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.24in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">alsorecognisetheexclusivejurisdictionof</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.55in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">theCourt</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.86in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">of</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.94in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Arbitrationfor</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.40in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Sport</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.59in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">(CAS)</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">inLausanne,</span><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:3.36in;left:6.66in;width:3.34in;line-height:0.10in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Switzerland,</span></SPAN><br/></div>
<div style="position:absolute;top:3.36in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.40in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">as</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.48in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">providedfor</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.88in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">under</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.08in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">therelevant</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.47in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">provisions</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.80in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">of</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.88in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">theUCI</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:6.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.13in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Regulations.”</span><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<img style="position:absolute;top:1.30in;left: 8.41in;width:0.93in;height:0.33in" src="/imagenes/ri_10.png">
<img style="position:absolute;top:1.31in;left: 5.65in;width:0.44in;height:0.31in" src="/imagenes/ri_11.png">
  </div>
   </div>

</div>
</div>

</div>

</div>
</div>

</div>

</div>
