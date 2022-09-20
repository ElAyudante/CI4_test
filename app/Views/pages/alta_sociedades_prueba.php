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
                <h1 class="mb-3 title-main align-middle text-uppercase">Alta sociedades</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta app" style="margin-top: 2.1em; margin-bottom: -5.1em; height: auto;">
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

    <div class="container" style="width: 70%; padding:0; margin-right:2em; margin-top: -60em;">
		<?php  ?>

		<?php echo form_open('users/register_sociedad'); ?>
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
			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Alta sociedad</h3>
        <div class="col-md-3">
					<div class="form-group">
						<input type="text" class="form-control" name="colegiado" placeholder="Nº colegiado" autofocus>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<input type="text" class="form-control" name="nif" placeholder="NIF/DNI/CIF" autofocus>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" name="sociedad" placeholder="Denominación social">
					</div>
				</div>
			</div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="direccion" placeholder="Dirección">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="poblacion" placeholder="Localidad">
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
        <div class="col-md-2">
          <div class="form-group">
            <input type="number" class="form-control bg-transparent" name="cp" placeholder="CP">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <input type="number" class="form-control bg-transparent" name="telefono" placeholder="Teléfono">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="number" class="form-control bg-transparent" name="fax" placeholder="Fax">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="email" placeholder="Email">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
          <select id="lnacimiento" type="text" class="form-control bg-transparent" name="registromercantil">
            <option selected value="0">Registro mercantil de </option>
            <?php 
              foreach ($sel_provincias as $sel_prov => $abreviatura) {
                echo '<option value="' . $sel_prov . '">' . $abreviatura .'</option>';
              }
              ?>
          </select>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="tiposociedad" placeholder="Tipo sociedad">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="capitalsocial" placeholder="Capital social">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="cuentabancaria" placeholder="Cuenta bancaria">
          </div>
        </div>
      </div>
      <div class="row" id="socio">
        <h3 style="color: #004987; text-transform: uppercase;">Socios de la sociedad profesional</h3>
        <div class="col-md-3">
          <div class="form-group">
            <input type="number" class="form-control bg-transparent" name="ncolegiado" placeholder="Nº Colegiado">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="nombre" placeholder="Nombre Completo">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="cargo" placeholder="Cargo">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="participacion" placeholder="Participación">
          </div>
        </div>
      </div>
      <div class="row">
				<div class="col-md-3 mb-5">
					<button type="button" onclick="add_socio()" class="btn btn-primary btn-block btn-acceso text-uppercase">Añadir socio</button>
				</div>
			</div>
      <div class="row" id="trabajador">
        <h3 style="color: #004987; text-transform: uppercase;">Trabajadores Logopedas</h3>
        <div class="col-md-6">
          <div class="form-group">
            <input type="number" class="form-control bg-transparent" name="ncolegiadoe" placeholder="Nº Colegiado">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="nombree" placeholder="Nombre Completo">
          </div>
        </div>
      </div>
      <div class="row">
				<div class="col-md-3 mb-5">
					<button type="button" onclick="add_trabajador()" class="btn btn-primary btn-block btn-acceso text-uppercase">Añadir trabajador</button>
				</div>
			</div>
      <div class="row" id="otro">
        <h3 style="color: #004987; text-transform: uppercase;">Otros socios</h3>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="dni" placeholder="DNI">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="nombreo" placeholder="Nombre Completo">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="cargoo" placeholder="Cargo">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control bg-transparent" name="participaciono" placeholder="Participación">
          </div>
        </div>
      </div>
      <div class="row">
				<div class="col-md-3 mb-5">
					<button type="button" onclick="add_otro()" class="btn btn-primary btn-block btn-acceso text-uppercase">Añadir otro socio</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 mb-5">
					<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
</section>

<script>

  function add_socio() {
    document.getElementById('socio').innerHTML += '<div class="row"><div class="col-md-3"><div class="form-group"><input type="number" class="form-control bg-transparent" name="ncolegiadoe" placeholder="Nº Colegiado"></div></div><div class="col-md-3"><div class="form-group"><input type="text" class="form-control bg-transparent" name="nombre" placeholder="Nombre Completo"></div></div><div class="col-md-3"><div class="form-group"><input type="text" class="form-control bg-transparent" name="cargo" placeholder="Cargo"></div></div><div class="col-md-3"><div class="form-group"><input type="text" class="form-control bg-transparent" name="participacion" placeholder="Participación"></div></div></div>'
  }

  function add_trabajador() {
    document.getElementById('trabajador').innerHTML += '<div class="row"><div class="col-md-6"><div class="form-group"><input type="number" class="form-control bg-transparent" name="ncolegiadoe" placeholder="Nº Colegiado"></div></div><div class="col-md-6"><div class="form-group"><input type="text" class="form-control bg-transparent" name="nombree" placeholder="Nombre Completo"></div></div></div></div>'
  }

  function add_otro() {
    document.getElementById('otro').innerHTML += '<div class="row"><div class="col-md-3"><div class="form-group"><input type="number" class="form-control bg-transparent" name="dni" placeholder="DNI"></div></div><div class="col-md-3"><div class="form-group"><input type="text" class="form-control bg-transparent" name="nombreo" placeholder="Nombre Completo"></div></div><div class="col-md-3"><div class="form-group"><input type="text" class="form-control bg-transparent" name="cargoo" placeholder="Cargo"></div></div><div class="col-md-3"><div class="form-group"><input type="text" class="form-control bg-transparent" name="participaciono" placeholder="Participación"></div></div></div>'
  }
</script>
