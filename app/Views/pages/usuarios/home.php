<section class="presentacion p-5 text-left mb-5">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Bienvenido administrador</h1>
            </div>
        </div>
    </div>
</section>

<section class="app">
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
							<li><a href="<?php echo base_url(),'/'; ?>itemCRUD">Lista colegiados</a></li>
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
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 mt-4">
			<h1>¡Bienvenido al área del administrador!</h1>
			<h3>¿Qué quieres hacer hoy?</h3>
		</div>
	</div>
</section>