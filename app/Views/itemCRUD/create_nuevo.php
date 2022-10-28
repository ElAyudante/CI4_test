<?php
$sel_provincias = array (
  'Alava' => 'Alava',
  'Albaceta' => 'Albacete',
  'Alicante' => 'Alicante',
  'Almeria' => 'Almería',
  'Asturis' => 'Asturias',
  'Avila' => 'Ávila',
  'Badajoz' => 'Badajoz',
  'Baleares' => 'Baleares',
  'Barcelona' => 'Barcelona',
  'Burgos' => 'Burgos',
  'Caceres' => 'Cáceres',
  'Cadiz' => 'Cádiz',
  'Canarias' => 'Canarias',
  'Cantabria' => 'Cantabria',
  'Castellon' => 'Castellón',
  'Ciudad Real' => 'Ciudad Real',
  'Cordoba' => 'Córdoba',
  'Coruña' => 'Coruña',
  'Cuenca' => 'Cuenca',
  'Girona' => 'Girona',
  'Granada' => 'Granada',
  'Guadalajara' => 'Guadalajara',
  'Guipúzcoa' => 'Guipúzcoa',
  'Huelva' => 'Huelva',
  'Huesca' => 'Huesca',
  'Jaen' => 'Jaén',
  'Leon' => 'León',
  'Lleida' => 'Lleida',
  'Lugo' => 'Lugo',
  'Madrid' => 'Madrid',
  'Malaga' => 'Málaga',
  'Murcia' => 'Murcia',
  'Navarra' => 'Navarra',
  'Ourense' => 'Ourense',
  'Palencia' => 'Palencia',
  'Pontevedra' => 'Pontevedra',
  'La Rioja' => 'La Rioja',
  'Salamanca' => 'Salamanca',
  'Segovia' => 'Segovia',
  'Sevilla' => 'Sevilla',
  'Soria' => 'Soria',
  'Tarragona' => 'Tarragona',
  'Teruel' => 'Teruel',
  'Toledo' => 'Toledo',
  'Valencia' => 'Valencia',
  'Valladolid' => 'Valladolid',
  'Vizcaya' => 'Vizcaya',
  'Zamora' => 'Zamora',
  'Zaragoza' => 'Zaragoza'
);

$sel_comunidades =  array (
  'Anadalucia' => 'Andalucia',
  'Aragon' => 'Aragón',
  'Asturias' => 'Asturias',
  'Baleares' => 'Baleares',
  'Canarias' => 'Canarias',
  'Cantabria' => 'Cantabria',
  'Castilla La Mancha' => 'Castilla La Mancha',
  'Castilla Leon' => 'Catilla León',
  'Cataluña' => 'Cataluña',
  'Ceuta' => 'Ceuta',
  'Comunidad Valenciana' => 'Comunidad Valenciana',
  'Extremadura' => 'Extremadura',
  'Galicia' => 'Galicia',
  'La Rioja' => 'La Rioja',
  'Madrid' => 'Madrid',
  'Melilla' => 'Melilla',
  'Navarra' => 'Navarra',
  'Pais Vasco' => 'País Vasco',
  'Murcia' => 'Región de Murcia'
)
?>

<section class="junta">

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-10 m-auto">
        <div class="container p-5">
          <h3 style="color: #004987; text-transform: uppercase; font-size:3em">Alta colegiado</h3>
          <?php echo form_open('/itemCRUD/payment_advance'); ?>

            <div class="row row-cols-lg-4">
              <?php
                /*if ($this->session->flashdata('errors')){
                  echo '<div class="alert alert-danger">';
                  echo $this->session->flashdata('errors');
                  echo "</div>";
                }*/
              ?>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre" autofocus>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="password" class="form-control bg-transparent" name="pass" placeholder="Contraseña">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="password" class="form-control bg-transparent" name="confirm_pass" placeholder="Confirma contraseña">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="nif" placeholder="DNI">
                </div>
              </div>
              
              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="email" placeholder="Email">
                </div>
              </div>
              
              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control bg-transparent" name="telefono" placeholder="Teléfono">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control bg-transparent" name="movil" placeholder="Móvil">
                </div>
              </div>

              <div class="col">
                <select id="lnacimiento" class="form-control bg-transparent" name="lnacimiento">
                  <option selected value="0">Lugar de nacimiento</option>
                  <?php 
                    foreach ($sel_provincias as $sel_prov => $abreviatura) {
                      echo '<option value="' . $sel_prov . '">' . $abreviatura .'</option>';
                    }
                    ?>
                </select>
              </div>

              <div class="col">
                <div class="form-group" style="display:flex;">
                  <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                  <?php $attributes = 'id="fnacimiento" name="fnacimiento" class="form-control" placeholder="Fecha de nacimiento"'; echo form_input('fnacimiento', set_value('fnacimiento'), $attributes); ?>          
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="direccion" placeholder="Dirección">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control bg-transparent" name="cp" placeholder="CP">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="localidad" placeholder="Localidad">
                </div>
              </div>

              <div class="form-group col-md-3">
                <select id="provincia" class="form-control bg-transparent" name="provincia">
                  <option selected value="0">Selecciona una provincia</option>
                  <?php 
                    foreach ($sel_provincias as $sel_prov => $abreviatura) {
                      echo '<option value="' . $sel_prov . '">' . $abreviatura .'</option>';
                    }
                    ?>
                </select>
              </div>
              
              <div class="form-group col-md-3">
                <select id="comunidad" class="form-control bg-transparent" name="comunidad">
                  <option selected value="0">Comunidad autónoma</option>
                  <?php 
                    foreach ($sel_comunidades as $sel_com => $siglas) {
                      echo '<option value="' . $sel_com . '">' . $siglas .'</option>';
                    }
                    ?>
                </select>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="number" class="form-control text-uppercase bg-transparent" name="cuenta" placeholder="Número de CC">
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <input type="number" class="form-control text-uppercase bg-transparent" name="tlftrabajo" placeholder="Teléfono del trabajo">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="lugtrabajo" placeholder="¿Dónde trabajas?">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="dtrabajo" placeholder="Dirección del trabajo">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="loctrabajo" placeholder="Localidad del trabajo">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group" style="display:flex;">
                  <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                  <?php $attributes = 'id="fexpiracion" name="fexpiracion" class="form-control" placeholder="Fecha de caducidad"'; echo form_input('fexpiracion', set_value('fexpiracion'), $attributes); ?>           
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select id ="ejerciente" class="form-control bg-transparent" name="ejerciente">
                    <option value="" select>Tipo de colegiado</option>
                    <option value="1">Ejerciente</option>
                    <option value="0">No ejerciente</option>
                    <option value="2">Jubilado</option>
                    <option value="3">Estudiante</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="titulacion" placeholder="Titulación">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="especialidad" placeholder="Especialidad">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="ambito" placeholder="Ámbito de trabajo">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group custom-checkbox text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">Sector</label>
                  <input type="hidden" class="custom-control-input" name="publico" value="0">
                  <input type="checkbox" class="custom-control-input" name="sector" value="publico" id="sector1">
                  <label class="custom-control-label" for="sector1" style="color: #004987; font-weight:500;">Público</label>
                  <input type="hidden" class="custom-control-input" name="sector" value="privado" id="sector2">
                  <input type="checkbox" class="custom-control-input" name="privado" value="1" id="sector2">
                  <label class="custom-control-label" for="sector2" style="color: #004987; font-weight:500;">Privado</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">Solicita habilitación</label>
                  <input type="radio" class="custom-control-input" value="0" name="habitacion" id="habitacion1">
                  <label class="custom-control-label" for="habitacion1" style="color: #004987; font-weight:500;">Sí</label>
                  <input type="radio" class="custom-control-input" value="1" name="habitacion" id="habitacion2">
                  <label class="custom-control-label" for="habitacion2"style="color: #004987; font-weight:500;">No</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">Logopeda diplomado</label>
                  <input type="radio" class="custom-control-input" value="0" name="diplomado" id="diplomado1">
                  <label class="custom-control-label" for="diplomado1" style="color: #004987; font-weight:500;">Sí</label>
                  <input type="radio" class="custom-control-input" value="1" name="diplomado" id="diplomado2">
                  <label class="custom-control-label" for="diplomado2" style="color: #004987; font-weight:500;">No</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">Bolsa de trabajo</label>
                  <input type="radio" class="custom-control-input" value="0" name="bolsa" id="bolsa1">
                  <label class="custom-control-label" for="bolsa1" style="color: #004987; font-weight:500;">Sí</label>
                  <input type="radio" class="custom-control-input" value="1" name="bolsa" id="bolsa2">
                  <label class="custom-control-label" for="bolsa2" style="color: #004987; font-weight:500;">No</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group custom-checkbox text-uppercase pt-3">
                  <input type="hidden" class="custom-control-input" value="0" name="traslado" id="traslado">
                  <input type="checkbox" class="custom-control-input" value="1" name="traslado" id="traslado">
                  <label class="custom-control-label" for="sector" style="color: #004987; font-weight:500;">Traslado</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="colegioorigen" placeholder="Colegio de origen">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="number" class="form-control text-uppercase bg-transparent" name="norigen" placeholder="Nº Colegiado de origen">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="observacion" placeholder="Observaciones">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">¿Publicidad?</label>
                  <input type="radio" class="custom-control-input" name="publicidad" id="publicidad1">
                  <label class="custom-control-label" for="diplomado1" value="0" style="color: #004987; font-weight:500;">Sí</label>
                  <input type="radio" class="custom-control-input" name="publicidad" id="publicidad2">
                  <label class="custom-control-label" for="diplomado2" value="1" style="color: #004987; font-weight:500;">No</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">Email de bienvenida</label>
                  <input type="radio" class="custom-control-input" name="bienvenida" id="bienvenida1">
                  <label class="custom-control-label" for="bolsa1" value="0" style="color: #004987; font-weight:500;">Sí</label>
                  <input type="radio" class="custom-control-input" name="bienvenida" id="bienvenida2">
                  <label class="custom-control-label" for="bolsa2" value="1" style="color: #004987; font-weight:500;">No</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</section>

<script type="text/javascript">
    $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '< Ant ',
      nextText: ' Sig >',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
      weekHeader: 'Sm',
      dateFormat: 'dd/mm/yy',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
      $(function() {
          $("#fnacimiento").datepicker(
            {
              dateFormat: 'dd-mm-yy'
          }
          );
          $("#fexpiracion").datepicker(
            {
              dateFormat: 'dd-mm-yy'
          }
          );
          $("#falta").datepicker(
            {
              dateFormat: 'dd-mm-yy'
          }
        );
    });
</script>
<script>
            $( function() {
            $( "#datepicker" ).datepicker();
        } );
</script>