<?php

$value= $_SESSION['user'];

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
   $Controller->verificar_pago_curso($Id, $value);
   
   
}

?>

  <section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		  </div>
        
      <div class="col-lg-10 text-center">
        <div class="container p-5 w-50">
          <h3 class="p-3 text-white text-uppercase fs-2 bg-blue fw-bold mb-0"><img style="width: 60px;" class="img-fluid me-3" src="<?php echo base_url(),'/'; ?>/assets/images/png/logo_white.svg">¡Muchas Gracias, <?= $value['Nombre'] ?>!</h3>
          <div class="form-border p-3 bg-white mb-0">
              <img class="img-fluid w-25" src="<?php echo base_url(),'/'; ?>/assets/images/png/verificado.gif">
              <p class="cblue fw-bold text-uppercase">Se ha realizado el pago correctamente.</p>
              <button type="button" class="btn btn-primary btn-block btn-acceso text-uppercase text-white"><a class="text-white text-decoration-none" href="<?php echo base_url('users/home'); ?>">Volver</a></button>
          </div>
        </div>
      </div>
        
        

	</div>
</section>