<link href="//netdna.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
            <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                 <h4><strong><i class="fa fa-user-plus" aria-hidden="true"></i>
                    Ingrese datos personales </strong></h4>
                </div>
                </div>
                <div class="form-group col-sm-12">
                <label for="id_user">Identificador:</label>
                <input type="text" name="id_user" class="form-control form-control-sm" value="{{ Auth::user()->id }}" readonly>
                </div>
                <div class="form-group col-sm-12">
                    {!! Form::label('ci', 'Cedula de Identidad:') !!}
                    {!! Form::text('ci', null, ['class' => 'form-control','required']) !!}
                </div>
                <!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('primer_y_segundo_nombre', 'Primer y segundo nombre:') !!}
                    {!! Form::text('primer_y_segundo_nombre', null, ['class' => 'form-control form-control','required']) !!}
                </div><!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('primer_y_segundo_apellido', 'Primer y segundo apellido:') !!}
                    {!! Form::text('primer_y_segundo_apellido', null, ['class' => 'form-control','required']) !!}
                </div><!-- Grupo Sanguineo Field -->
               <!-- Campo de fecha de nacimiento -->
                <div class="form-group col-sm-12">
                    {!! Form::label('fechanac', 'Fecha de nacimiento:') !!}
                    {!! Form::date('fechanac', null, ['class' => 'form-control', 'id' => 'fechanac', 'required']) !!}
                </div>

               <div class="form-group col-sm-12">
                    {!! Form::label('edad', 'Edad:') !!}
                    {!! Form::text('edad', null, ['class' => 'form-control', 'id' => 'edad', 'required']) !!}
                </div>
                <!-- Grupo Sanguineo Field -->
                <div class=" form-group col-sm-12">
                {!! Form::label('sexo', 'Sexo:') !!}
                {!! Form::select('sexo',array('Masculino' => 'Masculino', 'Femenino' => 'Femenino','Otro' => 'Otro'),null, ['class' => 'form-control','placeholder'=>'Seleccione una opcion','required','required'])!!}
                </div>
                <!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('grupo_sanguineo', 'Grupo sanguineo:') !!}
                {!! Form::select('grupo_sanguineo',array('A +' => 'A +', 'A-' => 'A-','B +' => 'B +','B-' => 'B-','AB+' => 'AB+','AB-' => 'AB-','O+' => 'O+','O-' => 'O-'),null, ['class' => 'form-control','placeholder'=>'Seleccione una opcion','required'])!!}
                </div>
               <div class="form-group col-sm-12">
                    {!! Form::label('nacionalidad', 'Nacionalidad:') !!}
                    {!! Form::select('nacionalidad', [
                        'Argentina' => 'Argentina',
                        'Bolivia' => 'Bolivia',
                        'Brasil' => 'Brasil',
                        'Chile' => 'Chile',
                        'Colombia' => 'Colombia',
                        'Ecuador' => 'Ecuador',
                        'Guyana' => 'Guyana',
                        'Paraguay' => 'Paraguay',
                        'Perú' => 'Perú',
                        'Surinam' => 'Surinam',
                        'Uruguay' => 'Uruguay',
                        'Venezuela' => 'Venezuela',
                    ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una nacionalidad', 'required']) !!}
                </div>
                <!-- Celular Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('celular', 'Celular:') !!}
                    {!! Form::number('celular', null, ['class' => 'form-control','required']) !!}
                </div>
                <!-- Email Field -->
                <div class="form-group col-sm-12 pull-left">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                </div>
                 <div class="form-group col-sm-12">
                    {!! Form::label('departamento', 'Departamento:') !!}
                    {!! Form::select('departamento', array(
                        'Alto Paraguay' => 'Alto Paraguay',
                        'Alto Paraná' => 'Alto Paraná',
                        'Asunción' => 'Asunción',
                        'Boquerón' => 'Boquerón',
                        'Caaguazú' => 'Caaguazú',
                        'Canindeyú' => 'Canindeyú',
                        'Central' => 'Central',
                        'Concepción' => 'Concepción',
                        'Cordillera' => 'Cordillera',
                        'Guairá' => 'Guairá',
                        'Itapúa' => 'Itapúa',
                        'Misiones' => 'Misiones',
                        'Ñeembucú' => 'Ñeembucú',
                        'Paraguarí' => 'Paraguarí',
                        'Presidente Hayes' => 'Presidente Hayes',
                        'San Pedro' => 'San Pedro'
                    ), null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required', 'id' => 'departamento']) !!}
                </div>
                <!-- Ciudad Field -->
                <!-- Ciudad Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('ciudad', 'Ciudad:') !!}
                    {!! Form::select('ciudad', array(), null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required', 'id' => 'ciudad']) !!}
                </div>
                <!-- Domiciolio Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('domiciolio', 'Domicilio:') !!}
                    {!! Form::text('domiciolio', null, ['class' => 'form-control','required']) !!}
                </div>
                <script>
    // Definir las ciudades para cada departamento
    var ciudadesPorDepartamento = {
        'Alto Paraguay': ['Bahía Negra', 'Capitán Carmelo Peralta', 'Fuerte Olimpo', 'Puerto Casado'],
        'Alto Paraná': ['Ciudad del Este', 'Doctor Juan León Mallorquín', 'Doctor Raúl Peña', 'Domingo Martínez de Irala', 'Hernandarias', 'Iruña', 'Itakyry', 'Juan Emilio O\'Leary', 'Los Cedrales', 'Mbaracayú', 'Minga Guazú', 'Minga Porá', 'Naranjal', 'Ñacunday', 'Presidente Franco', 'San Alberto', 'San Cristóbal', 'Santa Fe del Paraná', 'Santa Rita', 'Santa Rosa del Monday', 'Tavapy', 'Yguazú'],
        'Asunción': ['Asunción'],
        'Boquerón': ['Filadelfia', 'Loma Plata', 'Mariscal José Félix Estigarribia'],
        'Caaguazú': ['3 de Febrero', 'Caaguazú', 'Carayao', 'Coronel Oviedo', 'Dr. Cecilio Baez', 'Dr. J. Eulogio Estigarribia', 'Dr. Juan Manuel Frutos', 'Jose Domingo Ocampos', 'La Pastora', 'Mcal. Francisco Solano Lopez', 'Nueva Londres', 'Nueva Toledo', 'R.I. 3 Corrales', 'Raul Arsenio Oviedo', 'Repatriacion', 'San Joaquin', 'San Jose de los Arroyos', 'Santa Rosa del Mbutuy', 'Simon Bolivar', 'Tembiapora', 'Vaqueria', 'Yhu'],
        'Canindeyú': ['Corpus Christi', 'Curuguaty', 'Gral. Francisco Caballero Álvarez', 'Itanará', 'Katueté', 'La Paloma', 'Maracaná', 'Pto. Adela', 'Laurel', 'Nueva Esperanza', 'Salto del Guaira', 'Villa Ygatimí', 'Yasy Cañy', 'Yby Pyta', 'Ypejhú', 'Ybyrarobaná'],
        'Central': ['Areguá', 'Capiatá', 'Fernando de la Mora', 'Guarambaré', 'Itá', 'Itauguá', 'J. Augusto Saldivar', 'Lambaré', 'Limpio', 'Luque', 'Mariano Roque Alonso', 'Nueva Italia', 'Ñemby', 'San Antonio', 'San Lorenzo', 'Villa Elisa', 'Villeta', 'Ypacaraí', 'Ypané'],
        'Concepción': ['Arroyito', 'Azote\'y', 'Belén', 'Concepción', 'Horqueta', 'Loreto', 'Paso Barreto', 'Paso Horqueta', 'San Alfredo', 'San Lázaro', 'San Carlos del Apa', 'Sargento Jose Felix Lopez', 'Yby Ya\'u'],
        'Cordillera': ['Altos', 'Arroyos y Esteros', 'Atyrá', 'Caacupé', 'Caraguatay', 'Emboscada', 'Eusebio Ayala', 'Isla Pucú', 'Itacurubí de la Cordillera', 'Juan de Mena', 'Loma Grande', 'Mbocayaty del Yhaguy', 'Nueva Colombia', 'Piribebuy', 'Primero de Marzo', 'San Bernardino', 'San José Obrero', 'Santa Elena', 'Tobatí', 'Valenzuela'],
        'Guairá': ['Coronel Martinez', 'Borja', 'Doctor Botrell', 'Eugenio A. Garay', 'Félix Pérez Cardozo', 'Independencia', 'Itapé', 'Iturbe', 'José Fassardi', 'Jose Mauricio Troche', 'Mbocayaty del Guairá', 'Natalicio Talavera', 'Ñumi', 'Paso Yobai', 'San Salvador', 'Tebicuary'],
        'Itapúa': ['Alto Vera', 'Bella Vista', 'Cambyreta', 'Capitan Meza', 'Capitan Miranda', 'Carlos Antonio López', 'Carmen del Parana', 'Coronel Bogado', 'Edelira', 'Encarnación', 'Fram', 'General Jose Maria Delgado', 'Gral. Artigas', 'Hohenau', 'Itapua Poty', 'Jesús de Tavarangué', 'Jose Leandro Oviedo', 'La Paz', 'Mayor Otaño', 'Natalio', 'Nueva Alborada', 'Obligado', 'Pirapo', 'San Cosme y Damián', 'San Juan del Paraná', 'San Pedro del Paraná', 'San Rafael del Parana', 'Tomas R. Pereira', 'Trinidad', 'Yatytay'],
        'Misiones': ['Ayolas', 'San Ignacio Guazú', 'San Juan Bautista', 'San Miguel', 'San Patricio', 'Santa María de Fé', 'Santa Rosa Misiones', 'Santiago', 'Villa Florida', 'Yabebyry'],
        'Ñeembucú': ['Alberdi', 'Cerrito', 'Desmochados', 'Gral. José E. Díaz', 'Guazucuá', 'Humaitá', 'Isla Umbú', 'Laureles', 'Mayor José D. Martínez', 'Paso de Patria', 'Pilar', 'San Juan Bautista del Ñeembucú', 'Tacuaras', 'Villa Franca', 'Villa Oliva', 'Villalbin'],
        'Paraguarí': ['Acahay', 'Caapucú', 'Carapeguá', 'Escobar', 'Gral. Bernardino Caballero', 'La Colmena', 'María Antonia', 'Mbuyapey', 'Paraguarí', 'Pirayú', 'Quiindy', 'Quyquyhó', 'San Roque González de Santa Cruz', 'Sapucai', 'Tebicuarymí', 'Yaguarón', 'Ybycuí', 'Ybytymí'],
        'Presidente Hayes': ['Benjamin Aceval', 'Campo Aceval', 'Gral. Jose Maria Bruguez', 'José Falcón', 'Nueva Asunción', 'Nanawa', 'Puerto Pinasco', 'Tte. 1ro Manuel Irala Fernandez', 'Tte. Esteban Martinez', 'Villa Hayes'],
        'San Pedro': ['25 de Diciembre', 'Antequera', 'Capiibary', 'Choré', 'Gral. Elizardo Aquino', 'Gral. Resquín', 'Guayaibí', 'Itacurubí del Rosario', 'Liberación', 'Lima', 'Nueva Germania', 'San Estanislao', 'San Pablo', 'San Pedro de Ycuamandyyu', 'San Vicente Pancholo', 'Santa Rosa del Aguaray', 'Tacuatí', 'Unión', 'Villa del Rosario', 'Yataity del Norte', 'Yrybucuá', 'San José del Rosario']
    };

    // Script para manejar el cambio en el campo de selección del departamento
    document.getElementById('departamento').addEventListener('change', function() {
        var departamento = this.value;
        var ciudades = ciudadesPorDepartamento[departamento] || [];
        var ciudadSelect = document.getElementById('ciudad');
        ciudadSelect.innerHTML = '';
        ciudades.forEach(function(ciudad) {
            var option = document.createElement('option');
            option.text = ciudad;
            ciudadSelect.add(option);
        });
    });
</script>

    <div class="card">
        <div class="card-body">
            <h4><strong><i class="fa fa-bicycle" aria-hidden="true"></i>
                   Ingrese datos de ciclistas </strong></h4>
            </div>
        </div>
    <div class="form-group col-sm-12">
    {!! Form::label('tipo_licencia', 'Tipo de licencia:') !!}
    {!! Form::select('tipo_licencia', ['Anual' => 'Anual', 'Por dia' => 'Por día'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion', 'id' => 'tipo_licencia', 'required']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('id_categorias', 'Categoria:') !!}
        {!! Form::select('id_categorias', [], null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione una opción', 'required', 'id' => 'id_categorias']) !!}
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('id_modalidad', 'Modalidad:') !!}
        {!! Form::select('id_modalidad', [], null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione una modalidad', 'required', 'id' => 'id_modalidad']) !!}
    </div>

   <script type="text/javascript">
    $(document).ready(function() {
        // Evento para calcular la edad basado en la fecha de nacimiento
        $('#fechanac').on('change', function() {
            var fechaNacimiento = new Date($(this).val());
            var ahora = new Date();
            var edad = ahora.getFullYear() - fechaNacimiento.getFullYear();
            var mes = ahora.getMonth() - fechaNacimiento.getMonth();
            if (mes < 0 || (mes === 0 && ahora.getDate() < fechaNacimiento.getDate())) {
                edad--;
            }
            $('#edad').val(edad);
            $('#edad').change(); // Desencadena el cambio para actualizar las categorías y modalidades
        });

        $('#edad').on('change', function() {
            var edad = $(this).val();
            console.log('Edad ingresada:', edad);  // Verifica la edad ingresada
            if (edad) {
                $.ajax({
                    url: '/categorias_edad/' + edad,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log('Datos recibidos:', data);  // Verifica los datos recibidos
                        $('#id_categorias').empty();
                        if (data.message || data.length === 0) {
                            alert(data.message || 'No hay categorías disponibles para esta edad.');
                            $('#id_categorias').append('<option value="">No hay categorías disponibles para su edad</option>');
                        } else {
                            $('#id_categorias').append('<option value="">Seleccione una opción</option>');
                            $.each(data, function(key, value) {
                                $('#id_categorias').append('<option name="id_categorias" value="'+ value.id +'">'+ value.nombre +'</option>');
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);  // Verifica si hay errores
                        console.log('Status:', status);
                        console.dir(xhr);
                        $('#id_categorias').empty();
                        $('#id_categorias').append('<option value="">No se pudieron cargar las categorías</option>');
                    }
                });
            } else {
                $('#id_categorias').empty();
                $('#id_categorias').append('<option value="">Ingrese una edad válida</option>');
            }
        });

        $('#id_categorias').on('change', function() {
            var id_categorias = $(this).val();
            console.log('Categoría seleccionada:', id_categorias);  // Verifica la categoría seleccionada
            if (id_categorias) {
                $.ajax({
                    url: '/modalidades/' + id_categorias,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log('Modalidades recibidas:', data);  // Verifica las modalidades recibidas
                        $('#id_modalidad').empty();
                        if (data.length === 0) {
                            $('#id_modalidad').append('<option value="">No hay modalidades disponibles para esta categoría</option>');
                        } else {
                            $('#id_modalidad').append('<option value="">Seleccione una modalidad</option>');
                            $.each(data, function(key, value) {
                                $('#id_modalidad').append('<option name="modalidad" value="'+ value.nombre +'">'+ value.nombre +'</option>'); // Enviamos solo el nombre de la modalidad
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);  // Verifica si hay errores
                        console.log('Status:', status);
                        console.dir(xhr);
                        $('#id_modalidad').empty();
                        $('#id_modalidad').append('<option value="">No se pudieron cargar las modalidades</option>');
                    }
                });
            } else {
                $('#id_modalidad').empty();
                $('#id_modalidad').append('<option value="">Seleccione una categoría válida</option>');
            }
        });
    });
</script>



            <div class="form-group col-sm-12">
                    {!! Form::label('region', 'Elegir a que region pertenece:') !!}
                     {!! Form::select('region',array('Asosiacion metropolitana de ciclismo' => 'Asosiacion metropolitana de ciclismo', 'Federacion paranaense de ciclismo' => 'Federacion paranaense de ciclismo','Union Regional de ciclistas (URCI)' => 'Union Regional de ciclistas (URCI)','Federacion de ciclismo Itapuense' => 'Federacion de ciclismo Itapuense'),null, ['class' => 'form-control','placeholder'=>'Seleccione una opcion','required','required','required'])!!}
                </div>
                 <!-- Imagen Field -->
            <div class="form-group col-sm-12">
              {!! Form::label('foto', 'Foto:') !!}
            <div class="input-group">
            <div class="custom-file">
           <input type="file" id="foto" name="foto" required >
            <label class="custom-file-label" for="foto">Seleccionar Archivo</label>
            </div>
        </div>
         @if(isset($inscripcion->foto))
            <img src="{{ asset('storage/uploads/' . $inscripcion->foto) }}" width="100" height="100" class="img-circle">
            @endif
    </div>
            <!-- Nombre Equipo Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('nombre_equipo', 'Nombre Equipo:') !!}
                {!! Form::text('nombre_equipo', null, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Contacto Emergencia Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('contacto_emergencia', 'Contacto Emergencia:') !!}
                {!! Form::number('contacto_emergencia', null, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Nombre Apellido Contacto Emergencia Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('nombre_apellido_contacto_emergencia', 'Nombre Apellido Contacto Emergencia:') !!}
                {!! Form::text('nombre_apellido_contacto_emergencia', null, ['class' => 'form-control','required']) !!}
            </div>
                @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
            @endcan
            @if(Auth::user()->hasRole('super_admin'))
             <div class=" form-group col-sm-12">
             {!! Form::label('estado', 'Estado:') !!}
            {!! Form::select('estado',array('En espera' => 'En espera', 'Paralizado' => 'Paralizado','Verificado' => 'Verificado','Vencido' => 'Vencido'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
            </div>
            @else
             <div class="form-group col-sm-12">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" class="form-control" value="En espera" readonly>
                </div>
            @endif
                <button class="btn btn-success  pull-right" type="submit">Guardar</button>
                
            </div>

        </div>
    
</form>
</div>















