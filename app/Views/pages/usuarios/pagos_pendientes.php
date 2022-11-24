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
        
		<div class="col-lg-10 text-center d-flex flex-row">

        <?php 
            if(empty($data)){

            
        ?>
            <div class="container p-5 d-flex align-items-center w-50">
                <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0"><img style="width: 60px;" class="img-fluid me-3" src="<?php echo base_url(),'/'; ?>/assets/images/png/logo_white.svg">Actualmente no tiene pagos pendientes a su nombre</h3>
            </div>

        <?php 
            } else {
        
        foreach ($data as $pago){
            // Valores de entrada que no hemos cmbiado para ningun ejemplo
                $fuc="036421808";
                $terminal="1";
                $moneda="978";
                $trans="0";
                $url=base_url();
                $urlOK=base_url('users/tramitar_pago_ok/'.$pago['ID']);
                $urlKO=base_url('users/tramitar_pago_ko');
                $id=time();
                $amount=$pago['Cantidad']*100;	

                // Se Rellenan los campos
                $miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
                $miObj->setParameter("DS_MERCHANT_ORDER",$id);
                $miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$fuc);
                $miObj->setParameter("DS_MERCHANT_CURRENCY",$moneda);
                $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$trans);
                $miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
                $miObj->setParameter("DS_MERCHANT_MERCHANTURL",$url);
                $miObj->setParameter("DS_MERCHANT_URLOK",$urlOK);
                $miObj->setParameter("DS_MERCHANT_URLKO",$urlKO);

                //Datos de configuración
                $version="HMAC_SHA256_V1";
                $kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';//Clave recuperada de CANALES
                // Se generan los parámetros de la petición
                $request = "";
                $params = $miObj->createMerchantParameters();
                $signature = $miObj->createMerchantSignature($kc);
        ?>
			<div class="contrainer p-5">
            <h3 class="p-3 text-white text-uppercase fs-2 bg-blue  mb-0 text-center">Pago Pendiente</h3>
                <?php echo form_open('https://sis-t.redsys.es:25443/sis/realizarPago', $form_att); ?>
				<div class="row row-cols-1 ">
                    <div class="col">
                        <p class="cblue text-uppercase"><b>Nº Colegiado: </b><?= $pago['NumColegiado']?> </p>
                        <p class="cblue text-uppercase"><b>Nombre: </b><?= $pago['Nombre']. ' '. $pago['Apellidos'] ?> </p>
                        <p class="cblue text-uppercase"><b>Transacción: </b><?= $pago['Transaccion']?> </p>
                        <p class="cblue text-uppercase"><b>Cantidad: </b><?= $pago['Cantidad']. ' Euros'?> </p>
                        <input type='hidden' name='Ds_SignatureVersion' value='<?php echo $version; ?>'> 
                        <input type='hidden' name='Ds_MerchantParameters' value='<?php echo $params; ?>'> 
                        <input type='hidden' name='Ds_Signature' value='<?php echo $signature; ?>'>
                    </div>
                    <div class="">   
                        <div class="col-md d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Realizar Pago</button>
                        </div>
                    </div>
                    
                    <?php echo form_close(); ?>

                </div>
			</div>
            <?php }}; ?>
		</div>
	</div>
</section>