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
             <td>{{number_format ($inscripcion->monto)}} Gs</td>
            
            
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
        <th>Creado por</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $inscripcion->federacion_id ?? 'Sin asignar'}}</td>
            <td>{{ $inscripcion->uciid ?? 'Sin asignar' }}</td>
            <td>{{ $inscripcion->nombre_equipo }}</td>
            <td>{{ $inscripcion->contacto_emergencia }}</td>
                <td>{{ $inscripcion->nombre_apellido_contacto_emergencia }}</td>
            <td>{{ $inscripcion->created_at }}</td>
             <td>{{ $inscripcion->usuario->name }}</td>
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
            <td><a href="{{route('documento.download_inscripcion',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
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
  <div class="tab-pane fade" id="nav-licencia" role="tabpanel" aria-labelledby="nav-licencia-tab">
    <br>
    <br>
     <div class="card">
  <div class="card-body">
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
<div style="position:absolute;top:3.31in;left:0.96in;width:1.07in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Validuntil:</span></SPAN><br/></div>
<div style="position:absolute;top:3.31in;left:0.96in;width:1.07in;line-height:0.15in;"><DIV style="position:relative; left:0.48in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">31.12.2023</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>

<img style="position:absolute;top:1.22in;left:0.82in;width:3.69in;height:2.33in" src="/imagenes/ri_1.png">
<img style="position:absolute;top:1.22in;left:4.51in;width:3.69in;height:2.33in" src="/imagenes/ri_2.png">
<div style="position:absolute;top:1.28in;left:2.38in;width:0.87in;line-height:0.40in;"><span style="font-style:normal;font-weight:bold;font-size:19pt;font-family:Calibri;color:#231f20">2023</span><span style="font-style:normal;font-weight:bold;font-size:19pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:1.67in;left:2.17in;width:1.87in;line-height:0.21in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20">UCI</span></SPAN><br/></div>
<div style="position:absolute;top:1.67in;left:2.17in;width:1.87in;line-height:0.21in;"><DIV style="position:relative; left:0.25in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20">ID</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.67in;left:2.17in;width:1.87in;line-height:0.21in;"><DIV style="position:relative; left:0.77in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20">{{ $inscripcion->uciid }}</span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:1.86in;left:2.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Last</span></SPAN><br/></div>
<div style="position:absolute;top:1.86in;left:2.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.20in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">name(s) </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.86in;left:2.17in;width:1.75in;line-height:0.15in;"><DIV style="position:relative; left:0.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">{{ $inscripcion->primer_y_segundo_apellido }}</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.00in;left:2.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">First</span></SPAN><br/></div>
<div style="position:absolute;top:2.00in;left:2.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.21in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">name(s) </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.00in;left:2.17in;width:1.75in;line-height:0.15in;"><DIV style="position:relative; left:0.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcion->primer_y_segundo_nombre }}</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.14in;left:2.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Nationality </span></SPAN><br/></div>
<div style="position:absolute;top:2.14in;left:2.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.77in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000">{{$inscripcion->nacionalidad}}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.28in;left:2.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Dateof</span></SPAN><br/></div>
<div style="position:absolute;top:2.28in;left:2.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.34in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">birth </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.28in;left:2.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.77in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcion->fechanac}}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.42in;left:2.17in;width:0.43in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Gender</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.42in;left:2.94in;width:0.42in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcion->sexo }}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.65in;left:2.17in;width:0.48in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Role</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.65in;left:2.17in;width:1.11in;line-height:0.15in;"><DIV style="position:relative; left:0.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">Rider</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.79in;left:2.17in;width:0.48in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Function</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.79in;left:2.17in;width:1.11in;line-height:0.15in;"><DIV style="position:relative; left:0.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">-</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.92in;left:2.17in;width:1.11in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">UCI</span></SPAN><br/></div>
<div style="position:absolute;top:2.92in;left:2.17in;width:1.11in;line-height:0.14in;"><DIV style="position:relative; left:0.18in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Category </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.92in;left:2.17in;width:1.11in;line-height:0.15in;"><DIV style="position:relative; left:0.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">WU</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:3.06in;left:2.17in;width:0.34in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Team</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{ $inscripcion->nombre_equipo}}</span><br/></SPAN></div>
<div style="position:absolute;top:3.06in;left:2.94in;width:0.14in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">-</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:1.64in;left:4.59in;width:1.60in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">FederationID </span></SPAN><br/></div>
<div style="position:absolute;top:1.64in;left:4.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:0.88in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{ $inscripcion->federacion_id}}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:1.80in;left:4.59in;width:1.60in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">National</span></SPAN><br/></div>
<div style="position:absolute;top:1.80in;left:4.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:0.39in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Category </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.80in;left:4.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:0.88in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{ $inscripcion->categoria->nombre}}</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.80in;left:4.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:1.20in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:1.97in;left:4.59in;width:0.30in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Club</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:1.97in;left:5.47in;width:1.09in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">ClubCiclistaAmanecer</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.19in;left:4.59in;width:1.46in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">FED</span><span style="font-style:normal;font-weight:bold;font-size:8pt;font-family:Calibri;color:#231f20">.</span></SPAN><br/></div>
<div style="position:absolute;top:2.19in;left:4.59in;width:1.46in;line-height:0.15in;"><DIV style="position:relative; left:0.22in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">PARAGUAYADECICLISMO</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.33in;left:4.59in;width:2.61in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Medallistas</span></SPAN><br/></div>
<div style="position:absolute;top:2.33in;left:4.59in;width:2.61in;line-height:0.14in;"><DIV style="position:relative; left:0.51in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">OlímpicoNº</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.33in;left:4.59in;width:2.61in;line-height:0.14in;"><DIV style="position:relative; left:1.06in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">1COPParqueOlímpico-ÑuGuasu</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></DIV><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000">www.fpc.org.py</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000"></span><br/></SPAN></div>
<div style="position:absolute;top:2.60in;left:4.59in;width:2.61in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000">secretaria@fpc.org.py</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000"></span><br/></SPAN></div>
<div style="position:absolute;top:2.74in;left:4.59in;width:2.61in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">00595992558974</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.93in;left:4.59in;width:2.77in;line-height:0.15in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#d2232a">EMERGENCYCONTACT </span></SPAN><br/></div>
<div style="position:absolute;top:2.93in;left:4.59in;width:2.77in;line-height:0.14in;"><DIV style="position:relative; left:1.19in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">CynthiaMendez,</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.93in;left:4.59in;width:2.77in;line-height:0.14in;"><DIV style="position:relative; left:1.94in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">+595982864497</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<img style="position:absolute;top:1.32in;left:4.60in;width:0.67in;height:0.29in" src="/imagenes/ri_3.png" >
<img style="position:absolute;top:1.33in;left:4.75in;width:0.38in;height:0.27in" src="/imagenes/ri_4.png" >
<img style="position:absolute;top:1.33in;left:7.42in;width:0.65in;height:0.16in" src="/imagenes/ri_5.png" >
<img style="position:absolute;top:1.34in;left:0.92in;width:1.13in;height:0.27in" src="/imagenes/ri_6.png" >
<img style="position:absolute;top:1.74in;left:0.89in;width:1.22in;height:1.40in" src="/imagenes/ri_7.png" >
<img style="position:absolute;top:1.80in;left:0.90in;width:1.21in;height:1.29in" src="{{ asset('storage').'/'.$inscripcion->foto}}" >
<img style="position:absolute;top:3.10in;left:4.62in;width:3.47in;height:0.38in" src="/imagenes/ri_9.png" >
<div style="position:absolute;top:3.14in;left:4.66in;width:3.34in;line-height:0.10in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">“I</span></SPAN><br/></div>
<div style="position:absolute;top:3.14in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.07in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">agreetoabideandbeboundby</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.07in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">theUCI</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.32in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">ConstitutionandRegulations,</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.24in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">inparticular</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.63in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">theUCI</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.88in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Anti-</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.14in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:3.05in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Doping</span><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:3.25in;left:4.66in;width:3.34in;line-height:0.10in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Rules.</span></SPAN><br/></div>
<div style="position:absolute;top:3.25in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.20in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">I</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.24in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">alsorecognisetheexclusivejurisdictionof</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.55in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">theCourt</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.86in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">of</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.94in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Arbitrationfor</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.40in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Sport</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.59in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">(CAS)</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.25in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">inLausanne,</span><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:3.36in;left:4.66in;width:3.34in;line-height:0.10in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Switzerland,</span></SPAN><br/></div>
<div style="position:absolute;top:3.36in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.40in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">as</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.48in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">providedfor</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:0.88in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">under</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.08in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">therelevant</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.47in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">provisions</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.80in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">of</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:1.88in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">theUCI</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:3.36in;left:4.66in;width:3.34in;line-height:0.10in;"><DIV style="position:relative; left:2.13in;"><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20">Regulations.”</span><span style="font-style:normal;font-weight:normal;font-size:5pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<img style="position:absolute;top:1.30in;left:3.41in;width:0.93in;height:0.33in" src="/imagenes/ri_10.png">
<img style="position:absolute;top:1.31in;left:3.65in;width:0.44in;height:0.31in" src="/imagenes/ri_11.png">
  </div>
</div>
</div> 
<script type="text/javascript">
    $('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>