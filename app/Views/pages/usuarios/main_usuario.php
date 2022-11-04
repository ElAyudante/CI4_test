<?php 
	$value = $_SESSION['user'];
?>
<section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?>
		</div>

		<div class="col-lg-10 text-center">
			<div class="contrainer p-5">
				<h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0"><img style="width: 60px;" class="img-fluid" src="<?php echo base_url(),'/'; ?>/assets/images/png/logo_white.svg"> ¡Bienvenido/a a tu área personal, <?= $value['Nombre'] ?>!</h3>
				<div class="d-flex justify-content-center form-border p-3 bg-white mb-0">
					<img class="img-fluid w-25" src="<?php echo base_url(),'/'; ?>/assets/images/png/hola.gif">
					<h1 class="text-uppercase d-flex align-items-center cblue fw-bold">¿Qué quieres hacer hoy?</h1>
				</div>
			</div>
		</div>

	</div>
</section>
