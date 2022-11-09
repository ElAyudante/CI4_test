<?php
    $value= $_SESSION['user'];

    $form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'',];
?>
<?php
    include "api/apiRedsys.php";  
    $miObj = new RedsysAPI;
?>
<section class="bg-gray" style="height: 80vh">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>
        
		<div class="col-lg-10 text-center">
        <?php foreach ($data as $pago){
            $date = $pago['Fecha'];
            $fecha = date("d/m/Y", strtotime($date));
        ?>
			<div class="row row-cols-4 g-4 p-5">
                <div class="col">
                    <h3 class="p-3 text-white text-uppercase fs-2 bg-blue mb-0 text-center"><i class="fa-solid fa-calendar me-3"></i><?= $fecha ?></h3>
                    <div class="form-border p-3 bg-white mb-0">
                        <p class="cblue text-uppercase"><b>Nº Colegiado: </b><?= $pago['NumColegiado']?> </p>
                        <p class="cblue text-uppercase"><b>Nombre: </b><?= $pago['Nombre']. ' '. $pago['Apellidos'] ?> </p>
                        <p class="cblue text-uppercase"><b>Transacción: </b><?= $pago['Transaccion']?> </p>
                        <p class="cblue text-uppercase"><b>Cantidad: </b><?= $pago['Cantidad']. ' Euros'?> </p>
                        <div class="">   
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase w-auto"><a class="text-white text-decoration-none" href="<?php echo base_url(); ?>/files/download/<?php echo $pago['Factura'] ?>">Descargar Factura</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php }; ?>
		</div>
	</div>
</section>