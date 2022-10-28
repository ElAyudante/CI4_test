
<head>
    <script src="https://sis-t.redsys.es:25443/sis/NC/sandbox/redsysV2.js"></script>
</head>

<body>
    <!--
    <div id="card-form" class="mt-4"> </div>
    <form name="datos">
        <input type="hidden" id="token"></input>
        <input type="hidden" id="errorCode"></input>
        <a href="javascript:alert(document.datos.token.value + '--' + document.datos.errorCode.value)"> ver</a>
    </form>
    -->
    <div class="row m-auto" style="width:600px">
        <div id="content" class="col-lg-12">
        <?php
        $error = false;
        $amount = false;

        if (isset($_GET['error']))
            $error = $_GET['error'];

        if (isset($_GET['amount']))
            $amount = $_GET['amount'];

        if (isset($_POST['submitPayment'])) {
            
            $amount = $_POST['amount']; 
            
            if (!is_numeric($amount)) {
                
            }
            
            include "api/apiRedsys.php";  
            $miObj = new RedsysAPI;

            //$url_tpv = 'https://sis.redsys.es/sis/realizarPago';
            $url_tpv = 'https://sis-t.redsys.es:25443/sis/realizarPago';
            $version = "HMAC_SHA256_V1"; 
            $clave = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; //poner la clave SHA-256
            $name = 'TU NOMBRE'; //cambiar este dato
            $code = 'TU CODIGIO DE COMERCIO'; //cambiar este dato
            $terminal = '1';
            $order = date('ymdHis');
            $amount = $amount * 100;
            $currency = '978';
            $consumerlng = '001';
            $transactionType = '0';
            $urlMerchant = 'https://www.jose-aguilar.com/scripts/php/redsys-pago-con-tarjeta/'; //cambiar este dato
            $urlweb_ok = 'https://www.jose-aguilar.com/scripts/php/redsys-pago-con-tarjeta/tpv_ok.php'; //cambiar este dato
            $urlweb_ko = 'https://www.jose-aguilar.com/scripts/php/redsys-pago-con-tarjeta/tpv_ko.php'; //cambiar este dato

            $miObj->setParameter("DS_MERCHANT_AMOUNT", $amount);
            $miObj->setParameter("DS_MERCHANT_CURRENCY", $currency);
            $miObj->setParameter("DS_MERCHANT_ORDER", $order);
            $miObj->setParameter("DS_MERCHANT_MERCHANTCODE", $code);
            $miObj->setParameter("DS_MERCHANT_TERMINAL", $terminal);
            $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE", $transactionType);
            $miObj->setParameter("DS_MERCHANT_MERCHANTURL", $urlMerchant);
            $miObj->setParameter("DS_MERCHANT_URLOK", $urlweb_ok);      
            $miObj->setParameter("DS_MERCHANT_URLKO", $urlweb_ko);
            $miObj->setParameter("DS_MERCHANT_MERCHANTNAME", $name); 
            $miObj->setParameter("DS_MERCHANT_CONSUMERLANGUAGE", $consumerlng);    

            $params = $miObj->createMerchantParameters();
            $signature = $miObj->createMerchantSignature($clave);
            ?>
            <form id="realizarPago" action="<?php echo $url_tpv; ?>" method="post">
                <input type='hidden' name='Ds_SignatureVersion' value='<?php echo $version; ?>'> 
                <input type='hidden' name='Ds_MerchantParameters' value='<?php echo $params; ?>'> 
                <input type='hidden' name='Ds_Signature' value='<?php echo $signature; ?>'> 
            </form>
            <p>Un momento por favor...</p>
            <script>
            $(document).ready(function () {
                $("#realizarPago").submit();
            });
            </script>
        <?php
        }
        else {   
        ?>
    <div class="jumbotron">
        <h3>Formulario de pago</h3>
        <form class="form-amount" action="index.php" method="post">
            <?php if ($error) { ?><div class="alert alert-danger">El valor introducido no es correcto. Debe introducir por ejemplo: 50.99</div><?php } ?>
            <div class="form-group">
            <label for="amount">Nombre</label>
            <input type="text" id="amount" name="amount" class="form-control"<?php if ($amount) { ?> value="<?php echo $_POST['Nombre']; ?>"<?php }else{ ?> placeholder="Por ejemplo: 50.00"<?php } ?>>
                <label for="amount">Importe</label>
                <input type="text" id="amount" name="amount" class="form-control"<?php if ($amount) { ?> value="<?php echo $amount; ?>"<?php }else{ ?> placeholder="Por ejemplo: 50.00"<?php } ?>>
            </div>
            <input class="btn btn-lg btn-primary btn-block" name="submitPayment" type="submit" value="Pagar">
        </form> 
    </div>    
    <?php
    }
    ?>
        </div>
    </div>
    

    <script>
        function merchantValidationEjemplo() {
            //Insertar validaciones…
            alert("Esto son validaciones propias");
            return true;
        }
 
            window.addEventListener("message", function receiveMessage(event) {
                storeIdOper(event, "token", "errorCode", merchantValidationEjemplo);
            });



        function pedido() {
            return "pedido" + Math.floor((Math.random() * 1000) + 1);
        }
        getInSiteForm('card-form', '', '', '', '', 'Pagar', '999008881', '1', pedido(), 'ES', true);

    </script>
</body>
