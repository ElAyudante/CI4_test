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
                <?php foreach ($data as $curso){
                ?>
                    <div class="col">
                        <div class="card cards-users-empleo">
                            <div class="row g-0">
                                <div class="col-lg-4 m-auto">
                                    <div class="text-center">
                                        <img  class="img-fluid" src="<?php echo base_url(),'/'; ?>assets/images/png/cursos.gif">
                                        <h4 class="fw-bold cblue text-uppercase"><?= $curso['Fecha']?> </h4>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body doc_user h-100 text-center">
                                        <h5 class="fw-bold cblue text-uppercase"><?= $curso['Nombre']?> </h5>
                                        <div class="row row-cols-lg-2">
                                            <div class="col"><p><?= $curso['Formato']?> </p></div>
                                            <div class="col"><p><?= $curso['Duracion'] . ' horas'?> </p></div>
                                            <div class="col"><p><?= $curso['HorarioInicio']?> </p></div>
                                            <div class="col"><p><?= $curso['HorarioFin']?> </p></div>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-primary btn-block btn-acceso text-uppercase"><a class="text-white text-decoration-none" href="">Ver</a></button>
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