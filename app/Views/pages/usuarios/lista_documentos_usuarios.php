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
                                            <div class="col-lg-8 d-flex align-items-center bg-white">
                                                <div class="card-body">
                                                    <h5 class="curso-tittle cblue text-uppercase mb-4 documento-truncate"><?= $documento['Nombre']?> </h5>
                                                    <ul class="objetivos">
                                                        <p><?= $documento['Descripcion']?> </p>
                                                    </ul>
                                                    <button type="button" class="btn btn-primary btn-block btn-acceso text-uppercase"><a class="text-white text-decoration-none" href="<?php echo base_url(); ?>/users/files/download/<?php echo $name ?>">Descargar</a></button>
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