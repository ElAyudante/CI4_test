<?php
    $value= $_SESSION['user'];
?>

<section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>
        
		<div class="col-lg-10 text-center d-flex flex-row flex-wrap">
        <?php foreach ($data as $oferta){
        ?>
			<div class="contrainer p-5 col-lg-3" >
				<h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0 text-center">Oferta</h3>

                <div class="d-flex flex-column justify-content-center form-border p-3 bg-white mb-0">
                    <p><b>Empresa: </b><?= $oferta['Empresa']?> </p>
                    <p><b>Lugar: </b><?= $oferta['Lugar']?> </p>
                    <p><b>Ofrece: </b><?= $oferta['Ofrece']?> </p>
                    <p><b>Condiciones: </b><?= $oferta['Condiciones']?> </p>
                    <p><b>Contacto: </b><?= $oferta['Contacto']?> </p>
                </div>
                <div class="d-flex flex-column justify-content-center form-border p-3 bg-white mb-0">   
					<div class="col-md d-flex justify-content-center mt-4">
                        <button type="button" class="btn btn-primary btn-block btn-acceso text-uppercase text-white"><a class="text-white" href="<?php echo base_url('users/empleo/'.$oferta['ID']); ?>">Ver oferta</a></button>
                    </div>
				</div>
			</div>
            <?php }; ?>
		</div>
        
        

	</div>
</section>