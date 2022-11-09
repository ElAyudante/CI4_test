<?php
    $value= $_SESSION['user'];

    $form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'',];
?>
<section class="bg-gray" style="height: 80vh">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>
        
		<div class="col-lg-10 text-center">
        <?php foreach ($data as $convenio){
        ?>
			<div class="row row-cols-4 g-4 p-5">
                <div class="col">
                    <h3 class="p-3 text-white text-uppercase fs-2 bg-blue mb-0 text-center"><?= $convenio['empresa']?> </h3>
                    <div class="form-border p-3 bg-white mb-0">
                        <p class="cblue text-uppercase"><b>Código: </b><?= $convenio['codigo'] ?> </p>
                        <p class="cblue text-uppercase"><?= $convenio['descripcion']?> </p>
                        <p class="cblue text-uppercase"><a href="<?= $convenio['web']?>"><?= $convenio['web']?> </a></p>
                        <div class="">   
                            <div class="d-flex justify-content-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php }; ?>
		</div>
	</div>
</section>