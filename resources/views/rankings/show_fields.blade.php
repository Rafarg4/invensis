<div class="table-responsive" >
    <table class="table" id="a">
        <thead>
        <tr>
            <th>Posicion</th>
            <th>Usuario</th>
        <th>Nombre Apellido</th>
        <th>Categoria</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $ranking->posicion }}</td>
                 <td>{{ $ranking->usuario->name }}</td>
            <td>{{ $ranking->nombre_apellido }}</td>
            <td>{{ $ranking->categoria->nombre }}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="table-responsive">
    <table class="table" id="Tale">
        <thead>
        <tr>
           
        <th>Club</th>
        <th>Sexo</th>
        <th>1 Fecha</th>
        <th>2 Fecha</th>
      
        </tr>
        </thead>
        <tbody>
            <tr>
              
            <td>{{ $ranking->club }}</td>
            <td>{{ $ranking->sexo }}</td>
            <td>{{ $ranking->primer_fecha}}</td>
            <td>{{ $ranking->segundo_fecha }}</td>
            
            </tr>
        </tbody>
    </table>
</div>
<div class="table-responsive" >
    <table class="table" id="Tale">
        <thead>
        <tr>
           
       
        <th>3 Fecha</th>
        <th>4 Fecha</th>
        <th>Total</th>
            <th>Fecha de registro</th>
            <th>Fecha de actualizacion</th>
        </tr>
        </thead>
        <tbody>
            <tr>
               
            <td>{{ $ranking->tercero_fecha }}</td>
            <td>{{ $ranking->cuarto_fecha }}</td>
            <td>{{ $ranking->total }}</td>
               <td>{{ $ranking->created_at }}</td>
  
             <td>{{ $ranking->created_at }}</td>            
            </tr>
        </tbody>
    </table>
</div>

