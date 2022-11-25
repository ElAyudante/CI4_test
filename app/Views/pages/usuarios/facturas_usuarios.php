<?php
    $value= $_SESSION['user'];

    $form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'',];
?>
<?php
    include "api/apiRedsys.php";  
    $miObj = new RedsysAPI;
?>
<section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>
        
		<div class="col-lg-10 text-center">
        <?php if(empty($data)){

            
        ?>
            <div class="container p-5 d-flex align-items-center w-50">
                <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0"><img style="width: 60px;" class="img-fluid me-3" src="<?php echo base_url(),'/'; ?>/assets/images/png/logo_white.svg">Actualmente no tiene facturas a su nombre</h3>
            </div>

        <?php 
            } else {
        
        foreach ($data as $pago){
            $date = $pago['Fecha'];
            $fecha = date("d/m/Y", strtotime($date));
        ?>
			<div class="row row-cols-4 g-4 p-5">
                <div class="col">
                    <h3 class="p-3 text-white text-uppercase fs-2 bg-blue mb-0 text-center"><i class="fa-solid fa-calendar-days me-3"></i><?= $fecha ?></h3>
                    <div class="form-border p-3 bg-white mb-0">
                        <p class="cblue text-uppercase"><b>Nº Colegiado: </b><?= $pago['NumColegiado']?> </p>
                        <p class="cblue text-uppercase"><b>Nombre: </b><?= $pago['Nombre']. ' '. $pago['Apellidos'] ?> </p>
                        <p class="cblue text-uppercase"><b>Transacción: </b><?= $pago['Transaccion']?> </p>
                        <p class="cblue text-uppercase"><b>Cantidad: </b><?= $pago['Cantidad']. ' Euros'?> </p>
                        <div class="">   
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase w-auto"><a class="text-white text-decoration-none" href="<?php echo base_url(); ?>/files/facturas/download/<?php echo $pago['Factura'] ?>">Descargar Factura</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php }}; ?>
		</div>
	</div>
</section>