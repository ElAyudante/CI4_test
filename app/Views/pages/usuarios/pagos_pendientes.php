<?php
    $value= $_SESSION['user'];
?>
<?php

// Se incluye la librería
include 'api/apiRedsys.php';
// Se crea Objeto
$miObj = new RedsysAPI;

?>
<section class="bg-gray" style="height: 80vh">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>
        
		<div class="col-lg-10 text-center d-flex flex-row">
        <?php foreach ($data as $pago){
            // Valores de entrada que no hemos cmbiado para ningun ejemplo
                $fuc="036421808";
                $terminal="1";
                $moneda="978";
                $trans="0";
                $url=base_url();
                $urlOK=base_url('users/tramitar_pago_ok/'.$pago['ID']);
                $urlKO=base_url('users/tramitar_pago_ko');
                $id=time();
                $amount='1';	

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
            <h3 class="p-3 text-white text-uppercase fs-2 bg-blue fw-bold mb-0 text-center">Pago Pendiente</h3>
                <?php echo form_open("https://sis-t.redsys.es:25443/sis/realizarPago"); ?>
				<div class="row row-cols-1">
                    <div class="col form-border p-3 bg-white mb-0">
                        <p class="cblue text-uppercase"><b>Nº Colegiado: </b><input class="border-0" type="text" name="numColegiado" value="<?= $pago['NumColegiado']?>" disabled></p>
                        <p class="cblue text-uppercase"><b>Nombre: </b><input class="border-0" type="text" name="Nombre" value="<?= $pago['Nombre'].' '. $pago['Apellidos']?>" disabled></p>
                        <p class="cblue text-uppercase"><b>Transacción: </b><input class="border-0" type="text" name="Transaccion" value="<?= $pago['Transaccion']?>" disabled></p>
                        <p class="cblue text-uppercase"><b>Cantidad: </b><input class="border-0" type="text" name="Cantidad" value="<?= $pago['Cantidad']?>" disabled></p>
                        <input type="text" name="Ds_SignatureVersion" value="<?php echo $version; ?>" style="display:none;"/>
                        <input type="text" name="Ds_MerchantParameters" value="<?php echo $params; ?>" style="display:none;"/>
                        <input type="text" name="Ds_Signature" value="<?php echo $signature; ?>" style="display:none;"./>
                    </div>
                    <div class="form-border p-3 bg-white mb-0">   
                        <div class="col-md d-flex justify-content-center">
                            <button type="submit" name="submitPayment" class="btn btn-primary btn-block btn-acceso text-uppercase">Realizar Pago</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>
			</div>
            <?php }; ?>
		</div>
        
        

	</div>
</section>