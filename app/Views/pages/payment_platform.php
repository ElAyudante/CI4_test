
<?php

// Se incluye la librería
include 'api/apiRedsys.php';
// Se crea Objeto
$miObj = new RedsysAPI;

// Valores de entrada que no hemos cmbiado para ningun ejemplo
$fuc="036421808";
$terminal="1";
$moneda="978";
$trans="0";
$url="";
$urlOKKO="http://localhost/ApiPhpRedsys/ApiRedireccion/redsysHMAC256_API_PHP_7.0.0/ejemploRecepcionaPet.php";
$id=time();
$amount="145";	

// Se Rellenan los campos
$miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
$miObj->setParameter("DS_MERCHANT_ORDER",$id);
$miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$fuc);
$miObj->setParameter("DS_MERCHANT_CURRENCY",$moneda);
$miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$trans);
$miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
$miObj->setParameter("DS_MERCHANT_MERCHANTURL",$url);
$miObj->setParameter("DS_MERCHANT_URLOK",$urlOKKO);
$miObj->setParameter("DS_MERCHANT_URLKO",$urlOKKO);

//Datos de configuración
$version="HMAC_SHA256_V1";
$kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';//Clave recuperada de CANALES
// Se generan los parámetros de la petición
$request = "";
$params = $miObj->createMerchantParameters();
$signature = $miObj->createMerchantSignature($kc);
?>

<div class="container mt-5">
<div class="card-deck mb-3 text-center">
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="<?=base_url(),'/'?>assets/images/png/curso.gif" alt="Imagen tasas">
        <div class="card-body">
            <h5 class="card-title">Tasas</h5>
            <form name="frm" action="https://sis-t.redsys.es:25443/sis/realizarPago" method="POST" target="_blank">
                <input type="text" name="Ds_SignatureVersion" value="<?php echo $version; ?>" style="display:none;"/>
                <input type="text" name="Ds_MerchantParameters" value="<?php echo $params; ?>" style="display:none;"/>
                <input type="text" name="Ds_Signature" value="<?php echo $signature; ?>" style="display:none;"./>
                <input type="submit" class="btn-primary" value="Enviar" >
            </form>
        </div>
    </div>
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="<?=base_url(),'/'?>assets/images/png/curso.gif" alt="Imagen tasas">
        <div class="card-body">
            <h5 class="card-title">Tasas</h5>
            <form name="frm" action="https://sis-t.redsys.es:25443/sis/realizarPago" method="POST" target="_blank">
                <input type="text" name="Ds_SignatureVersion" value="<?php echo $version; ?>" style="display:none;"/>
                <input type="text" name="Ds_MerchantParameters" value="<?php echo $params; ?>" style="display:none;"/>
                <input type="text" name="Ds_Signature" value="<?php echo $signature; ?>" style="display:none;"./>
                <input type="submit" class="btn-primary" value="Enviar" >
            </form>
        </div>
    </div>
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="<?=base_url(),'/'?>assets/images/png/curso.gif" alt="Imagen tasas">
        <div class="card-body">
            <h5 class="card-title">Tasas</h5>
            <form name="frm" action="https://sis-t.redsys.es:25443/sis/realizarPago" method="POST" target="_blank">
                <input type="text" name="Ds_SignatureVersion" value="<?php echo $version; ?>" style="display:none;"/>
                <input type="text" name="Ds_MerchantParameters" value="<?php echo $params; ?>" style="display:none;"/>
                <input type="text" name="Ds_Signature" value="<?php echo $signature; ?>" style="display:none;"./>
                <input type="submit" class="btn-primary" value="Enviar" >
            </form>
        </div>
    </div>
</div>
</div>
