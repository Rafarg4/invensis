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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<script src="
https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js
"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css
">

<script type="text/javascript">
    $(document).ready(function () {
    $('#filtros').DataTable({
         "pageLength":3,
         "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var select = $('<select><option value="">Selecione</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
 
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
 
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                });
        },
    });
});
</script>
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
 <title>Ranking</title>
    <link rel="icon" type="image/png" src="/logof.png" />
 <!-- Just an image -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <img src="/logo_redondo.png" width="50" height="50" alt="">
    <div
      class="collapse navbar-collapse justify-content-center"
      id="navbarCenteredExample"
    >
    <ul class="nav navbar-nav">
       <a class="nav-link" href="https://fpc.org.py/"><i class="fas fa-home"></i> Inicio</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('ranking_m_tbs/consulta') }}"><i class="fas fa-trophy"></i> Ranking MTB</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
         <a class="nav-link" href="{{ url('http://sistemafpc.site/login/') }}"><i class="fas fa-users"></i> Area de usuarios</a>
      </li>
    </ul>
  </div>

</nav>

   <br>
   <br>

    <style type="text/css">
     .dataTables_filter, .dataTables_info { display: none; }
 </style>
 <script type="text/javascript">
    $(document).ready(function () {
    $('#tablas').DataTable({
        "pageLength":3,
         "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var select = $('<select><option value="">Selecione</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
 
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
 
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                });
        },
    });
});
</script>
<center>
<div class="col-sm-8">
<div class="card">
  <div class="card-body">
  <form method="GET"> 
    <div class="col-sm-6">
                    <h1><i class="fa fas-solid fa-road"></i> Ranking de Ruta</h1>
                </div>
 <div class="input-group">
    <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-search fa-fw"></i></span>
  </div>
  <input type="text" name="buscar" class="form-control" placeholder=" Busca al participante por su nombre " aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-primary" type="submit">Buscar</button>
  </div>
</div>
</form>
  </div>
</div>
</div>
</center>
<center>
<div class="col-sm-8">
<div class="card">
  <div class="card-body">
 <div class="table-responsive" style="padding:15px">
    <table class="table" id="filtros">
        <thead>
        <tr>
        <th style="font-size: 12px">#</th>
        <th style="font-size: 12px">Nombre y Apellido</th>
        <th style="font-size: 12px">Categoria</th>
        <th style="font-size: 12px">Total</th>
        <th style="font-size: 12px">Acciones </th>
        </thead>
        <tbody> 
            <?php $i = 0; ?>
        @foreach($rankings as $ranking)
            <tr>
            <td>{{ $ranking->posicion }}</th>
            <td>{{ $ranking->nombre_apellido }}</td>
            <td>{{ $ranking->categoria }}</td>
            <td>{{ $ranking->totales ?? 'A definir'}}</td>
            <td width="120">
                    <div class='btn-group'>
                        <a href="{{ url('ranking/ver_ranking', [$ranking->id]) }}"
                           class='btn btn-primary btn-xs'>
                            <i class="fas fa-id-card"></i>
                        </a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></td>
                <th></th> 
                <th></th>

            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>
</div>
</center>



