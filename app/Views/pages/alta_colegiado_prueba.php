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

</div>

<section class="presentacion p-5 text-left">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Alta colegiado</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta app" style="margin-top: 2.1em; margin-bottom: -5.1em; height: 800;">
  <div class="container-fluid">
		<div class="col-md-3">
		<aside class="sidebar">
			<div class="nav-side-menu">
				<div class="brand">Menú</div>
				<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
				<div class="menu-list">
		
					<ul id="menu-content" class="menu-content collapse out">
						<li  data-toggle="collapse" data-target="#colegiados" class="collapsed active">
							<a href="#colegiados"><i class="fas fa-users fa-lg"></i> Colegiados<i class="arrow fas-fa-chevron-right"></i></a>
						</li>
						<ul class="sub-menu collapse" id="colegiados">
							<li><a href="<?php echo base_url(),'/'; ?>alta_colegiado">Alta colegiados</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>lista_colegiados">Lista colegiados</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>alta_sociedades">Alta sociedades</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>lista_sociedades">Lista sociedades</a></li>
						</ul>

						<li data-toggle="collapse" data-target="#service" class="collapsed">
							<a href="#service"><i class="far fa-calendar-check fa-lg"></i> Eventos <span class="arrow"></span></a>
						</li>  
						<ul class="sub-menu collapse" id="service">
							<li><a href="<?php echo base_url(),'/'; ?>alta_evento">Alta de eventos propios</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>alta_evento_gratis">Alta de eventos gratuitos</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>alta_evento_ajeno">Alta de eventos ajenos</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>lista_eventos">Lista de eventos propios</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>lista_eventos_gratis">Lista de eventos gratis</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>lista_eventos_ajenos">Lista de eventos ajenos</a></li>
						</ul>


						<li data-toggle="collapse" data-target="#documentos" class="collapsed">
							<a href="#documentos"><i class="fas fa-file-alt fa-lg"></i> Documentos <span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="documentos">
							<li><a href="<?php echo base_url(),'/'; ?>alta_documento">Alta documentos</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>lista_documento">Lista documentos</a></li>
						</ul>

						<li data-toggle="collapse" data-target="#reclamaciones" class="collapsed">
							<a href="#reclamaciones"><i class="fas fa-exclamation-triangle fa-lg"></i> Reclamaciones <span class="arrow"></span></a>
						</li>

						<li data-toggle="collapse" data-target="#empleo" class="collapsed">
							<a href="#empleo"><i class="fas fa-briefcase fa-lg"></i> Empleo <span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="empleo">
							<li><a href="<?php echo base_url(),'/'; ?>alta_oferta">Alta ofertas</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>lista_ofertas">Lista ofertas</a></li>
						</ul>

						<li data-toggle="collapse" data-target="#cobros" class="collapsed">
							<a href="#cobros"><i class="fas fa-money-bill-wave fa-lg"></i> Cobros <span class="arrow"></span></a>
						</li>
						<ul class="sub-menu collapse" id="cobros">
							<li><a href="<?php echo base_url(),'/'; ?>alta_cuota">Alta cuota</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>eliminar_cuota">Eliminar cuota</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>estado_cuota">Estado cuota colegiados</a></li>
							<li><a href="<?php echo base_url(),'/'; ?>edit_cuotas">Importe cuotas</a></li>
						</ul>

						<li data-toggle="collapse" data-target="#salir" class="collapsed">
							<a href="<?= base_url('users/logout/logout_success') ?>"><i class="fas fa-sign-out-alt fa-lg"></i> Salir <span class="arrow"></span></a>
						</li>
					</ul>
				</div>
			</div>
		</aside>
		</div>
	</div>

	<div class="container" style="width: 70%; padding:0; margin-right:2em; margin-top: -52em;">
		<?php  ?>

		<?php echo form_open('users/register_colegiado'); ?>
			<div class="row">
			<?php if (validation_errors()) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if (isset($error)) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
				</div>
			<?php endif; ?>
      <?php if (isset($success)) : ?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert">
						<?= $success ?>
					</div>
				</div>
			<?php endif; ?>
			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Alta colegiado</h3>
        <div class="col-md-3">
          <div class="form-group" style="display:flex;">
            <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
            <?php $attributes = 'id="falta" name="altan" class="form-control" placeholder="Fecha de alta"'; echo form_input('falta', set_value('falta'), $attributes); ?>           
          </div>
        </div>
				<div class="col-md-3">
					<div class="form-group">
						<input type="text" class="form-control" name="nombre" placeholder="Nombre" autofocus>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
					</div>
				</div>
			</div>
			<div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="nif" placeholder="DNI">
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="email" placeholder="Email">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="direccion" placeholder="Dirección">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="localidad" placeholder="Localidad">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="number" class="form-control bg-transparent" name="cp" placeholder="CP">
          </div>
        </div>
      </div>
      <div class="row">
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
        <div class="col-md-3">
          <div class="form-group">
            <input type="number" class="form-control bg-transparent" name="telefono" placeholder="Teléfono">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="number" class="form-control bg-transparent" name="movil" placeholder="Móvil">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
          <select id="lnacimiento" class="form-control bg-transparent" name="lnacimiento">
            <option selected value="0">Lugar de nacimiento</option>
            <?php 
              foreach ($sel_provincias as $sel_prov => $abreviatura) {
                echo '<option value="' . $sel_prov . '">' . $abreviatura .'</option>';
              }
              ?>
          </select>
        </div>
        <div class="col-md-3">
          <div class="form-group" style="display:flex;">
            <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
            <?php $attributes = 'id="fnacimiento" name="fnacimiento" class="form-control" placeholder="Fecha de nacimiento"'; echo form_input('fnacimiento', set_value('fnacimiento'), $attributes); ?>          
          </div>
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
          <div class="form-group">
            <input type="number" class="form-control text-uppercase bg-transparent" name="ncolegiado" placeholder="Número de colegiado">
          </div>
        </div>
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
            <input type="checkbox" class="custom-control-input" name="sector" id="sector1">
            <label class="custom-control-label" for="sector1" value="0" style="color: #004987; font-weight:500;">Público</label>
            <input type="checkbox" class="custom-control-input" name="sector" id="sector2">
            <label class="custom-control-label" for="sector2" value="1" style="color: #004987; font-weight:500;">Privado</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group custom-control custom-radio text-uppercase pt-3">
            <label style="color: #004987; font-weight:500;">Solicita habitación</label>
            <input type="radio" class="custom-control-input" name="habitacion" id="habitacion1">
            <label class="custom-control-label" for="habitacion1" value="0" style="color: #004987; font-weight:500;">Sí</label>
            <input type="radio" class="custom-control-input" name="habitacion" id="habitacion2">
            <label class="custom-control-label" for="habitacion2" value="1" style="color: #004987; font-weight:500;">No</label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group custom-control custom-radio text-uppercase pt-3">
            <label style="color: #004987; font-weight:500;">Logopeda diplomado</label>
            <input type="radio" class="custom-control-input" name="diplomado" id="diplomado1">
            <label class="custom-control-label" for="diplomado1" value="0" style="color: #004987; font-weight:500;">Sí</label>
            <input type="radio" class="custom-control-input" name="diplomado" id="diplomado2">
            <label class="custom-control-label" for="diplomado2" value="1" style="color: #004987; font-weight:500;">No</label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group custom-control custom-radio text-uppercase pt-3">
            <label style="color: #004987; font-weight:500;">Bolsa de trabajo</label>
            <input type="radio" class="custom-control-input" name="bolsa" id="bolsa1">
            <label class="custom-control-label" for="bolsa1" value="0" style="color: #004987; font-weight:500;">Sí</label>
            <input type="radio" class="custom-control-input" name="bolsa" id="bolsa2">
            <label class="custom-control-label" for="bolsa2" value="1" style="color: #004987; font-weight:500;">No</label>
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
        <div class="col-md-3">
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
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group custom-control custom-radio text-uppercase pt-3">
            <label style="color: #004987; font-weight:500;">Paga inscripción</label>
            <input type="radio" class="custom-control-input" name="inscripcion" id="inscripcion1">
            <label class="custom-control-label" for="habitacion1" value="0" style="color: #004987; font-weight:500;">Sí</label>
            <input type="radio" class="custom-control-input" name="inscripcion" id="inscripcion2">
            <label class="custom-control-label" for="habitacion2" value="1" style="color: #004987; font-weight:500;">No</label>
          </div>
        </div>
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
        <div class="col-md-3">
          <div class="form-group custom-control custom-radio text-uppercase pt-3">
            <label style="color: #004987; font-weight:500;">¿Está colegiado?</label>
            <input type="radio" class="custom-control-input" name="colegiadoactual" id="colegiadoactual1">
            <label class="custom-control-label" for="bolsa1" value="0" style="color: #004987; font-weight:500;">Sí</label>
            <input type="radio" class="custom-control-input" name="colegiadoactual" id="colegiadoactual2">
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
