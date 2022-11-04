<?php
    $value= $_SESSION['user'];
?>
<section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>
        
		<div class="col-lg-10 text-center d-flex flex-row">
        <?php foreach ($data as $pago){
        ?>
			<div class="contrainer p-5 col-lg-4">
				<h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0 text-center"><img style="width: 60px;" class="img-fluid"> Pago Pendiente</h3>
                <?php echo form_open("/users/payment_platform/{$pago['ID']}"); ?>
                <div class="d-flex flex-column justify-content-center form-border p-3 bg-white mb-0">
                    <p><b>Nº Colegiado: </b><?= $pago['NumColegiado']?> </p>
                    <p><b>Nombre: </b><?= $pago['Nombre']. ' '. $pago['Apellidos'] ?> </p>
                    <p><b>Transacción: </b><?= $pago['Transaccion']?> </p>
                    <p><b>Cantidad: </b><?= $pago['Cantidad']. ' Euros'?> </p>
                </div>
                <div class="d-flex flex-column justify-content-center form-border p-3 bg-white mb-0">   
					<div class="col-md d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Realizar Pago</button>
                    </div>
				</div>
                
                <?php echo form_close(); ?>
			</div>
            <?php }; ?>
		</div>
        
        

	</div>
</section>