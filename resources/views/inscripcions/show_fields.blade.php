  <div class="table-responsive">
    <table class="table" id="tabla">
        <thead>
        <tr>
            <th>Nombres</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Fecha de nacimiento</th>
        <th>Cedula de indentidad</th>

        </tr>
        </thead>
        <tbody>
            <tr>
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
            <span class="badge badge-warning"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Paralizado')
            <span class="badge badge-danger"> {{ $inscripcion->estado }} </span>
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
        <th>Nombre de equipo</th>   
        <th>Contacto Emergencia</th>
        <th>Nombre Apellido Contacto Emergencia</th>
        <th>Fecha de registro</th>

        </tr>
        </thead>
        <tbody>
            <tr>
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

        </div>
    </div>