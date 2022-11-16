<?php
$form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'',];
?>

<section class="bg-gray">

  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
            <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Responder Reclamación</h3>
            <?php echo form_open('/itemCRUD/responder_reclamacion', $form_att); ?>

			<div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
                
                <div class="col">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" class="form-control" name="nombre" value="<?=$item->Nombre?>" autofocus disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Apellidos:</strong>
                        <input type="text" class="form-control" name="apellidos" value="<?=$item->Apellidos?>" autofocus disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" class="form-control" name="email" value="<?=$item->Email?>" autofocus disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Asunto:</strong>
                        <input type="text" class="form-control" name="asunto" value="<?=$item->Asunto?>" placeholder="Asunto" autofocus disabled>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <strong>Mensaje:</strong>
                        <textarea type="text"  style="min-height: 300px" class="form-control" name="Comentarios"autofocus disabled> <?= $item->Comentarios?></textarea>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <strong>Respuesta:</strong>
                        <textarea type="text" style="min-height: 100px" oninput="auto_grow(this)" class="form-control h-100" name="mirespuesta" value="" autofocus> <?=$item->MiRespuesta?> </textarea>
                    </div>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Responder</button>
                </div>
                <input name = "id" type = "hidden" value="<?php echo $item->Id; ?>"> <!-- NO TOCAR -->
            </div>

            <?php echo form_close(); ?>
        </div>
	</div>
</section>

<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }

</script>


