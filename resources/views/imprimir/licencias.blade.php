@extends('layouts.app')

@section('content')
    
     @if(!empty($inscripcions) && $inscripcions->count() > 0)
     @foreach($inscripcions as $inscripcions)
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
    Mi licencia
    <style type="text/css">
        table {border-collapse: collapse;}
table td {padding: 0px}

    </style>
<div style="position:absolute;top:3.31in;left:2.96in;width:1.07in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Validuntil:</span></SPAN><br/></div>
<div style="position:absolute;top:3.31in;left:2.96in;width:1.07in;line-height:0.15in;"><DIV style="position:relative; left:0.48in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">31.12.2023</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>

<img style="position:absolute;top:1.22in;left: 2.82in;width:3.69in;height:2.33in" src="/imagenes/ri_1.png">
<img style="position:absolute;top:1.22in;left: 6.51in;width:3.69in;height:2.33in" src="/imagenes/ri_2.png">
<div style="position:absolute;top:1.28in;left: 4.38in;width:0.87in;line-height:0.40in;"><span style="font-style:normal;font-weight:bold;font-size:19pt;font-family:Calibri;color:#231f20;">2023</span><span style="font-style:normal;font-weight:bold;font-size:19pt;font-family:Calibri;color:#231f20"></span><br></div>
<div style="position:absolute;top:1.67in;left:4.17in;width:1.87in;line-height:0.21in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20">UCI</span></SPAN><br/></div>
<div style="position:absolute;top:1.67in;left:4.17in;width:1.87in;line-height:0.21in;"><DIV style="position:relative; left:0.25in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20">ID</span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.67in;left:4.17in;width:1.87in;line-height:0.21in;"><DIV style="position:relative; left:0.77in;"><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20">{{$inscripcions->uciid}}</span><span style="font-style:normal;font-weight:bold;font-size:10pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:1.86in;left:4.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Last</span></SPAN><br/></div>
<div style="position:absolute;top:1.86in;left:4.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.20in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">name(s) </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.86in;left: 4in;width:1.75in;line-height:0.14in;"><div style="position:relative;left: 1in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcions->primer_y_segundo_apellido}}</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br></div></div>
<div style="position:absolute;top:2.00in;left:4.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">First</span></SPAN><br/></div>
<div style="position:absolute;top:2.00in;left:4.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.21in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">name(s) </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.00in;left:2.17in;width:1.75in;line-height:0.15in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcions->primer_y_segundo_nombre }}</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.14in;left:4.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Nationality </span></SPAN><br/></div>
<div style="position:absolute;top:2.14in;left:2.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000">{{$inscripcions->nacionalidad}}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#000000"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.28in;left:4.17in;width:1.75in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Dateof</span></SPAN><br/></div>
<div style="position:absolute;top:2.28in;left:4.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:0.34in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">birth </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.28in;left:2.17in;width:1.75in;line-height:0.14in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcions->fechanac}}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.42in;left:4.17in;width:0.43in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Gender</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.42in;left:4.94in;width:0.42in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{$inscripcions->sexo }}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.65in;left:4.17in;width:0.48in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Role</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.65in;left:2.17in;width:1.11in;line-height:0.15in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">Rider</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.79in;left:4.17in;width:0.48in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Function</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:2.79in;left:2.17in;width:1.11in;line-height:0.15in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">-</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:2.92in;left:4.17in;width:1.11in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">UCI</span></SPAN><br/></div>
<div style="position:absolute;top:2.92in;left:5.17in;width:1.11in;line-height:0.14in;"><DIV style="position:relative; left:0.18in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Category </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:2.92in;left:2.17in;width:1.11in;line-height:0.15in;"><DIV style="position:relative; left:2.77in;"><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20">WU</span><span style="font-style:normal;font-weight:bold;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:3.06in;left:4.17in;width:0.34in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Team</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{ $inscripcions->nombre_equipo}}</span><br/></SPAN></div>
<div style="position:absolute;top:3.06in;left:2.94in;width:0.14in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">-</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></div>
<div style="position:absolute;top:1.64in;left:6.59in;width:1.60in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">FederationID </span></SPAN><br/></div>
<div style="position:absolute;top:1.64in;left: 6.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:0.88in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{ $inscripcions->federacion_id}}</span><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20"></span><br/></SPAN></DIV></div>
<div style="position:absolute;top:1.80in;left: 6.59in;width:1.60in;line-height:0.14in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">National</span></SPAN><br/></div>
<div style="position:absolute;top:1.80in;left: 6.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:0.39in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">Category </span></SPAN></DIV><br/></div>
<div style="position:absolute;top:1.80in;left: 6.59in;width:1.60in;line-height:0.14in;"><DIV style="position:relative; left:0.88in;"><span style="font-style:normal;font-weight:normal;font-size:7pt;font-family:Calibri;color:#231f20">{{ $inscripcions->categoria->nombre ?? 'Sin asignar'}}</span></SPAN></DIV><br/></div>
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
<img style="position:absolute;top:1.80in;left: 2.9in;width:1.21in;height:1.29in" src="{{ asset('storage').'/'.$inscripcions->foto}}">
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
   @endforeach
   @else
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mi Licencia</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <div class="container"> 
<br>
   <div class="alert alert-light" role="alert">
  <b><h4><center>Aun no posee una licencia!</center></h4></b>   
</div> 

            
                </div>
            </div>

        </div>                             
@endif
</div>
 @endsection