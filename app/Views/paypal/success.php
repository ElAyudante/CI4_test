<?php if(!empty($payments)){ ?>
    <h1 class="success">Se ha realizado el pago con éxito</h1>
    <h4>Información de pago</h4>
    <p><b>Número de referencia:</b> #<?php echo $payments['payment_id']; ?></p>
    <p><b>ID de la transacción:</b> <?php echo $payments['txn_id']; ?></p>
    <p><b>Cantidad abonada:</b> <?php echo $payments['payment_gross'].' '.$payments['currency_code']; ?></p>
    <p><b>Estado del pago:</b> <?php echo $payments['payment_status']; ?></p>
	
    <h4>Información del pagador</h4>
    <p><b>Nombre:</b> <?php echo $payments['user_id']; ?></p>
    <p><b>Email:</b> <?php echo $payments['payer_email']; ?></p>
	
    <h4>Información de la compra</h4>
    <p><b>Nombre:</b> <?php echo $products['name']; ?></p>
    <p><b>Precio:</b> <?php echo $products['price'].' '.$products['currency']; ?></p>
<?php }else{ ?>
    <h1 class="error">La transacción no se ha completado</h1>
    <a href="<?php echo base_url(),'/'; ?>">Volver a inicio</a>
<?php } ?>
