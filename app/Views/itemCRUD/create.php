<?php
$form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'', "enctype" => "multipart/form-data"];

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
          <?php echo form_open('/itemCRUD/store_admin', $form_att); ?>
            
            <div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">

            <div class="col">
              <div class="form-group">
                <strong>Fecha de Alta <span class="text-danger">*</span></strong>
                <input type="date" class="form-control" name="fechaAlta"  autofocus required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <strong>Nombre <span class="text-danger">*</span></strong>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" autofocus required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
              <strong>Apellidos <span class="text-danger">*</span></strong>
                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
              <strong>DNI <span class="text-danger">*</span></strong>
                <input type="text" class="form-control bg-transparent" name="nif" placeholder="DNI" required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <strong>Email <span class="text-danger">*</span></strong>
                <input type="text" class="form-control bg-transparent" name="email" placeholder="Email" required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <strong>Teléfono <span class="text-danger">*</span></strong>
                <input type="number" class="form-control bg-transparent" name="telefono" placeholder="Teléfono" required>
              </div>
            </div>

            <div class="col">
              <strong>Lugar de Nacimiento <span class="text-danger">*</span></strong>
              <select id="lnacimiento" class="alta-cole form-select bg-transparent" name="lnacimiento" required>
                <option disabled selected hidden value="">Lugar de nacimiento</option>
                <?php 
                  foreach ($sel_provincias as $sel_prov => $abreviatura) {
                    echo '<option value="' . $sel_prov . '">' . $abreviatura .'</option>';
                  }
                  ?>
              </select>
            </div>

            <div class="col">
              <strong>Fecha de Nacimiento </strong>
              <div class="form-group" style="display:flex;">
                
                <input type="date" id="date" name="fnacimiento" class="form-control" required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <strong>Dirección <span class="text-danger">*</span></strong>
                <input type="text" class="form-control bg-transparent" name="direccion" placeholder="Dirección" required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <strong>Código Postal <span class="text-danger">*</span></strong>
                <input type="number" class="form-control bg-transparent" name="cp" placeholder="CP" required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <strong>Localidad <span class="text-danger">*</span></strong>
                <input type="text" class="form-control bg-transparent" name="localidad" placeholder="Localidad" required>
              </div>
            </div>

            <div class="col">
              <strong>Provincia <span class="text-danger">*</span></strong>
              <select id="provincia" class="form-select bg-transparent" name="provincia" required>
                <option disabled selected hidden value="">Selecciona una provincia</option>
                <?php 
                  foreach ($sel_provincias as $sel_prov => $abreviatura) {
                    echo '<option value="' . $sel_prov . '">' . $abreviatura .'</option>';
                  }
                  ?>
              </select>
            </div>

            <div class="col">
              <strong>Comunidad Autónoma <span class="text-danger">*</span></strong>
              <select id="comunidad" class="form-select bg-transparent" name="comunidad" required>
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
                <strong>Cuenta Bancaria <span class="text-danger"></span></strong>
                <input type="number" class="form-control text-uppercase bg-transparent" name="cuenta" placeholder="Número de CC" >
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <strong>Teléfono de Trabajo <span class="text-danger">*</span></strong>
                <input type="number" class="form-control text-uppercase bg-transparent" name="tlftrabajo" placeholder="Teléfono del trabajo" required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <strong>Lugar de Trabajo </strong>
                <input type="text" class="form-control text-uppercase bg-transparent" name="lugtrabajo" placeholder="¿Dónde trabajas?">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <strong>Dirección de Trabajo</strong>
                <input type="text" class="form-control text-uppercase bg-transparent" name="dtrabajo" placeholder="Dirección del trabajo">
              </div>
            </div>

            <div class="col">
              <strong>Localidad de Trabajo</strong>
              <div class="form-group">
                <input type="text" class="form-control text-uppercase bg-transparent" name="loctrabajo" placeholder="Localidad del trabajo">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
              <strong>Titulación <span class="text-danger">*</span></strong>
                <input type="text" class="form-control text-uppercase bg-transparent" name="titulacion" placeholder="Titulación" required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
              <strong>Especialidad</strong>
                <input type="text" class="form-control text-uppercase bg-transparent" name="especialidad" placeholder="Especialidad">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
              <strong>Ámbito de Trabajo</strong>
                <input type="text" class="form-control text-uppercase bg-transparent" name="ambito" placeholder="Ámbito de trabajo">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
              <strong>Categoría</strong>
                <select id ="ejerciente" class="form-select bg-transparent" name="ejerciente">
                  <option disabled selected hidden value="">Tipo de colegiado</option>
                  <option value="1">Ejerciente</option>
                  <option value="0">No ejerciente</option>
                  <option value="2">Jubilado</option>
                  <option value="3">Estudiante</option>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
              <strong>Observaciones</strong>
                <input type="text" class="form-control text-uppercase bg-transparent" name="observaciones" placeholder="Observaciones">
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
              <div class="col"></div>
              <div class="col"></div>

              <div class="col text-uppercase">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="Sí" id="flexCheckDefault" onclick = "check();" name="traslado">
                  <label class="form-check-label fw-bold me-3" for="flexCheckDefault">Traslado</label>
                </div>
              </div>

              <div class="col"></div>
              <div class="col"></div>
              <div class="col"></div>

              <div class="col" id='colegioOrigen' style="display: none">
                <div class="form-group">
                <strong>Colegio de Origen</strong>
                  <input type="text" class="form-control text-uppercase bg-transparent" name="colegioorigen" placeholder="Colegio de origen" >
                </div>
              </div>

              <div class="col" id="numOrigen" style="display: none">
                <div class="form-group">
                <strong>Nº Colegiado de Origen</strong>
                  <input type="number" class="form-control text-uppercase bg-transparent" name="norigen" placeholder="Nº Colegiado de origen" >
                </div>
              </div>

              <div class="col"></div>
              <div class="col"></div>

              <div class="col-lg-12"></div>

              <div class="col" id="foto" style="display: none">
              <div class="form-group">
              <strong>Adjuntar Foto</strong>
                <input type="file" class="form-control bg-transparent" name="foto"  >
              </div>
              </div>

              <div class="col" id="foto_dni" style="display: none">
              <div class="form-group">
              <strong>Adjuntar DNI</strong>
                <input type="file" class="form-control bg-transparent" name="foto_dni" >
              </div>
              </div>

              <div class="col" id="foto_titulacion" style="display: none">

              <div class="form-group">
              <strong>Adjuntar TItulación</strong>
                <input type="file" class="form-control bg-transparent" name="foto_titulo" >
              </div>
              </div>

              <div class="col" id="foto_justificante" style="display: none">

              <div class="form-group">
                <strong>Adjuntar Documento Baja</strong>
                  <input type="file" class="form-control bg-transparent" name="foto_justificante" >
                </div>
              </div>

              <div class="col-lg-12">
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

  var menu = document.getElementById("ejerciente");
  menu.addEventListener("change", generateData);
  var foto = document.getElementById('foto');
  var foto_dni = document.getElementById('foto_dni');
  var foto_titulo = document.getElementById('foto_titulacion');
  var foto_justificante = document.getElementById('foto_justificante');
  var checkbox = document.getElementById('flexCheckDefault');
  var numOrigen = document.getElementById('numOrigen');
  var colegioOrigen = document.getElementById('colegioOrigen');

  function generateData(event) {
    if (menu.value == '1') {
      foto.style.display = 'block';
      foto_dni.style.display = 'block';
      foto_titulo.style.display = 'block';
      foto_justificante.style.display = 'none';
    } else if (menu.value == '0') {
      foto.style.display = 'block';
      foto_dni.style.display = 'block';
      foto_titulo.style.display = 'block';
      foto_justificante.style.display = 'block';
    } else if (menu.value == '2') {
      foto.style.display = 'block';
      foto_dni.style.display = 'block';
      foto_titulo.style.display = 'block';
      foto_justificante.style.display = 'block';
    } else if (menu.value == '3') {
      foto.style.display = 'none';
      foto_dni.style.display = 'none';
      foto_titulo.style.display = 'none';
      foto_justificante.style.display = 'none';
    }
  }

  function check(){
    if(checkbox.checked == true){
      numOrigen.style.display = 'block';
      colegioOrigen.style.display = 'block';
    } else {
      numOrigen.style.display = 'none';
      colegioOrigen.style.display = 'none';
    }
  }
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
