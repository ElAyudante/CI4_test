<?php
    $value= $_SESSION['user'];
?>

<section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>
        

		<div class="col-lg-10 d-flex flex-row flex-wrap">
            <div class="row row-cols-2 g-4 p-5">
                <?php foreach ($data as $oferta){
                ?>

                    <div class="col">
                                    <div class="card bg-transparent w-auto cards-users-empleo">
                                        <div class="row g-0">
                                            <div class="col-lg-4 d-flex justify-content-center">
                                                <a href="" target="_blank" class="text-decoration-none">
                                                    <img class="img-fluid p-3 bg-white" src="<?php echo base_url(),'/'; ?>assets/images/png/imago_twoblues.png">
                                                </a>
                                            </div>
                                            <div class="col-lg-8 d-flex align-items-center bg-white">
                                                <div class="card-body">
                                                    <h5 class="curso-tittle cblue text-uppercase mb-4"><?= $oferta['Ofrece']?> </h5>
                                                    <ul class="objetivos">
                                                        <li><p><b>Empresa: </b><?= $oferta['Empresa']?> </p></li>
                                                        <li><p><b>Lugar: </b><?= $oferta['Lugar']?> </p></li>
                                                        <li><p><b>Condiciones: </b><?= $oferta['Condiciones']?> </p></li>
                                                        <li><p><b>Contacto: </b><?= $oferta['Contacto']?> </p></li>
                                                    </ul>
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