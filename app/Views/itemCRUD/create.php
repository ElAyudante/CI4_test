<?php
$form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'',];

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

<section class="bg-gray">

  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
          <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Alta colegiado (ADMIN)</h3>
          <?php echo form_open('/itemCRUD/store', $form_att); ?>
            
            <div class="row row-cols-lg-4 g-lg-4 cblue">
              <?php
                /*if ($this->session->flashdata('errors')){
                  echo '<div class="alert alert-danger">';
                  echo $this->session->flashdata('errors');
                  echo "</div>";
                }*/
              ?>
            
              <div class="col">
                <div class="form-group" style="display:flex;">
                  <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                  <?php $attributes = 'id="falta" name="falta" class="form-control" placeholder="Fecha de alta"'; echo form_input('falta', set_value('falta'), $attributes); ?>           
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre" autofocus required>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="usuario" placeholder="Usuario" required>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="password" class="form-control bg-transparent" name="pass" placeholder="Contraseña" required>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="password" class="form-control bg-transparent" name="confirm_pass" placeholder="Confirma contraseña" required>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="nif" placeholder="DNI" required>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="email" placeholder="Email" required>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="direccion" placeholder="Dirección" required>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="localidad" placeholder="Localidad" required>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control bg-transparent" name="cp" placeholder="CP" required>
                </div>
              </div>

              <div class="col">
                <select id="provincia" class="form-control bg-transparent" name="provincia" required>
                  <option disabled selected hidden value="">Selecciona una provincia</option>
                  <?php 
                    foreach ($sel_provincias as $sel_prov => $abreviatura) {
                      echo '<option value="' . $sel_prov . '">' . $abreviatura .'</option>';
                    }
                    ?>
                </select>
              </div>

              <div class="col">
                <select id="comunidad" class="form-control bg-transparent" name="comunidad" required>
                  <option disabled selected hidden value="">Comunidad autónoma</option>
                  <?php 
                    foreach ($sel_comunidades as $sel_com => $siglas) {
                      echo '<option value="' . $sel_com . '">' . $siglas .'</option>';
                    }
                    ?>
                </select>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control bg-transparent" name="telefono" placeholder="Teléfono" required>
                </div>
              </div>
              
              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control bg-transparent" name="movil" placeholder="Móvil" required>
                </div>
              </div>

              <div class="col">
                <select id="lnacimiento" class="form-control bg-transparent" name="lnacimiento" required>
                  <option disabled selected hidden value="">Lugar de nacimiento</option>
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
                  <input type="number" class="form-control text-uppercase bg-transparent" name="cuenta" placeholder="Número de CC">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control text-uppercase bg-transparent" name="tlftrabajo" placeholder="Teléfono del trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="lugtrabajo" placeholder="¿Dónde trabajas?">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="dtrabajo" placeholder="Dirección del trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="loctrabajo" placeholder="Localidad del trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control text-uppercase bg-transparent" name="ncolegiado" placeholder="Número de colegiado">
                </div>
              </div>

              <div class="col">
                <div class="form-group" style="display:flex;">
                  <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                  <?php $attributes = 'id="fexpiracion" name="fexpiracion" class="form-control" placeholder="Fecha de caducidad"'; echo form_input('fexpiracion', set_value('fexpiracion'), $attributes); ?>           
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <select id ="ejerciente" class="form-control bg-transparent" name="ejerciente">
                    <option disabled selected hidden value="" select>Tipo de colegiado</option>
                    <option value="1">Ejerciente</option>
                    <option value="0">No ejerciente</option>
                    <option value="2">Jubilado</option>
                    <option value="3">Estudiante</option>
                  </select>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="titulacion" placeholder="Titulación">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="especialidad" placeholder="Especialidad">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="ambito" placeholder="Ámbito de trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="colegioorigen" placeholder="Colegio de origen">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control text-uppercase bg-transparent" name="norigen" placeholder="Nº Colegiado de origen">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="observacion" placeholder="Observaciones">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <select id ="cuota" name="cuota" class="form-control bg-transparent">
                    <option value="" select>Asignar 1ª cuota</option>
                    <option value="1">2 SEM 2021</option>
                    <option value="0">1er semestre 2021</option>
                    <option value="2">2 SEM 2020</option>
                    <option value="3">1er semestre 2021</option>
                  </select>
                </div>
              </div>
              
              <div class="col text-uppercase d-flex align-items-center">
                <label class="fw-bold me-3">Paga inscripción</label>
                <div class="form-check form-check-inline me-2 mb-0">
                  <input class="form-check-input" type="radio" name="inscription" id="inscription1" value="1" checked>
                  <label class="form-check-label" for="inscription1">Sí</label>
                </div>

                <div class="form-check form-check-inline me-0 mb-0">
                  <input class="form-check-input" type="radio" name="inscription" id="inscription2" value="0">
                  <label class="form-check-label" for="inscription2">No</label>
                </div>
              </div>

              <div class="col text-uppercase d-flex align-items-center">
                <label class="fw-bold me-3">¿Publicidad?</label>
                <div class="form-check form-check-inline me-2 mb-0">
                  <input class="form-check-input" type="radio" name="publicity" id="publicity1" value="1" checked>
                  <label class="form-check-label" for="publicity1">Sí</label>
                </div>

                <div class="form-check form-check-inline me-0 mb-0">
                  <input class="form-check-input" type="radio" name="publicity" id="publicity2" value="0">
                  <label class="form-check-label" for="publicity2">No</label>
                </div>
              </div>

              <div class="col text-uppercase d-flex align-items-center">
                <label class="fw-bold me-3">Email de bienvenida</label>
                <div class="form-check form-check-inline me-2 mb-0">
                  <input class="form-check-input" type="radio" name="welcome" id="welcome1" value="1" checked>
                  <label class="form-check-label" for="welcome1">Sí</label>
                </div>

                <div class="form-check form-check-inline me-0 mb-0">
                  <input class="form-check-input" type="radio" name="welcome" id="welcome2" value="0">
                  <label class="form-check-label" for="welcome2">No</label>
                </div>
              </div>
              
              <div class="col text-uppercase d-flex align-items-center">
                <label class="fw-bold me-3">Sector</label>
                <div class="form-check form-check-inline me-2 mb-0">
                  <input class="form-check-input" type="radio" name="sectores" id="sector1" value="publico" checked>
                  <label class="form-check-label" for="sector1">Público</label>
                </div>

                <div class="form-check form-check-inline me-0 mb-0">
                  <input class="form-check-input" type="radio" name="sectores" id="sector2" value="privado">
                  <label class="form-check-label" for="sector2">Privado</label>
                </div>
              </div>

              <div class="col text-uppercase d-flex align-items-center">
                <label class="fw-bold me-3">Solicita habilitación</label>
                <div class="form-check form-check-inline me-2 mb-0">
                  <input class="form-check-input" type="radio" name="hability" id="hability1" value="1" checked>
                  <label class="form-check-label" for="hability1">Sí</label>
                </div>

                <div class="form-check form-check-inline me-0 mb-0">
                  <input class="form-check-input" type="radio" name="hability" id="hability2" value="0">
                  <label class="form-check-label" for="hability2">No</label>
                </div>
              </div>

              <div class="col text-uppercase d-flex align-items-center">
                <label class="fw-bold me-3">Logopeda diplomado</label>
                <div class="form-check form-check-inline me-2 mb-0">
                  <input class="form-check-input" type="radio" name="diplomado" id="diplomado1" value="1" checked>
                  <label class="form-check-label" for="diplomado1">Sí</label>
                </div>

                <div class="form-check form-check-inline me-0 mb-0">
                  <input class="form-check-input" type="radio" name="diplomado" id="diplomado2" value="0">
                  <label class="form-check-label" for="diplomado2">No</label>
                </div>
              </div>

              <div class="col text-uppercase d-flex align-items-center">
                <label class="fw-bold me-3">Bolsa de trabajo</label>
                <div class="form-check form-check-inline me-2 mb-0">
                  <input class="form-check-input" type="radio" name="bolsa" id="bolsa1" value="1" checked>
                  <label class="form-check-label" for="bolsa1">Sí</label>
                </div>

                <div class="form-check form-check-inline me-0 mb-0">
                  <input class="form-check-input" type="radio" name="bolsa" id="bolsa2" value="0">
                  <label class="form-check-label" for="bolsa2">No</label>
                </div>
              </div>

              <div class="col text-uppercase d-flex align-items-center">
                <label class="fw-bold me-3">¿Está colegiado?</label>
                <div class="form-check form-check-inline me-2 mb-0">
                  <input class="form-check-input" type="radio" name="user" id="user1" value="1" checked>
                  <label class="form-check-label" for="user1">Sí</label>
                </div>

                <div class="form-check form-check-inline me-0 mb-0">
                  <input class="form-check-input" type="radio" name="user" id="user2" value="0">
                  <label class="form-check-label" for="user2">No</label>
                </div>
              </div>

              <div class="col text-uppercase">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label fw-bold me-3" for="flexCheckDefault">Traslado</label>
                </div>
              </div>

              <div class="col"></div>
              <div class="col"></div>
              <div class="col"></div>

              <div class="col">
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
              </div>

            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</section>

<script>
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>

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
