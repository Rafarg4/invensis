<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <div class="content px-3">
        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                 <h3 style="text-align:center">Formulario de inscripto</h3>
<div class="table-responsive">
    <table class="table" id="Table">
        <thead>
        <tr>
            <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Fechanac</th>
        <th>Ci</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $inscripcions->primer_nombre }}</td>
            <td>{{ $inscripcions->segundo_nombre }}</td>
            <td>{{ $inscripcions->fechanac }}</td>
            <td>{{ $inscripcions->ci }}</td>
            
            </tr>
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table" id="Table">
        <thead>
        <tr>
    
        <th>Sexo</th>
        <th>Grupo Sanguineo</th>
        <th>Nacionalidad</th>
         <th>Celular</th>
        </tr>
        </thead>
        <tbody>
            <tr>
               
            <td>{{ $inscripcions->sexo }}</td>
            <td>{{ $inscripcions->grupo_sanguineo }}</td>
            <td>{{ $inscripcions->nacionalidad }}</td>
            <td>{{ $inscripcions->celular }}</td>
            
            </tr>
        </tbody>
    </table>
</div>


<div class="table-responsive" style="padding:15px;">
    <table class="table" id="Table">
        <thead>
        <tr>
       
        <th>Domiciolio</th>
        <th>Departamento</th>
        <th>Ciudad</th>
        <th>Categoria</th>
        

        </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{ $inscripcions->domiciolio }}</td>
            <td>{{ $inscripcions->departamento }}</td>
            <td>{{ $inscripcions->ciudad }}</td>
            <td>{{ $inscripcions->categoria->nombre }}</td>
            
            
            </tr>
        </tbody>
    </table>
</div>
<div class="table-responsive" style="padding:15px;">
    <table class="table" id="Table">
        <thead>
        <tr>
        <th>Nombre de equipo</th>   
        <th>Contacto Emergencia</th>
        <th>Nombre Apellido Contacto Emergencia</th>
        <th>Fecha de registro</th>

        </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{ $inscripcions->nombre_equipo }}</td>
            <td>{{ $inscripcions->contacto_emergencia }}</td>
                <td>{{ $inscripcions->nombre_apellido_contacto_emergencia }}</td>
            <td>{{ $inscripcions->created_at }}</td>
            </tr>
        </tbody>
    </table>
</div>
 <h4 style="text-align:center">Firma__________________</h4>
<div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>