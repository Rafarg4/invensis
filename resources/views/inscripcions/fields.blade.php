<link href="//netdna.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<style type="text/css">
 
.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>

<div class="container"style="font-size: 12px;">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Paso 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Paso 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Paso 3</p>
        </div>
    </div>
</div>
<form role="form">
    <div class="row setup-content" id="step-1">
            <div class="col-md-12">
                <h3> Datos personales</h3>
                <div class="form-group col-sm-12">
                <label for="id_user">Identificador:</label>
                <input type="text" name="id_user" class="form-control form-control-sm" value="{{ Auth::user()->id }}" readonly>
                </div>
                <!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('primer_y_segundo_nombre', 'Primer y segundo nombre:') !!}
                    {!! Form::text('primer_y_segundo_nombre', null, ['class' => 'form-control form-control-sm','required']) !!}
                </div><!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('primer_y_segundo_apellido', 'Primer y segundo apellido:') !!}
                    {!! Form::text('primer_y_segundo_apellido', null, ['class' => 'form-control','required']) !!}
                </div><!-- Grupo Sanguineo Field -->
                <!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('fechanac', 'Fecha de nacimiento n:') !!}
                    {!! Form::date('fechanac', null, ['class' => 'form-control','required']) !!}
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
                    {!! Form::label('ci', 'Identificacion:') !!}
                    {!! Form::text('ci', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Nacionalidad Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('nacionalidad', 'Nacionalidad:') !!}
                    {!! Form::text('nacionalidad', null, ['class' => 'form-control','required']) !!}
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
                <button class="btn btn-primary nextBtn  pull-right" type="submit" >Siguiente</button>
            </div>
        </div>
    <div class="row setup-content" id="step-2">
            <div class="col-md-12">
                <h3>Datos de cliclista</h3>
                            <!-- Id Categoria Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('tipo_categoria', 'Categoria:') !!}
                {!! Form::select('tipo_categoria',array('Principal' => 'Principal', 'Master' => 'Master','Ciclismo para todos' => 'Ciclismo para todos'),null, ['class' => 'form-control','placeholder'=>'Seleccione una opcion','required','required'])!!}
                </div>
            <div class="form-group col-sm-12" id="id_categoria" style="display: none;">
                
            </div>
            <div class="form-group col-sm-12" id="id_categoria2" style="display: none;">
                
            </div>
            <div class="form-group col-sm-12" id="id_categoria3" style="display: none;">
                
            </div>

<script type="text/javascript">
const tipo_categoria = document.querySelector("#tipo_categoria");
const input1 = document.querySelector("[id=id_categoria]");
const input2 = document.querySelector("[id=id_categoria2]");
const input3 = document.querySelector("[id=id_categoria3]");

tipo_categoria.addEventListener("change", changeTipo);

function changeTipo(){

    if (tipo_categoria.value === "Principal") {
        input1.innerHTML = '{!! Form::select("id_categoria", $categoria, null, ["class" => "form-control custom-select","placeholder"=>"Selecione una opcion","id"=>"id_categoria","required"]) !!}';
        input1.style.display = 'initial'
        /*input1.style.display = 'initial';
        input2.style.display = 'none';
        input3.style.display = 'none';*/
    } else if(tipo_categoria.value === "Master") {
        input1.innerHTML = '{!! Form::select("id_categoria", $categoria2, null, ["class" => "form-control custom-select","placeholder"=>"Selecione una opcion","id"=>"id_categoria2","required"]) !!}';
        input1.style.display = 'initial'
        /*input1.style.display = 'none';
        input3.style.display = 'none';
        input2.style.display = 'initial';*/
    } else if (tipo_categoria.value === "Ciclismo para todos"){
        input1.innerHTML = '{!! Form::select("id_categoria", $categoria3, null, ["class" => "form-control custom-select","placeholder"=>"Selecione una opcion","id"=>"id_categoria3","required"]) !!}';
        input1.style.display = 'initial'
        /*input1.style.display = 'none';
        input2.style.display = 'none';
        input3.style.display = 'initial';*/
    }
}
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

            <!-- Foto Field -->
                <button class="btn btn-primary nextBtn  pull-right" type="submit" >Siguiente</button>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
            <div class="col-md-12">
                <h3> Ultimo paso, confirmar datos ingresados</h3>
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
                <button class="btn btn-success  pull-right" type="submit">Confirmar!</button>
                
            </div>

        </div>
    
</form>
</div>

<script type="text/javascript">
 $(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

</script>













