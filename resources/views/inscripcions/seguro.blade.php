@extends('layouts.app')

@section('content')
<style type="text/css">
    @media print {
     header {display: none !important;}
     footer {display: none !important;}
      nav {display: none !important;}
     .noimprimir {display: none !important;}
     body {background: #fff !important;}     
}
</style>

 <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('inscripcions.index') }}">
                        Volver
                    </a>
                <div class="col-sm-12">
                    <a class="btn btn-default float-right"
                      button type="button" class="btn btn-primary"  onclick="javascript:window.print()"> <i class="fas fa-file-pdf"></i> Descargar</button>
                    </a>
                    
                </div>
            </div>
        </div>
    </section>
    <div class="col d-flex justify-content-center">
      @if(!empty($seguros) && $seguros->count() > 0)
      @foreach($seguros as $seguros)
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
<head>
<title></title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <br/>
<style type="text/css">
<!--
  p {margin: 0; padding: 0;}  .ft10{font-size:6px;font-family:Times;color:#000000;}
  .ft11{font-size:7px;font-family:Times;color:#000000;}
  .ft12{font-size:6px;font-family:Times;color:#000000;}
  .ft13{font-size:10px;font-family:Times;color:#000000;}
  .ft14{font-size:8px;font-family:Times;color:#000000;}
  .ft15{font-size:11px;font-family:Times;color:#000000;}
  .ft16{font-size:8px;font-family:Times;color:#000000;}
  .ft17{font-size:7px;font-family:Times;color:#000000;}
  .ft18{font-size:6px;font-family:Times;color:#0000ff;}
  .ft19{font-size:8px;font-family:Times;color:#000000;}
  .ft110{font-size:-1px;font-family:Times;color:#000000;}
  .ft111{font-size:1px;font-family:Times;color:#000000;}
  .ft112{font-size:12px;font-family:Times;color:#000000;}
  .ft113{font-size:9px;font-family:Times;color:#000000;}
  .ft114{font-size:8px;font-family:Times;color:#000000;}
  .ft115{font-size:4px;font-family:Times;color:#000000;}
  .ft116{font-size:8px;font-family:Times;color:#000000;}
  .ft117{font-size:8px;font-family:Times;color:#000000;}
  .ft118{font-size:12px;font-family:Times;color:#000000;}
  .ft119{font-size:10px;font-family:Times;color:#000000;}
  .ft120{font-size:10px;font-family:Times;color:#000000;}
  .ft121{font-size:9px;font-family:Times;color:#000000;}
  .ft122{font-size:6px;font-family:Times;color:#0000ff;}
  .ft123{font-size:19px;font-family:Times;color:#000000;}
  .ft124{font-size:5px;font-family:Times;color:#000000;-moz-transform: matrix(0.0000000752, -1.0000000752, 0.952381024, 0.0000000714, 0, 0);-webkit-transform: matrix(0.0000000752, -1.0000000752, 0.952381024, 0.0000000714, 0, 0);-o-transform: matrix(0.0000000752, -1.0000000752, 0.952381024, 0.0000000714, 0, 0);-ms-transform: matrix(0.0000000752, -1.0000000752, 0.952381024, 0.0000000714, 0, 0);-moz-transform-origin: left 75%;-webkit-transform-origin: left 75%;-o-transform-origin: left 75%;-ms-transform-origin: left 75%;}
  .ft125{font-size:6px;font-family:Times;color:#000000;-moz-transform: matrix(0.0000000756, -1.0000000756, 0.9564802253, 0.0000000717, 0, 0);-webkit-transform: matrix(0.0000000756, -1.0000000756, 0.9564802253, 0.0000000717, 0, 0);-o-transform: matrix(0.0000000756, -1.0000000756, 0.9564802253, 0.0000000717, 0, 0);-ms-transform: matrix(0.0000000756, -1.0000000756, 0.9564802253, 0.0000000717, 0, 0);-moz-transform-origin: left 75%;-webkit-transform-origin: left 75%;-o-transform-origin: left 75%;-ms-transform-origin: left 75%;}
  .ft126{font-size:7px;line-height:10px;font-family:Times;color:#000000;}
  .ft127{font-size:7px;line-height:11px;font-family:Times;color:#000000;}
  .ft128{font-size:12px;line-height:17px;font-family:Times;color:#000000;}
  .ft129{font-size:8px;line-height:12px;font-family:Times;color:#000000;}
  .ft130{font-size:7px;line-height:10px;font-family:Times;color:#000000;}
  .ft131{font-size:8px;line-height:9px;font-family:Times;color:#000000;}
  .ft132{font-size:8px;line-height:8px;font-family:Times;color:#000000;}
  .ft133{font-size:5px;line-height:9px;font-family:Times;color:#000000;}
  .ft134{font-size:8px;line-height:10px;font-family:Times;color:#000000;}
  .ft135{font-size:12px;line-height:17px;font-family:Times;color:#000000;}
-->
</style>
</head>

<body bgcolor="#A0A0A0" vlink="blue" link="blue">
<div id="page1-div" style="position:relative;width:918px;height:1188px;">
<img width="918" height="1188" src="/target001.png" alt="background image"/>
<p style="position:absolute;top:47px;left:336px;white-space:nowrap" class="ft10"><b>SOLICITUD&#160;DE&#160;ADHESIÓN&#160;INDIVIDUAL&#160;AL&#160;SEGURO&#160;</b></p>
<p style="position:absolute;top:19px;left:114px;white-space:nowrap" class="ft126">&#160;<br/>&#160;</p>
<p style="position:absolute;top:46px;left:125px;white-space:nowrap" class="ft12"><i><b>Tu&#160;Aseguradora&#160;global&#160;de&#160;confianza!&#160;</b></i></p>
<p style="position:absolute;top:19px;left:338px;white-space:nowrap" class="ft13"><i><b>&#160;</b></i></p>
<p style="position:absolute;top:33px;left:349px;white-space:nowrap" class="ft14"><b>ACCIDENTES&#160;PERSONALES&#160;COLECTIVO&#160;</b></p>
<p style="position:absolute;top:45px;left:338px;white-space:nowrap" class="ft15"><b>&#160;</b></p>
<p style="position:absolute;top:59px;left:405px;white-space:nowrap" class="ft16"><b>1.&#160;DATOS&#160;ESPECÍFICOS&#160;DE&#160;PÓLIZA&#160;</b></p>
<p style="position:absolute;top:23px;left:593px;white-space:nowrap" class="ft17"><b>Avda.&#160;Mcal.&#160;López&#160;Nº&#160;930&#160;e/Gral.&#160;Aquino&#160;-&#160;Asunción,&#160;Paraguay&#160;</b></p>
<p style="position:absolute;top:33px;left:579px;white-space:nowrap" class="ft17"><b>Teléfono&#160;(+595&#160;21)&#160;217-6000&#160;/&#160;RUC&#160;80007979-5&#160;<a href="http://www.mapfre.com.py/">/&#160;</a></b></p>
<p style="position:absolute;top:33px;left:734px;white-space:nowrap" class="ft18"><a href="http://www.mapfre.com.py/"><b>www.mapfre.com.py</b></a></p>
<p style="position:absolute;top:33px;left:800px;white-space:nowrap" class="ft17"><a href="http://www.mapfre.com.py/"><b>&#160;</b></a></p>
<p style="position:absolute;top:74px;left:143px;white-space:nowrap" class="ft19">Seguro&#160;nuevo&#160;</p>
<p style="position:absolute;top:74px;left:375px;white-space:nowrap" class="ft16"><b>VIGENCIA&#160;DEL&#160;SEGURO&#160;</b></p>
<p style="position:absolute;top:73px;left:589px;white-space:nowrap" class="ft16"><b>Tipo&#160;de&#160;Envío&#160;</b></p>
<p style="position:absolute;top:91px;left:143px;white-space:nowrap" class="ft19">Renovación&#160;de&#160;la&#160;Póliza&#160;N°:&#160;</p>
<p style="position:absolute;top:90px;left:375px;white-space:nowrap" class="ft19">Desde:&#160;</p>
<p style="position:absolute;top:91px;left:606px;white-space:nowrap" class="ft19">Courrier&#160;</p>
<p style="position:absolute;top:90px;left:678px;white-space:nowrap" class="ft19">ENTRADA&#160;Nº:&#160;</p>
<p style="position:absolute;top:99px;left:356px;white-space:nowrap" class="ft110">&#160;</p>
<p style="position:absolute;top:99px;left:534px;white-space:nowrap" class="ft110">&#160;</p>
<p style="position:absolute;top:108px;left:143px;white-space:nowrap" class="ft19">Suplemento&#160;de&#160;la&#160;Póliza&#160;N°:&#160;</p>
<p style="position:absolute;top:108px;left:375px;white-space:nowrap" class="ft19">Hasta:&#160;</p>
<p style="position:absolute;top:106px;left:594px;white-space:nowrap" class="ft10"><b>x&#160;&#160;</b></p>
<p style="position:absolute;top:108px;left:604px;white-space:nowrap" class="ft19">Digital&#160;</p>
<p style="position:absolute;top:123px;left:143px;white-space:nowrap" class="ft19">Seguro&#160;Individual&#160;</p>
<p style="position:absolute;top:140px;left:143px;white-space:nowrap" class="ft19">Agente:&#160;</p>
<p style="position:absolute;top:115px;left:206px;white-space:nowrap" class="ft111">&#160;</p>
<p style="position:absolute;top:119px;left:251px;white-space:nowrap" class="ft112">&#160;</p>
<p style="position:absolute;top:140px;left:207px;white-space:nowrap" class="ft19">JOELMA&#160;ZOCCHE&#160;</p>
<p style="position:absolute;top:117px;left:276px;white-space:nowrap" class="ft11">&#160;</p>
<p style="position:absolute;top:128px;left:276px;white-space:nowrap" class="ft113">&#160;</p>
<p style="position:absolute;top:140px;left:304px;white-space:nowrap" class="ft19">Matrícula&#160;Nº:&#160;</p>
<p style="position:absolute;top:124px;left:357px;white-space:nowrap" class="ft19">Gs.&#160;</p>
<p style="position:absolute;top:117px;left:372px;white-space:nowrap" class="ft11">&#160;</p>
<p style="position:absolute;top:128px;left:372px;white-space:nowrap" class="ft113">&#160;</p>
<p style="position:absolute;top:140px;left:376px;white-space:nowrap" class="ft19">812&#160;</p>
<p style="position:absolute;top:124px;left:410px;white-space:nowrap" class="ft19">USD.&#160;</p>
<p style="position:absolute;top:117px;left:432px;white-space:nowrap" class="ft11">&#160;</p>
<p style="position:absolute;top:128px;left:432px;white-space:nowrap" class="ft113">&#160;</p>
<p style="position:absolute;top:140px;left:446px;white-space:nowrap" class="ft19">Ofic.&#160;Comercial:&#160;</p>
<p style="position:absolute;top:140px;left:517px;white-space:nowrap" class="ft19">SANTA&#160;RITA&#160;</p>
<p style="position:absolute;top:124px;left:607px;white-space:nowrap" class="ft19">Otros,&#160;espec.&#160;</p>
<p style="position:absolute;top:117px;left:656px;white-space:nowrap" class="ft11">&#160;</p>
<p style="position:absolute;top:128px;left:656px;white-space:nowrap" class="ft113">&#160;</p>
<p style="position:absolute;top:140px;left:678px;white-space:nowrap" class="ft19">Ejecutivo:&#160;</p>
<p style="position:absolute;top:117px;left:715px;white-space:nowrap" class="ft11">&#160;</p>
<p style="position:absolute;top:128px;left:715px;white-space:nowrap" class="ft113">&#160;</p>
<p style="position:absolute;top:140px;left:720px;white-space:nowrap" class="ft19">FABIULA&#160;NOGUERA&#160;</p>
<p style="position:absolute;top:155px;left:391px;white-space:nowrap" class="ft16"><b>2.&#160;DATOS&#160;DEL&#160;TOMADOR&#160;/&#160;CONTRATANTE&#160;</b></p>
<p style="position:absolute;top:169px;left:125px;white-space:nowrap" class="ft114">Nombre&#160;/&#160;Razón&#160;Social:&#160;&#160;&#160;&#160;&#160;&#160;<b>FEDERACION&#160;PARAGUAYA&#160;DE&#160;CICLISMO&#160;</b></p>
<p style="position:absolute;top:182px;left:125px;white-space:nowrap" class="ft114">CIP&#160;:&#160;</p>
<p style="position:absolute;top:182px;left:291px;white-space:nowrap" class="ft114">RUC:&#160;&#160;<b>80031091-8&#160;</b></p>
<p style="position:absolute;top:182px;left:523px;white-space:nowrap" class="ft114">CRP:&#160;</p>
<p style="position:absolute;top:182px;left:682px;white-space:nowrap" class="ft114">CRC:&#160;</p>
<p style="position:absolute;top:196px;left:125px;white-space:nowrap" class="ft114">Domicilio&#160;Laboral&#160;/&#160;Comercial:&#160;</p>
<p style="position:absolute;top:209px;left:125px;white-space:nowrap" class="ft114">Barrio:&#160;</p>
<p style="position:absolute;top:209px;left:179px;white-space:nowrap" class="ft10"><b>URBANO&#160;</b></p>
<p style="position:absolute;top:223px;left:114px;white-space:nowrap" class="ft14"><b>&#160;</b></p>
<p style="position:absolute;top:239px;left:125px;white-space:nowrap" class="ft114">Nombre&#160;y&#160;Apellido: {{$inscripcion->primer_y_segundo_nombre}} {{$inscripcion->primer_y_segundo_apellido}} &#160;</p>
<p style="position:absolute;top:252px;left:125px;white-space:nowrap" class="ft114">CIP&#160;:&#160;</p>
<p style="position:absolute;top:196px;left:268px;white-space:nowrap" class="ft10"><b>MEDALLISTAS&#160;OLIMPICOS&#160;N1&#160;AUTOPISTA&#160;ÑU&#160;GUAZU&#160;</b></p>
<p style="position:absolute;top:209px;left:393px;white-space:nowrap" class="ft114">Ciudad:&#160;</p>
<p style="position:absolute;top:209px;left:446px;white-space:nowrap" class="ft10"><b>LUQUE&#160;</b></p>
<p style="position:absolute;top:209px;left:642px;white-space:nowrap" class="ft114">Teléfono:&#160;</p>
<p style="position:absolute;top:209px;left:696px;white-space:nowrap" class="ft10"><b>0992-558974&#160;</b></p>
<p style="position:absolute;top:225px;left:419px;white-space:nowrap" class="ft16"><b>3.&#160;DATOS&#160;DEL&#160;ASEGURADO&#160;</b></p>
<p style="position:absolute;top:234px;left:257px;white-space:nowrap" class="ft14"><b>&#160;</b></p>
<p style="position:absolute;top:252px;left:292px;white-space:nowrap" class="ft114">RUC: {{$inscripcion->ci}}&#160;</p>
<p style="position:absolute;top:252px;left:523px;white-space:nowrap" class="ft114">CRP:&#160;</p>
<p style="position:absolute;top:252px;left:682px;white-space:nowrap" class="ft114">CRC:&#160;</p>
<p style="position:absolute;top:266px;left:125px;white-space:nowrap" class="ft114">Fecha&#160;de&#160;Nac.:  {{$inscripcion->fechanac}}&#160;</p>
<p style="position:absolute;top:266px;left:291px;white-space:nowrap" class="ft114">Edad: {{$inscripcion->edad}}&#160;</p>
<p style="position:absolute;top:264px;left:676px;white-space:nowrap" class="ft110">&#160;</p>
<p style="position:absolute;top:267px;left:454px;white-space:nowrap" class="ft114">Nacionalidad: {{$inscripcion->nacionalidad}}&#160;</p>
<p style="position:absolute;top:267px;left:683px;white-space:nowrap" class="ft114">Sexo:&#160;</p>
<p style="position:absolute;top:275px;left:677px;white-space:nowrap" class="ft110">&#160;</p>
<p style="position:absolute;top:266px;left:723px;white-space:nowrap" class="ft114">@if($inscripcion->sexo=='Masculino')
M&#160;(&#160;&#160;&#160;X)&#160;
@else
F&#160;(&#160;&#160;&#160; X)&#160;&#160;&#160;&#160;/&#160;&#160;&#160;&#160;@endif</p>
<p style="position:absolute;top:279px;left:125px;white-space:nowrap" class="ft114">Profesión:&#160;</p>
<p style="position:absolute;top:293px;left:125px;white-space:nowrap" class="ft114">Domicilio&#160;Particular:&#160;</p>
<p style="position:absolute;top:276px;left:374px;white-space:nowrap" class="ft110">&#160;</p>
<p style="position:absolute;top:280px;left:359px;white-space:nowrap" class="ft114">Actividad&#160;/&#160;Ramo&#160;/&#160;Ocupación:&#160;</p>
<p style="position:absolute;top:280px;left:660px;white-space:nowrap" class="ft114">Estado&#160;Civil: {{$seguros->estado_civil}}&#160;</p>
<p style="position:absolute;top:307px;left:125px;white-space:nowrap" class="ft114">Barrio: {{$inscripcion->domiciolio}}&#160;</p>
<p style="position:absolute;top:320px;left:125px;white-space:nowrap" class="ft114">Domicilio&#160;Laboral&#160;/&#160;Comercial:&#160;</p>
<p style="position:absolute;top:334px;left:125px;white-space:nowrap" class="ft114">Barrio:&#160;</p>
<p style="position:absolute;top:347px;left:125px;white-space:nowrap" class="ft114">Dirección&#160;de&#160;correo&#160;electrónico: {{$inscripcion->email}}&#160;</p>
<p style="position:absolute;top:307px;left:393px;white-space:nowrap" class="ft114">Ciudad: {{$inscripcion->ciudad}}&#160;</p>
<p style="position:absolute;top:307px;left:642px;white-space:nowrap" class="ft114">Teléfono: {{$inscripcion->celular}}&#160;</p>
<p style="position:absolute;top:315px;left:641px;white-space:nowrap" class="ft110">&#160;</p>
<p style="position:absolute;top:318px;left:326px;white-space:nowrap" class="ft11">&#160;</p>
<p style="position:absolute;top:334px;left:393px;white-space:nowrap" class="ft114">Ciudad:&#160;</p>
<p style="position:absolute;top:334px;left:642px;white-space:nowrap" class="ft114">Teléfono:&#160;</p>
<p style="position:absolute;top:342px;left:641px;white-space:nowrap" class="ft110">&#160;</p>
<p style="position:absolute;top:345px;left:326px;white-space:nowrap" class="ft11">&#160;</p>
<p style="position:absolute;top:355px;left:326px;white-space:nowrap" class="ft115">&#160;</p>
<p style="position:absolute;top:363px;left:338px;white-space:nowrap" class="ft16"><b>4.&#160;DECLARACIÓN&#160;DE&#160;SALUD&#160;BÁSICA&#160;(En&#160;caso&#160;afirmativo,&#160;favor&#160;detallar)&#160;</b></p>
<p style="position:absolute;top:377px;left:125px;white-space:nowrap" class="ft19">1.&#160;¿Padece&#160;o&#160;está&#160;siendo&#160;tratado&#160;por&#160;alguna&#160;enfermedad?&#160;</p>
<p style="position:absolute;top:377px;left:358px;white-space:nowrap" class="ft19">NO: @if($seguros->padece_enfermedad=='No') X @endif&#160;</p>
<p style="position:absolute;top:391px;left:125px;white-space:nowrap" class="ft19">2.&#160;¿Presenta&#160;algún&#160;defecto&#160;físico,&#160;mutilación&#160;o&#160;deformación?&#160;&#160;&#160;</p>
<p style="position:absolute;top:391px;left:358px;white-space:nowrap" class="ft19">NO:@if($seguros->presenta_defecto_fisico=='No') X @endif&#160;</p>
<p style="position:absolute;top:405px;left:125px;white-space:nowrap" class="ft19">Indique&#160;además:&#160;</p>
<p style="position:absolute;top:405px;left:214px;white-space:nowrap" class="ft19">Estatura: {{$seguros->estatura}}&#160;</p>
<p style="position:absolute;top:405px;left:304px;white-space:nowrap" class="ft19">cm.&#160;</p>
<p style="position:absolute;top:405px;left:339px;white-space:nowrap" class="ft19">Peso: {{$seguros->peso}}&#160;</p>
<p style="position:absolute;top:377px;left:399px;white-space:nowrap" class="ft19">SI:@if($seguros->padece_enfermedad=='Si') X @endif&#160;  {{$seguros->especificar_enfermedad}}  </p>
<p style="position:absolute;top:391px;left:399px;white-space:nowrap" class="ft19">SI:@if($seguros->presenta_defecto_fisico=='Si') X @endif&#160;{{$seguros->especifique_defecto_fisico}} </p>
<p style="position:absolute;top:405px;left:393px;white-space:nowrap" class="ft19">Kg.-&#160;</p>
<p style="position:absolute;top:372px;left:443px;white-space:nowrap" class="ft127">&#160;<br/>&#160;<br/>&#160;</p>
<p style="position:absolute;top:404px;left:462px;white-space:nowrap" class="ft19">Ud.&#160;es:&#160;&#160;@if($seguros->usted_es=='Zurdo')X @endif&#160;&#160;Zurdo&#160;&#160;&#160;&#160;&#160;&#160;@if($seguros->usted_es=='Diestro')X @endif&#160;</p>
<p style="position:absolute;top:404px;left:559px;white-space:nowrap" class="ft19">Diestro&#160;&#160;&#160;&#160;&#160;@if($seguros->usted_es=='Ambidiestro')X @endif&#160;&#160;Ambidiestro&#160;</p>
<p style="position:absolute;top:420px;left:326px;white-space:nowrap" class="ft16"><b>5.&#160;BENEFICIARIOS&#160;EN&#160;CASO&#160;DE&#160;FALLECIMIENTO&#160;DEL&#160;ASEGURADO&#160;TITULAR&#160;</b></p>
<p style="position:absolute;top:435px;left:288px;white-space:nowrap" class="ft16"><b>NOMBRE&#160;Y&#160;APELLIDO&#160;</b></p>
<p style="position:absolute;top:435px;left:548px;white-space:nowrap" class="ft16"><b>Parentesco&#160;</b></p>
<p style="position:absolute;top:435px;left:618px;white-space:nowrap" class="ft16"><b>Doc.&#160;de&#160;Identidad&#160;</b></p>
<p style="position:absolute;top:435px;left:710px;white-space:nowrap" class="ft16"><b>Fecha&#160;Nac.&#160;</b></p>
<p style="position:absolute;top:435px;left:769px;white-space:nowrap" class="ft16"><b>%&#160;de&#160;Distrib.&#160;</b></p>
<p style="position:absolute;top:443px;left:114px;white-space:nowrap" class="ft112">&#160; &#160; &#160; &#160; &#160;&#160; &#160; &#160; &#160;&#160; &#160; &#160;&#160;&#160; &#160; &#160; &#160;&#160; &#160; &#160;&#160;&#160; &#160; &#160; &#160;&#160;&#160;</p>
<p style="position:absolute;top:446px;left:297px;white-space:nowrap" class="ft116">{{$seguros->nombre_apellido_fallecimiento_titular}}<b>&#160;</b></p>
<p style="position:absolute;top:443px;left:371px;white-space:nowrap" class="ft118"><b>&#160;&#160;&#160;</b></p>
<p style="position:absolute;top:443px;left:438px;white-space:nowrap" class="ft118"><b>&#160; &#160; &#160; &#160; &#160;&#160; &#160; &#160; &#160;&#160; &#160; &#160;&#160;&#160; &#160;</b></p>
<p style="position:absolute;top:445px;left:542px;white-space:nowrap" class="ft119">{{$seguros->parentesco_titular_beneficiario}}</p>
<p style="position:absolute;top:443px;left:574px;white-space:nowrap" class="ft118"><b>&#160;</b></p>
<p style="position:absolute;top:443px;left:600px;white-space:nowrap" class="ft118"><b>&#160;</b></p>
<p style="position:absolute;top:445px;left:654px;white-space:nowrap" class="ft119">{{$seguros->ci_beneficiario}}<b>&#160;</b></p>
<p style="position:absolute;top:443px;left:679px;white-space:nowrap" class="ft118"><b>&#160;</b></p>
<p style="position:absolute;top:445px;left:708px;white-space:nowrap" class="ft119">{{$seguros->fechanac_beneficiario}}</p>
<p style="position:absolute;top:443px;left:737px;white-space:nowrap" class="ft118"><b>&#160;</b></p>
<p style="position:absolute;top:443px;left:762px;white-space:nowrap" class="ft118"><b>&#160; &#160;</b></p>
<p style="position:absolute;top:445px;left:775px;white-space:nowrap" class="ft119">{{$seguros->porcentaje_cesion}}</p>
<p style="position:absolute;top:443px;left:783px;white-space:nowrap" class="ft118"><b>&#160;</b></p>
<p style="position:absolute;top:459px;left:114px;white-space:nowrap" class="ft128"><b>&#160;<br/>&#160;</b></p>
<p style="position:absolute;top:493px;left:114px;white-space:nowrap" class="ft120"><b>&#160;</b></p>
<p style="position:absolute;top:506px;left:114px;white-space:nowrap" class="ft14"><b>&#160;</b></p>
<p style="position:absolute;top:517px;left:114px;white-space:nowrap" class="ft117"><b>&#160;</b></p>
<p style="position:absolute;top:529px;left:143px;white-space:nowrap" class="ft19">Muerte&#160;Accidental&#160;</p>
<p style="position:absolute;top:514px;left:232px;white-space:nowrap" class="ft14"><b>Coberturas&#160;</b></p>
<p style="position:absolute;top:514px;left:397px;white-space:nowrap" class="ft14"><b>Suma&#160;Asegurada&#160;</b></p>
<p style="position:absolute;top:507px;left:578px;white-space:nowrap" class="ft16"><b>&#160;</b></p>
<p style="position:absolute;top:516px;left:607px;white-space:nowrap" class="ft19">Prima&#160;de&#160;Tarifa&#160;</p>
<p style="position:absolute;top:529px;left:607px;white-space:nowrap" class="ft19">Recargo&#160;Administrativo&#160;</p>
<p style="position:absolute;top:543px;left:143px;white-space:nowrap" class="ft19">Invalidez&#160;Total&#160;o&#160;Parcial&#160;Permanente&#160;x&#160;Accidente,&#160;según&#160;baremo.&#160;</p>
<p style="position:absolute;top:556px;left:143px;white-space:nowrap" class="ft19">Gastos&#160;Médicos&#160;por&#160;Accidente.&#160;</p>
<p style="position:absolute;top:569px;left:143px;white-space:nowrap" class="ft19">Reembolso&#160;por&#160;Gastos&#160;de&#160;Sepelio.&#160;</p>
<p style="position:absolute;top:582px;left:143px;white-space:nowrap" class="ft19">Accidentes&#160;x&#160;Uso&#160;de&#160;Motocicletas.&#160;</p>
<p style="position:absolute;top:597px;left:143px;white-space:nowrap" class="ft19">Renta&#160;Diaria&#160;(Adelanto&#160;de&#160;la&#160;Suma&#160;asegurada&#160;de&#160;Muerte).&#160;</p>
<p style="position:absolute;top:610px;left:143px;white-space:nowrap" class="ft19">Protección&#160;Familiar&#160;(Adelanto&#160;de&#160;la&#160;Suma&#160;asegurada&#160;de&#160;Muerte)&#160;</p>
<p style="position:absolute;top:623px;left:143px;white-space:nowrap" class="ft19">Asistencia&#160;al&#160;Viajero&#160;</p>
<p style="position:absolute;top:636px;left:200px;white-space:nowrap" class="ft16"><b>TOTAL&#160;DE&#160;SUMA&#160;ASEGURADA&#160;</b></p>
<p style="position:absolute;top:645px;left:114px;white-space:nowrap" class="ft14"><b>&#160;</b></p>
<p style="position:absolute;top:655px;left:114px;white-space:nowrap" class="ft16"><b>&#160;</b></p>
<p style="position:absolute;top:665px;left:147px;white-space:nowrap" class="ft14"><b>X&#160;&#160;</b></p>
<p style="position:absolute;top:667px;left:160px;white-space:nowrap" class="ft19">CONTADO&#160;</p>
<p style="position:absolute;top:667px;left:232px;white-space:nowrap" class="ft19">Importe&#160;de&#160;la&#160;Inicial:&#160;</p>
<p style="position:absolute;top:680px;left:161px;white-space:nowrap" class="ft19">FINANCIADO&#160;</p>
<p style="position:absolute;top:680px;left:232px;white-space:nowrap" class="ft19">&#160;&#160;+&#160;</p>
<p style="position:absolute;top:680px;left:286px;white-space:nowrap" class="ft19">Cuotas&#160;de:&#160;</p>
<p style="position:absolute;top:695px;left:126px;white-space:nowrap" class="ft16"><b>1.&#160;Declaraciones&#160;del&#160;Tomador&#160;y/o&#160;de&#160;su&#160;Representante&#160;Legal&#160;</b></p>
<p style="position:absolute;top:543px;left:398px;white-space:nowrap" class="ft129"><b>&#160;<br/>&#160;</b></p>
<p style="position:absolute;top:568px;left:398px;white-space:nowrap" class="ft121"><b>&#160;</b></p>
<p style="position:absolute;top:581px;left:411px;white-space:nowrap" class="ft14"><b>SI&#160;</b></p>
<p style="position:absolute;top:581px;left:451px;white-space:nowrap" class="ft14"><b>X&#160;&#160;NO&#160;</b></p>
<p style="position:absolute;top:592px;left:398px;white-space:nowrap" class="ft117"><b>&#160;</b></p>
<p style="position:absolute;top:605px;left:398px;white-space:nowrap" class="ft118"><b>&#160;</b></p>
<p style="position:absolute;top:621px;left:411px;white-space:nowrap" class="ft14"><b>SI&#160;</b></p>
<p style="position:absolute;top:621px;left:451px;white-space:nowrap" class="ft14"><b>X&#160;&#160;NO&#160;</b></p>
<p style="position:absolute;top:633px;left:398px;white-space:nowrap" class="ft117"><b>&#160;</b></p>
<p style="position:absolute;top:651px;left:420px;white-space:nowrap" class="ft16"><b>8.&#160;PLAN&#160;y&#160;FORMA&#160;DE&#160;PAGO&#160;</b></p>
<p style="position:absolute;top:667px;left:482px;white-space:nowrap" class="ft19">Cupón&#160;de&#160;pago&#160;</p>
<p style="position:absolute;top:680px;left:482px;white-space:nowrap" class="ft19">Débito&#160;</p>
<p style="position:absolute;top:543px;left:607px;white-space:nowrap" class="ft19">Prima&#160;</p>
<p style="position:absolute;top:556px;left:607px;white-space:nowrap" class="ft19">I.V.A.&#160;sobre&#160;Prima.&#160;</p>
<p style="position:absolute;top:568px;left:607px;white-space:nowrap" class="ft19">Premio&#160;</p>
<p style="position:absolute;top:583px;left:594px;white-space:nowrap" class="ft119">&#160;</p>
<p style="position:absolute;top:596px;left:607px;white-space:nowrap" class="ft19">Interés&#160;por&#160;Financiamiento&#160;</p>
<p style="position:absolute;top:609px;left:607px;white-space:nowrap" class="ft19">I.V.A.&#160;sobre&#160;Interés&#160;</p>
<p style="position:absolute;top:623px;left:607px;white-space:nowrap" class="ft19">Costo&#160;del&#160;Financiamiento&#160;</p>
<p style="position:absolute;top:636px;left:610px;white-space:nowrap" class="ft10"><b>Costo&#160;Total&#160;del&#160;Seguro&#160;</b></p>
<p style="position:absolute;top:645px;left:594px;white-space:nowrap" class="ft130"><b>&#160;<br/>&#160;</b></p>
<p style="position:absolute;top:667px;left:594px;white-space:nowrap" class="ft120"><b>&#160;</b></p>
<p style="position:absolute;top:680px;left:642px;white-space:nowrap" class="ft19">En&#160;cuenta&#160;</p>
<p style="position:absolute;top:543px;left:719px;white-space:nowrap" class="ft126">&#160;<br/>&#160;<br/>&#160;<br/>&#160;<br/>&#160;<br/>&#160;<br/>&#160;<br/>&#160;<br/>&#160;<br/>&#160;<br/>&#160;<br/>&#160;</p>
<p style="position:absolute;top:668px;left:719px;white-space:nowrap" class="ft113">&#160;</p>
<p style="position:absolute;top:680px;left:731px;white-space:nowrap" class="ft19">Tarj.&#160;de&#160;Crédito&#160;</p>
<p style="position:absolute;top:704px;left:127px;white-space:nowrap" class="ft132">1.1&#160;Declaro&#160;&#160;que&#160;&#160;toda&#160;&#160;la&#160;&#160;información&#160;contenida&#160;&#160;en&#160;&#160;esta&#160;&#160;Solicitud&#160;de&#160;&#160;Seguro&#160;&#160;es&#160;&#160;cierta,&#160;&#160;actualizada&#160;&#160;y&#160;completa,&#160;por&#160;&#160;ende,&#160;&#160;asumo&#160;la&#160;responsabilidad&#160;&#160;sobre&#160;&#160;la&#160;veracidad&#160;de&#160;&#160;la&#160;misma.&#160;<br/>1.2&#160;Declaro&#160;y&#160;reconozco&#160;que&#160;la&#160;referida&#160;información&#160;será&#160;la&#160;base&#160;del&#160;Contrato&#160;con&#160;MAPFRE&#160;PARAGUAY&#160;Cía.&#160;de&#160;Seguros&#160;S.A.,&#160;en&#160;caso&#160;q&#160;ue&#160;MAPFRE&#160;PARAGUAY&#160;Cía.&#160;de&#160;Seguros&#160;S.A.&#160;aceptare&#160;&#160;<br/>esta&#160;solicitud&#160;y&#160;por&#160;ende,&#160;emita&#160;la&#160;respectiva&#160;Póliza&#160;de&#160;Seguro,&#160;comprometiéndome&#160;al&#160;cumplimiento&#160;de&#160;sus&#160;cláusulas&#160;y&#160;condiciones&#160;y&#160;a&#160;pagar&#160;el&#160;premio&#160;establecido.&#160;<br/>1.3&#160;&#160;Declaro&#160;&#160;que&#160;&#160;el&#160;&#160;dinero&#160;&#160;que&#160;&#160;será&#160;&#160;utilizado&#160;&#160;para&#160;&#160;el&#160;&#160;pago&#160;&#160;de&#160;&#160;la&#160;&#160;prima&#160;&#160;provendrá&#160;&#160;de&#160;&#160;fuente&#160;&#160;lícita&#160;&#160;y&#160;&#160;por&#160;&#160;lo&#160;&#160;tanto&#160;&#160;no&#160;&#160;tiene&#160;&#160;relación&#160;&#160;alguna&#160;&#160;con&#160;&#160;el&#160;&#160;dinero,&#160;&#160;capitales,&#160;&#160;bienes,&#160;&#160;haberes,&#160;&#160;valores&#160;&#160;o&#160;&#160;títulos,&#160;&#160;<br/>producto&#160;de&#160;las&#160;actividades&#160;ilícitas&#160;a&#160;que&#160;se&#160;refiere&#160;la&#160;Ley&#160;Nro.&#160;1015/97&#160;que&#160;</p>
<p style="position:absolute;top:739px;left:390px;white-space:nowrap" class="ft19">“Previene&#160;y&#160;reprime&#160;los&#160;actos&#160;ilícitos&#160;destinados&#160;a&#160;la&#160;legitimación&#160;de&#160;dinero&#160;o&#160;bienes”.&#160;</p>
<p style="position:absolute;top:749px;left:127px;white-space:nowrap" class="ft131">1.4&#160;Declaro&#160;tomar&#160;conocimiento&#160;de&#160;los&#160;requisitos&#160;de&#160;informaciones&#160;que&#160;me&#160;serán&#160;solicitadas&#160;al&#160;momento&#160;del&#160;pago&#160;que&#160;deba&#160;realizars&#160;e&#160;en&#160;virtud&#160;de&#160;la&#160;Póliza&#160;y/o&#160;de&#160;cualquier&#160;cesión&#160;de&#160;derechos&#160;o&#160;<br/>cambio&#160;&#160;de&#160;&#160;beneficiarios&#160;&#160;y/o&#160;&#160;anulación,&#160;&#160;si&#160;&#160;los&#160;&#160;hubiere,&#160;&#160;(de&#160;</p>
<p style="position:absolute;top:757px;left:338px;white-space:nowrap" class="ft19">conformidad&#160;&#160;con&#160;&#160;lo&#160;&#160;establecido&#160;&#160;en&#160;&#160;la&#160;&#160;Resolución&#160;&#160;071/2019&#160;&#160;de&#160;&#160;la&#160;&#160;SEPRELAD&#160;&#160;“Reglamento&#160;&#160;de&#160;&#160;prevención&#160;&#160;de&#160;&#160;lavado&#160;&#160;de&#160;&#160;activos&#160;&#160;y&#160;&#160;el&#160;&#160;</p>
<p style="position:absolute;top:767px;left:127px;white-space:nowrap" class="ft19">financiamiento&#160;del&#160;terrorismo,&#160;basado&#160;en&#160;un&#160;sistema&#160;de&#160;gestión&#160;de&#160;riesgos&#160;para&#160;sujetos&#160;obligados&#160;supervisados&#160;por&#160;la&#160;Superint&#160;endenci</p>
<p style="position:absolute;top:766px;left:603px;white-space:nowrap" class="ft19">a&#160;de&#160;Seguros&#160;del&#160;Banco&#160;Central&#160;del&#160;Paraguay”&#160;y/o&#160;cualquier&#160;</p>
<p style="position:absolute;top:776px;left:127px;white-space:nowrap" class="ft19">disposición&#160;vigente&#160;al&#160;respecto,&#160;la&#160;cual&#160;se&#160;encuentra&#160;disponible&#160;en</p>
<p style="position:absolute;top:776px;left:356px;white-space:nowrap" class="ft122">&#160;www.seprelad.gov.py</p>
<p style="position:absolute;top:776px;left:434px;white-space:nowrap" class="ft19">).&#160;</p>
<p style="position:absolute;top:785px;left:126px;white-space:nowrap" class="ft131"><b>2.&#160;Autorizaciones&#160;del&#160;Tomador&#160;y/o&#160;de&#160;su&#160;Representante&#160;Legal&#160;<br/></b>2.1&#160;Autorizo&#160;&#160;a&#160;&#160;MAPFRE&#160;&#160;PARAGUAY&#160;&#160;Cía.&#160;&#160;de&#160;&#160;Seguros&#160;&#160;S.A.,&#160;&#160;a&#160;&#160;enviar&#160;&#160;por&#160;medios&#160;&#160;electrónicos&#160;&#160;SI&#160;(&#160;&#160;)&#160;&#160;NO&#160;(&#160;&#160;)&#160;&#160;al&#160;&#160;e-mail&#160;&#160;declarado&#160;&#160;en&#160;la&#160;&#160;presente&#160;&#160;Solicitud,&#160;la&#160;&#160;póliza&#160;&#160;de&#160;&#160;seguro&#160;&#160;propiamente&#160;&#160;dicha;&#160;las&#160;<br/>modificaciones&#160;y/o&#160;suplementos&#160;y/o&#160;anexos&#160;y/o&#160;cualquier&#160;otro&#160;documento&#160;relativo&#160;a&#160;la&#160;póliza&#160;de&#160;seguro;&#160;ya&#160;sea&#160;que&#160;estas&#160;estuvieren&#160;firmadas&#160;&#160;con&#160;el&#160;uso&#160;de&#160;la&#160;firma&#160;facsimilar&#160;(de&#160;conformidad&#160;con&#160;lo&#160;<br/>establecido&#160;en&#160;la&#160;Resolución&#160;N°&#160;014/08&#160;de&#160;la&#160;SIS,&#160;cuya&#160;copia&#160;se&#160;encuentra&#160;&#160;disponible&#160;en&#160;el&#160;sitio&#160;web&#160;de&#160;la&#160;Compañía:</p>
<p style="position:absolute;top:812px;left:542px;white-space:nowrap" class="ft122">&#160;www.mapfre.com.py</p>
<p style="position:absolute;top:812px;left:616px;white-space:nowrap" class="ft19">)&#160;y/o&#160;con&#160;el&#160;uso&#160;de&#160;la&#160;firma&#160;digital&#160;(de&#160;conformidad&#160;con&#160;lo&#160;</p>
<p style="position:absolute;top:819px;left:127px;white-space:nowrap" class="ft134">establecido&#160;en&#160;la&#160;Ley&#160;N°&#160;4017/2010&#160;“De&#160;validez&#160;jurídica&#160;de&#160;la&#160;firma&#160;electrónica,&#160;la&#160;firma&#160;digital,&#160;los&#160;mensajes&#160;de&#160;datos&#160;y&#160;el&#160;&#160;expediente&#160;electrónico”,&#160;cuya&#160;copia&#160;se&#160;encuentra&#160;disponible&#160;en&#160;el&#160;sitio&#160;web&#160;<br/>de&#160;la&#160;Compañía:</p>
<p style="position:absolute;top:830px;left:184px;white-space:nowrap" class="ft122">&#160;www.mapfre.com.py</p>
<p style="position:absolute;top:830px;left:258px;white-space:nowrap" class="ft19">).&#160;</p>
<p style="position:absolute;top:839px;left:127px;white-space:nowrap" class="ft131">2.2.&#160;&#160;En&#160;&#160;caso&#160;&#160;de&#160;&#160;que&#160;&#160;el&#160;&#160;Tomador&#160;indique&#160;&#160;NO&#160;&#160;en&#160;la&#160;&#160;opción&#160;&#160;de&#160;&#160;envío&#160;&#160;de&#160;la&#160;&#160;póliza&#160;&#160;por&#160;medios&#160;&#160;electrónicos,&#160;&#160;se&#160;&#160;enviará&#160;la&#160;&#160;póliza&#160;&#160;de&#160;&#160;segu&#160;ro&#160;&#160;propiamente&#160;&#160;dicha;&#160;las&#160;&#160;modificaciones&#160;&#160;y/o&#160;&#160;suplementos&#160;&#160;y/o&#160;<br/>anexos&#160;y/o&#160;cualquier&#160;otro&#160;documento&#160;relativo&#160;a&#160;la&#160;póliza&#160;de&#160;seguro&#160;de&#160;forma&#160;impresa&#160;al&#160;domicilio&#160;declarado&#160;en&#160;la&#160;presente&#160;sol&#160;icitud&#160;firmadas&#160;con&#160;el&#160;uso&#160;de&#160;la&#160;firma&#160;facsimilar&#160;(de&#160;conformidad&#160;con&#160;lo&#160;<br/>establecido&#160;en&#160;la&#160;Resolución&#160;N°&#160;014/08&#160;de&#160;la&#160;SIS,&#160;cuya&#160;copia&#160;se&#160;encuentra&#160;disponible&#160;en&#160;el&#160;sitio&#160;web&#160;&#160;de&#160;la&#160;Compañía:</p>
<p style="position:absolute;top:857px;left:536px;white-space:nowrap" class="ft122">&#160;www.mapfre.com.py</p>
<p style="position:absolute;top:857px;left:610px;white-space:nowrap" class="ft19">).&#160;</p>
<p style="position:absolute;top:866px;left:126px;white-space:nowrap" class="ft131">2.3.&#160;Autorizo&#160;comunicaciones&#160;telefónicas&#160;o&#160;por&#160;cualquier&#160;medio&#160;relativas&#160;a&#160;la&#160;póliza&#160;de&#160;seguro&#160;(tales&#160;como&#160;las&#160;referentes&#160;al&#160;vencimiento&#160;o&#160;cualquier&#160;otra&#160;información&#160;relativa&#160;a&#160;la&#160;misma).&#160;<br/>2.4.&#160;&#160;Autorizo&#160;&#160;a&#160;&#160;MAPFRE&#160;&#160;PARAGUAY&#160;&#160;Cía.&#160;&#160;de&#160;&#160;Seguros&#160;&#160;S.A.&#160;&#160;a&#160;&#160;efectuar&#160;&#160;el&#160;&#160;tratamiento&#160;&#160;de&#160;&#160;mis&#160;&#160;datos&#160;&#160;personales&#160;&#160;consignados&#160;&#160;en&#160;&#160;este&#160;&#160;documen&#160;to&#160;&#160;(incluyendo,&#160;&#160;pero&#160;&#160;sin&#160;&#160;limitar&#160;&#160;la&#160;&#160;recolección,&#160;&#160;el&#160;&#160;<br/>almacenamiento&#160;y&#160;la&#160;transferencia),&#160;tanto&#160;para&#160;su&#160;utilización&#160;en&#160;su&#160;sede&#160;en&#160;Paraguay,&#160;otras&#160;entidades&#160;aseguradoras,&#160;reaseguradoras,&#160;o&#160;de&#160;prestación&#160;de&#160;servicios&#160;pert&#160;enecientes&#160;al&#160;Grupo&#160;MAPFRE&#160;<br/>(</p>
<p style="position:absolute;top:893px;left:129px;white-space:nowrap" class="ft122">www.mapfre.com</p>
<p style="position:absolute;top:893px;left:190px;white-space:nowrap" class="ft19">),&#160;&#160;filiales&#160;&#160;y&#160;&#160;participadas,&#160;&#160;administraciones&#160;&#160;públicas&#160;&#160;y&#160;&#160;a&#160;&#160;otras&#160;&#160;personas&#160;&#160;físicas&#160;&#160;o&#160;&#160;jurídi&#160;cas&#160;&#160;que,&#160;&#160;asimismo,&#160;&#160;desarrollen&#160;&#160;cualesquiera&#160;&#160;de&#160;&#160;las&#160;&#160;referidas&#160;&#160;actividades&#160;&#160;y&#160;&#160;con&#160;&#160;las&#160;&#160;que&#160;&#160;las&#160;&#160;</p>
<p style="position:absolute;top:901px;left:127px;white-space:nowrap" class="ft131">distintas&#160;&#160;entidades&#160;&#160;del&#160;&#160;Grupo&#160;&#160;MAPFRE&#160;&#160;concluyan&#160;&#160;acuerdos&#160;&#160;de&#160;&#160;colaboración,&#160;&#160;incluso&#160;&#160;cuando&#160;&#160;la&#160;&#160;cesión&#160;&#160;suponga&#160;&#160;una&#160;&#160;transferencia&#160;&#160;i&#160;nternacional&#160;&#160;de&#160;&#160;datos,&#160;&#160;todo&#160;&#160;ello&#160;&#160;tanto&#160;&#160;si&#160;&#160;se&#160;&#160;formalizase&#160;&#160;o&#160;&#160;no&#160;<br/>operación&#160;&#160;alguna,&#160;&#160;como&#160;&#160;en&#160;&#160;su&#160;&#160;caso,&#160;&#160;una&#160;&#160;vez&#160;&#160;extinguida&#160;&#160;la&#160;&#160;relación&#160;&#160;contractual&#160;&#160;existente.&#160;&#160;Con&#160;&#160;la&#160;&#160;finalidad&#160;&#160;de&#160;&#160;mantener&#160;&#160;una&#160;&#160;bas&#160;e&#160;&#160;de&#160;&#160;datos&#160;&#160;de&#160;&#160;respaldo&#160;&#160;con&#160;&#160;fines&#160;&#160;de&#160;&#160;seguridad&#160;&#160;informática;&#160;&#160;llevar&#160;<br/>controles&#160;estadísticos&#160;y&#160;realizar&#160;análisis&#160;de&#160;escenarios&#160;de&#160;negocios&#160;exclusivamente&#160;para&#160;uso&#160;interno,&#160;que&#160;contribuyan&#160;a&#160;la&#160;optimización&#160;del&#160;servicio&#160;contratado.&#160;Todos&#160;l&#160;os&#160;datos&#160;que&#160;se&#160;proporcionen&#160;<br/>recíprocamente&#160;&#160;entre&#160;&#160;el&#160;&#160;tomador&#160;&#160;del&#160;&#160;seguro/asegurado/beneficiario&#160;&#160;y&#160;&#160;la&#160;&#160;aseguradora,&#160;&#160;en&#160;&#160;virtud&#160;&#160;del&#160;&#160;pres&#160;ente&#160;&#160;contrato,&#160;&#160;con&#160;&#160;independencia&#160;&#160;del&#160;&#160;soporte&#160;&#160;en&#160;&#160;que&#160;&#160;se&#160;&#160;encuentren&#160;&#160;o&#160;&#160;entreguen,&#160;&#160;tienen&#160;&#160;<br/>carácter&#160;absolutamente&#160;reservado&#160;y&#160;confidencial.&#160;El&#160;tomador/asegurado/beneficiario&#160;se&#160;compromete&#160;a&#160;mantener&#160;en&#160;todo&#160;momento&#160;l&#160;os&#160;datos&#160;facilitados&#160;debidamente&#160;actualizados&#160;y&#160;a&#160;comunicar&#160;a&#160;la&#160;<br/>Entidad&#160;cualquier&#160;cambio&#160;o&#160;modificación&#160;que&#160;se&#160;produzca&#160;en&#160;los&#160;mismos.&#160;<br/>2.5.&#160;Por&#160;el&#160;presente&#160;instrumento&#160;autorizo(amos)&#160;en&#160;forma&#160;expresa&#160;e&#160;irrevocable,&#160;otorgando&#160;suficiente&#160;mandato&#160;de&#160;conformidad&#160;a&#160;los&#160;&#160;términos&#160;del&#160;Art.&#160;917&#160;inc.&#160;a)&#160;del&#160;Código&#160;Civil,&#160;para&#160;que&#160;por&#160;propia&#160;<br/>cuenta&#160;o&#160;a&#160;través&#160;de&#160;la&#160;Superintendencia&#160;de&#160;Seguros,&#160;puedan&#160;recabar&#160;y/o&#160;proveer&#160;información&#160;en&#160;plaza&#160;referente&#160;a&#160;mí&#160;(nuestro)&#160;&#160;cumplimiento&#160;de&#160;pago&#160;de&#160;primas&#160;de&#160;seguros,&#160;cantidad&#160;y&#160;monto&#160;de&#160;<br/>reclamos&#160;realizados,&#160;ya&#160;sea&#160;por&#160;escrito&#160;o&#160;por&#160;procedimientos&#160;informáticos.&#160;<br/>Cuando&#160;el&#160;Texto&#160;de&#160;la&#160;Póliza&#160;difiera&#160;del&#160;contenido&#160;de&#160;la&#160;propuesta,&#160;la&#160;diferencia&#160;se&#160;considerará&#160;aprobada&#160;por&#160;el&#160;Tomador&#160;si&#160;n&#160;o&#160;reclama&#160;dentro&#160;de&#160;un&#160;mes&#160;de&#160;haber&#160;recibido&#160;la&#160;Póliza&#160;(Art.&#160;1556&#160;C.&#160;<br/>Civil).&#160;<br/>En&#160;&#160;caso&#160;&#160;de&#160;&#160;necesidad,&#160;&#160;para&#160;&#160;el&#160;&#160;análisis&#160;&#160;del&#160;&#160;o&#160;&#160;de&#160;&#160;los&#160;&#160;riesgos,&#160;&#160;autorizo&#160;&#160;a&#160;&#160;MAPFRE&#160;&#160;PARAGUAY&#160;&#160;COMPAÑIA&#160;&#160;DE&#160;&#160;SEGUROS&#160;&#160;S.A.,&#160;&#160;la&#160;&#160;verificación&#160;&#160;del&#160;&#160;expedient&#160;e&#160;&#160;clínico&#160;&#160;de&#160;&#160;internación&#160;&#160;y&#160;&#160;consultorio&#160;<br/>obrante&#160;en&#160;el&#160;Sanatorio&#160;o&#160;Centro&#160;Médico&#160;Asistencial&#160;</p>
<p style="position:absolute;top:1009px;left:480px;white-space:nowrap" class="ft19">y&#160;obtener&#160;copia&#160;de&#160;dicho&#160;historial.&#160;</p>
<p style="position:absolute;top:1018px;left:127px;white-space:nowrap" class="ft132"><b>PRÓRROGA&#160;TÁCITA:&#160;</b>Autorizo&#160;a&#160;MAPFRE&#160;PARAGUAY&#160;Cía.&#160;de&#160;Seguros&#160;S.A.,&#160;a&#160;realizar&#160;la&#160;prórroga&#160;del&#160;presente&#160;contrato&#160;de&#160;seguro&#160;por&#160;el&#160;término&#160;máximo&#160;&#160;de&#160;un&#160;período&#160;conforme&#160;al&#160;Artículo&#160;1563&#160;<br/>del&#160;Código&#160;Civil&#160;Paraguayo.&#160;Si&#160;(&#160;)&#160;No&#160;(&#160;).&#160;La&#160;prórroga&#160;tácita&#160;se&#160;suscribirá&#160;bajo&#160;las&#160;mismas&#160;condiciones&#160;que&#160;fueron&#160;convenidas&#160;en&#160;la&#160;vigencia&#160;inmediata&#160;anterior.&#160;Se&#160;deja&#160;constancia&#160;que&#160;será&#160;facultad&#160;&#160;<br/>de&#160;la&#160;Compañía&#160;Aseguradora&#160;aceptar&#160;o&#160;ejecutar&#160;la&#160;Prórroga&#160;Tácita&#160;en&#160;el&#160;momento&#160;que&#160;se&#160;deba&#160;proceder&#160;a&#160;la&#160;misma.&#160;</p>
<p style="position:absolute;top:1046px;left:114px;white-space:nowrap" class="ft135">&#160;<br/>&#160;<br/>&#160;<br/>&#160;</p>
<p style="position:absolute;top:1117px;left:114px;white-space:nowrap" class="ft123">&#160;</p>
<p style="position:absolute;top:1137px;left:356px;white-space:nowrap" class="ft110">&#160;</p>
<p style="position:absolute;top:1137px;left:552px;white-space:nowrap" class="ft110">&#160;</p>
<p style="position:absolute;top:1141px;left:173px;white-space:nowrap" class="ft19">Firma&#160;y&#160;Sello&#160;del&#160;Agente&#160;-&#160;Gestor&#160;Comercial&#160;</p>
<p style="position:absolute;top:1142px;left:420px;white-space:nowrap" class="ft19">F&#160;e&#160;c&#160;h&#160;a&#160;</p>
<p style="position:absolute;top:1141px;left:627px;white-space:nowrap" class="ft19">Conformidad&#160;del&#160;Tomador&#160;/&#160;Asegurado&#160;</p>
<p style="position:absolute;top:1140px;left:765px;white-space:nowrap" class="ft11">&#160;</p>
<p style="position:absolute;top:1158px;left:771px;white-space:nowrap" class="ft16"><b>Pág.&#160;1&#160;de&#160;1.&#160;</b></p>
<p style="position:absolute;top:122px;left:238px;white-space:nowrap" class="ft10"><b>X&#160;</b></p>
<p style="position:absolute;top:124px;left:250px;white-space:nowrap" class="ft19">Seguro&#160;Colectivo&#160;</p>
<p style="position:absolute;top:123px;left:345px;white-space:nowrap" class="ft10"><b>x&#160;</b></p>
<p style="position:absolute;top:626px;left:135px;white-space:nowrap" class="ft124"><b>6.</b></p>
<p style="position:absolute;top:619px;left:135px;white-space:nowrap" class="ft124"><b>&#160;C</b></p>
<p style="position:absolute;top:612px;left:135px;white-space:nowrap" class="ft124"><b>obe</b></p>
<p style="position:absolute;top:598px;left:135px;white-space:nowrap" class="ft124"><b>rt</b></p>
<p style="position:absolute;top:592px;left:135px;white-space:nowrap" class="ft124"><b>ura</b></p>
<p style="position:absolute;top:580px;left:135px;white-space:nowrap" class="ft124"><b>s</b></p>
<p style="position:absolute;top:576px;left:135px;white-space:nowrap" class="ft124"><b>&#160;y</b></p>
<p style="position:absolute;top:570px;left:135px;white-space:nowrap" class="ft124"><b>&#160;S</b></p>
<p style="position:absolute;top:563px;left:135px;white-space:nowrap" class="ft124"><b>um</b></p>
<p style="position:absolute;top:551px;left:135px;white-space:nowrap" class="ft124"><b>a</b></p>
<p style="position:absolute;top:547px;left:135px;white-space:nowrap" class="ft124"><b>s</b></p>
<p style="position:absolute;top:542px;left:135px;white-space:nowrap" class="ft124"><b>&#160;A</b></p>
<p style="position:absolute;top:535px;left:135px;white-space:nowrap" class="ft124"><b>s</b></p>
<p style="position:absolute;top:531px;left:135px;white-space:nowrap" class="ft124"><b>e</b></p>
<p style="position:absolute;top:526px;left:135px;white-space:nowrap" class="ft124"><b>g.</b></p>
<p style="position:absolute;top:519px;left:135px;white-space:nowrap" class="ft124"><b>&#160;</b></p>
<p style="position:absolute;top:626px;left:599px;white-space:nowrap" class="ft125"><b>7.</b></p>
<p style="position:absolute;top:618px;left:599px;white-space:nowrap" class="ft125"><b>&#160;L</b></p>
<p style="position:absolute;top:610px;left:599px;white-space:nowrap" class="ft125"><b>iq</b></p>
<p style="position:absolute;top:603px;left:599px;white-space:nowrap" class="ft125"><b>u</b></p>
<p style="position:absolute;top:597px;left:599px;white-space:nowrap" class="ft125"><b>id</b></p>
<p style="position:absolute;top:590px;left:599px;white-space:nowrap" class="ft125"><b>a</b></p>
<p style="position:absolute;top:585px;left:599px;white-space:nowrap" class="ft125"><b>c</b></p>
<p style="position:absolute;top:580px;left:599px;white-space:nowrap" class="ft125"><b>ió</b></p>
<p style="position:absolute;top:572px;left:599px;white-space:nowrap" class="ft125"><b>n</b></p>
<p style="position:absolute;top:567px;left:599px;white-space:nowrap" class="ft125"><b>&#160;d</b></p>
<p style="position:absolute;top:559px;left:599px;white-space:nowrap" class="ft125"><b>e</b></p>
<p style="position:absolute;top:554px;left:599px;white-space:nowrap" class="ft125"><b>l&#160;</b></p>
<p style="position:absolute;top:549px;left:599px;white-space:nowrap" class="ft125"><b>Pr</b></p>
<p style="position:absolute;top:540px;left:599px;white-space:nowrap" class="ft125"><b>e</b></p>
<p style="position:absolute;top:535px;left:599px;white-space:nowrap" class="ft125"><b>m</b></p>
<p style="position:absolute;top:527px;left:599px;white-space:nowrap" class="ft125"><b>io</b></p>
<p style="position:absolute;top:520px;left:599px;white-space:nowrap" class="ft125"><b>&#160;</b></p>
</div>
</body>
</html>
</div>
@endforeach
@else
<br>
<style type="text/css">
  .alert-light {
    /* color: #1f2d3d; */
    background-color: rgba(255,255,255,.8);
    border-color: #e9ecef;
}
</style>
<div class="container"> 
   <div class="alert alert-light" role="alert">
  <b><h4><center>Aun no se ha registrado datos de seguro!</center></h4></b>   
</div>                               
@endif
@endsection

