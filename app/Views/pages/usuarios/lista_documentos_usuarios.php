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
                <?php foreach ($data as $documento){
                    $name = $documento['Archivo'];
                    
                ?>
                    <div class="col">
                        <div class="card bg-transparent w-auto cards-users-empleo">
                            <div class="row g-0">
                                <div class="col-lg-4 d-flex justify-content-center">
                                    <a href="" target="_blank" class="text-decoration-none">
                                        <img  class="img-fluid p-3 bg-white" src="<?php echo base_url(),'/'; ?>assets/images/png/imago_twoblues.png">
                                    </a>
                                </div>
                                <div class="col-lg-8 bg-white">
                                    <div class="card-body doc_user h-100">
                                        <h5 class="fw-bold cblue text-uppercase"><?= $documento['Nombre']?> </h5>
                                        <div>
                                            <ul class="objetivos p-0">
                                                <p><?= $documento['Descripcion']?> </p>
                                            </ul>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-primary btn-block btn-acceso text-uppercase"><a class="text-white text-decoration-none" href="<?php echo base_url(); ?>/files/download/<?php echo $name ?>">Descargar</a></button>
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