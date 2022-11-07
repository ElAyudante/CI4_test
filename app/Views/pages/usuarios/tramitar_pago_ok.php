<?php
  include_once 'api/apiRedsys.php'; 

  $miObj = new RedsysAPI; 
  
  $version = $_GET["Ds_SignatureVersion"]; 
  $params = $_GET["Ds_MerchantParameters"]; 
  $signatureRecibida = $_GET["Ds_Signature"]; 

  $decodec = $miObj->decodeMerchantParameters($params); 

  $codigoRespuesta = $miObj->getParameter("Ds_Response"); 

  $claveModuloAdmin = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; 
  $signatureCalculada = $miObj->createMerchantSignatureNotif($claveModuloAdmin, $params); 

  if ($signatureCalculada === $signatureRecibida) { 
   $Controller->verificar_pago($Id);
   
}
?>

  <section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>
        
		<div class="col-lg-10 text-center d-flex flex-row flex-wrap">
        <div>
            <p>Se ha realizado el pago correctamente.</p>
            <button type="button" class="btn btn-primary btn-block btn-acceso text-uppercase text-white"><a class="text-white text-decoration-none" href="<?php echo base_url('users/pagos_realizados'); ?>">Volver</a></button>
        </div>
		</div>
        
        

	</div>
</section>