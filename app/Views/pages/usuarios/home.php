<section class="presentacion p-5 text-left mb-5">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Bienvenid@ 
					<?php $value = $this->session->userdata('user');
					echo $value['Nombre']?></h1>
            </div>
        </div>
    </div>
</section>

<section class="app">
	<div class="container-fluid">
		<div class="col-lg-2 ps-0">
		<?php echo view('templates/menu_usuarios'); ?> 
		</div>
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 mt-4">
			<h1>¡Bienvenido a tu área personal!</h1>
			<h3>¿Qué quieres hacer hoy?</h3>
		</div>
	</div>
</section>