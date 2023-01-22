<div class="table-responsive" style="padding:15px;">
    <table class="table" id="Table">
        <thead>
        <tr>
            <th>Estado Civil</th>
        <th>Edad</th>
        <th>Usted Es</th>
        <th>Padece Enfermedad</th>
        <th>Especificar Enfermedad</th>
        <th>Presenta Defecto Fisico</th>
        <th>Especifique Defecto Fisico</th>
        <th>Estatura</th>
        <th>Peso</th>
        <th>Plan</th>
        <th>Tipo de Plan</th>
        <th>Nombre Apellido Fallecimiento Titular</th>
        <th>Parentesco Titular Beneficiario</th>
        <th>Ci Beneficiario</th>
        <th>Porcentaje Cesion</th>
        <th>Fechanac Beneficiario</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seguros as $seguro)
            <tr>
                <td>{{ $seguro->estado_civil }}</td>
            <td>{{ $seguro->edad }}</td>
            <td>{{ $seguro->usted_es }}</td>
            <td>{{ $seguro->padece_enfermedad }}</td>
            <td>{{ $seguro->especificar_enfermedad }}</td>
            <td>{{ $seguro->presenta_defecto_fisico }}</td>
            <td>{{ $seguro->especifique_defecto_fisico }}</td>
            <td>{{ $seguro->estatura }}</td>
            <td>{{ $seguro->peso }}</td>
            <td>{{ $seguro->plan }}</td>
            <td>{{ $seguro->tipo_plan }}</td>
            <td>{{ $seguro->nombre_apellido_fallecimiento_titular }}</td>
            <td>{{ $seguro->parentesco_titular_beneficiario }}</td>
            <td>{{ $seguro->ci_beneficiario }}</td>
            <td>{{ $seguro->porcentaje_cesion }}</td>
            <td>{{ $seguro->fechanac_beneficiario }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['seguros.destroy', $seguro->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('seguros.show', [$seguro->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('seguros.edit', [$seguro->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
