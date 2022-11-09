<?php
    $value= $_SESSION['user'];
    $textBoton = 'Solicitar Cambio';
?>

<section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>
        

		<div class="col-lg-10">
            <div class="row row-cols-3 g-4 p-5">
                <?php foreach ($data as $reclamacion){
                    $date = $reclamacion['Fecha'];
                    $fecha = date("d/m/Y", strtotime($date));
                ?>
                    <div class="col">
                        <div class="card cards-users-empleo" style="min-height: 280px; max-height:280px">
                            <div class="row g-0">
                                <div class="col-lg-4 m-auto">
                                    <div class="text-center">
                                        <img class="img-fluid" src="<?php echo base_url(),'/'; ?>/assets/images/png/reclamacion.gif">
                                        <h4 class="fw-bold cblue text-uppercase"><?= $fecha?> </h4>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body doc_user h-100 text-center">
                                        <h6 class="fw-bold cblue text-uppercase"><?= $reclamacion['Asunto']?> </h6>
                                        <div>
                                            <ul class="objetivos p-0">
                                                <p>Estado: <?= $reclamacion['Estado']?> </p>
                                            </ul>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-primary btn-block btn-acceso text-uppercase"><a class="text-white text-decoration-none" href="<?php echo base_url('users/reclamaciones'). '/' .$reclamacion['Id']; ?>">Responder</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }; ?>
            </div>
        </div>
	</div>
</section>