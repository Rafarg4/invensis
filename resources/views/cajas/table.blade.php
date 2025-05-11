 <style>
/* Solo el estilo necesario para el switch */
.form-check-input[type=checkbox] {
  width: 2.5em;
  height: 1.5em;
  background-color: #dee2e6;
  border-radius: 3em;
  position: relative;
  appearance: none;
  transition: background-color .15s ease-in-out;
}

.form-check-input[type=checkbox]::before {
  content: "";
  position: absolute;
  width: 1em;
  height: 1em;
  background-color: white;
  border-radius: 50%;
  top: 0.25em;
  left: 0.25em;
  transition: transform 0.15s ease-in-out;
}

.form-check-input[type=checkbox]:checked {
  background-color: #0d6efd;
}

.form-check-input[type=checkbox]:checked::before {
  transform: translateX(1em);
}
</style>
  <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripcion</th>
        <th>Apertura</th>
        <th>Cierre</th>
        <th>Fecha</th>
        <th>Estado</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cajas as $caja)
            <tr>
            <td>{{ $caja->nombre }}</td>
            <td>{{ $caja->descripcion }}</td>
            <td>{{ $caja->apertura }}</td>
            <td>{{ $caja->cierre }}</td>
            <td>{{ $caja->fecha ?? 'Sin datos'}}</td>
             <td><div class="form-check form-switch">
              <input 
                class="form-check-input" 
                type="checkbox" 
                id="estadoSwitch{{ $caja->id }}" 
                {{ $caja->estado === 'Activo' ? 'checked' : '' }} 
                onchange="cambiarEstado({{ $caja->id }}, this.checked)">
              <label class="form-check-label" for="estadoSwitch{{ $caja->id }}">
                {{ $caja->estado }}
              </label>
            </div></td>
                <td width="120">
                    {!! Form::open(['route' => ['cajas.destroy', $caja->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cajas.show', [$caja->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cajas.edit', [$caja->id]) }}"
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
<script>
function cambiarEstado(id, activo) {
  const estado = activo ? 'Activo' : 'Inactivo';

  fetch(`/caja/${id}/cambiarEstadoCaja`, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ estado })
  })
  .then(res => res.json())
  .then(data => {
    // Actualizar el texto de la etiqueta
    document.querySelector(`#estadoSwitch${id}`).nextElementSibling.innerText = estado;
    console.log(data.message);
  })
  .catch(err => console.error('Error:', err));
}
</script>