  <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <meta name="viewport" content="width=device-width, initial-scale=1">  

      <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.css"
            integrity="sha512-EzrsULyNzUc4xnMaqTrB4EpGvudqpetxG/WNjCpG6ZyyAGxeB6OBF9o246+mwx3l/9Cn838iLIcrxpPHTiygAA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!-- AdminLTE -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css"
            integrity="sha512-mxrUXSjrxl8vm5GwafxcqTrEwO1/oBNU25l20GODsysHReZo4uhVISzAKzaABH6/tTfAxZrY2FprmeAP5UZY8A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <!-- iCheck -->

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
            integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
            crossorigin="anonymous"/>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
            integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
            crossorigin="anonymous"/>

      <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
            integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
            crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <style type="text/css">
      body{
      background:url("/fondo_pagina.jpeg");
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover; 
  }
  .bg-light {
      background-color: #fff !important;
  }
  </style>
   <title>Eventos</title>
      <link rel="icon" type="image/png" src="/logof.png" />
   <!-- Just an image -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <img src="/logo_redondo.png" width="50" height="50" alt="">
    <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="https://fpc.org.py"><i class="fas fa-home"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('ranking_m_tbs/consulta') }}"><i class="fas fa-trophy"></i> Ranking MTB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('ver_evento') }}"><i class="fa fa-calendar" aria-hidden="true"></i> Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('http://sistema.fpc.org.py') }}"><i class="fas fa-users"></i> Área de usuarios</a>
            </li>
        </ul>
    </div>
</nav>

<br>
<br>

<style type="text/css">
    .dataTables_filter, .dataTables_info { display: none; }
</style>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            @foreach($eventos as $evento)

                <div class="card mb-3">
                    <div class="card-header">
                                     <h5 class="card-title">{{ $evento->nombre }}</h5>
                                </div>
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <td><img src="{{ asset('storage/uploads/' . $evento->imagen) }}" width="370" height="350" ></td>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <p class="card-text">
                                    <strong>Lugar:</strong> {{ $evento->lugar }}<br>
                                    <strong>Modalidad:</strong> {{ $evento->modalidad }}<br>
                                    <strong>Distancia:</strong> {{ $evento->distancia }}<br>
                                    <strong>Organización:</strong> {{ $evento->organizacion }}<br>
                                    <strong>Cupos:</strong> {{ $evento->cupos }}<br>
                                    <strong>Estado:</strong> {{ $evento->estado }}
                                </p>
                                 @if($evento->estado=='Disponible')
                                <button class="btn btn-primary" onclick="window.location.href='{{ url('ver_eventos_detalles', [$evento->id]) }}'">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i> Inscribirse
                                </button>
                                @else
                                <button class="btn btn-danger">
                                   <i class="fa fa-ban" aria-hidden="true"></i> Sin cupos disponibles
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $eventos->links() }} <!-- Muestra los enlaces de paginación -->
        </div>
    </div>
</div>


