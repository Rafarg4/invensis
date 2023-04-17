@if(Auth::user()->hasRole('super_admin'))
<div class="table-responsive" style="padding:15px;">
    <table class="table" id="tablas">
        <thead>
        <tr>
        <th>#</th>
        <th>Ci</th>
        <th>Nombre y Apellido</th>
        <th>Categoria</th>
        <th>Club</th>
        <th>Sexo</th>
        <th>1 Fecha</th>
        <th>2 Fecha</th>
        <th>3 Fecha</th>
        <th>4 Fecha</th>
        <th>Total</th>
        <th>Accion</th>
        </tr>
        </thead>
        <tbody> 
            <?php $i = 0; ?>
        @foreach($rankings as $ranking)
            <tr>
            <td>{{ $ranking->posicion }}</th>
            @if(!empty($inscripcion) && $inscripcion->count() > 0)
            <td> 
            @if($ranking->ci == $inscripcion[$i])
                {{ $ranking->ci }}
            @else
           Ci {{ $ranking->ci }} no registrado 
            @endif   
            </td>
            @else
            <td>   
           Ci {{ $ranking->ci }} no registrado 
            </td>@endif
            <td>{{ $ranking->nombre_apellido }}</td>
            <td>{{ $ranking->categoria }}</td>
            <td>{{ $ranking->club }}</td>
            <td>{{ $ranking->sexo }}</td>
            <td>{{ $ranking->primer_fecha}}</td>
            <td>{{ $ranking->segundo_fecha }}</td>
            <td>{{ $ranking->tercero_fecha }}</td>
            <td>{{ $ranking->cuarto_fecha }}</td>
            <td>{{ $ranking->total }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['rankings.destroy', $ranking->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                         
                        <a href="{{ route('rankings.show', [$ranking->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                           @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion','admin'])
                        <a href="{{ route('rankings.edit', [$ranking->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>@endcan
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th> 
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
    </table>
</div>
<!-- Vista para usuarios -->
 @else
<div class="table-responsive" style="padding:15px;">
    <table class="table" id="tablas">
        <thead>
        <tr>
        <th>#</th>
        <th>Ci</th>
        <th>Nombre y Apellido</th>
        <th>Categoria</th>
        <th>Club</th>
        <th>Sexo</th>
        <th>1 Fecha</th>
        <th>2 Fecha</th>
        <th>3 Fecha</th>
        <th>4 Fecha</th>
        <th>Total</th>
        <th>Accion</th>
        </tr>
        </thead>
        <tbody> 
            <?php $i = 0; ?>
        @foreach($rankings as $ranking)
            <tr>
            <td>{{ $ranking->posicion }}</th>
            <td>{{ $ranking->ci }}</td>
            <td>{{ $ranking->nombre_apellido }}</td>
            <td>{{ $ranking->categoria }}</td>
            <td>{{ $ranking->club }}</td>
            <td>{{ $ranking->sexo }}</td>
            <td>{{ $ranking->primer_fecha}}</td>
            <td>{{ $ranking->segundo_fecha }}</td>
            <td>{{ $ranking->tercero_fecha }}</td>
            <td>{{ $ranking->cuarto_fecha }}</td>
            <td>{{ $ranking->total }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['rankings.destroy', $ranking->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                         
                        <a href="{{ route('rankings.show', [$ranking->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                           @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                        <a href="{{ route('rankings.edit', [$ranking->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>@endcan
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th> 
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
    </table>
</div>

@endif