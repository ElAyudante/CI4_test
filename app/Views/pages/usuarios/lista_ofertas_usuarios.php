<?php
    $value= $_SESSION['user'];
?>

<section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>
        

		<div class="col-lg-10">
            <div class="row row-cols-3 g-4 p-5">
                <?php foreach ($data as $oferta){
                ?>
                    <div class="col">
                        <div class="card cards-users-empleo">
                            <div class="row g-0">
                                <div class="col-lg-4 m-auto">
                                    <a href="" target="_blank" class="text-decoration-none">
                                        <img class="img-fluid p-3 bg-white" src="<?php echo base_url(),'/'; ?>assets/images/png/empleo.gif">
                                    </a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body doc_user_job">
                                        <h4 class="fw-bold cblue text-uppercase"><?= $oferta['Ofrece']?> </h4>
                                        <ul class="objetivos list-unstyled mb-0">
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