
<section class="junta">

  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
		<?php echo form_open('/itemCRUD/responder_reclamacion'); ?>
			<div class="row">
                <h3 style="color: #004987; text-transform: uppercase; font-size:3em">Responder Reclamación</h3>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" value="<?=$item->Nombre?>" autofocus disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="apellidos" value="<?=$item->Apellidos?>" autofocus disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" value="<?=$item->Email?>" autofocus disabled>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" class="form-control" name="asunto" value="<?=$item->Asunto?>" placeholder="Asunto" autofocus disabled>
                    </div>
                </div>
            <div class="row">

            <div class="col-md-12">
                    <div class="form-group">
                        <textarea type="text"  style="min-height: 300px" class="form-control" name="Comentarios"autofocus disabled> <?= $item->Comentarios?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                    <div class="form-group">
                        <textarea type="text" style="min-height: 100px" oninput="auto_grow(this)" class="form-control" name="mirespuesta" value="" autofocus> <?=$item->MiRespuesta?> </textarea>
                    </div>
                </div>
            </div>

             
            <div class="row">
                <div class="col-md-3 mb-5">
                    <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Responder</button>
                </div>
                <input name = "id" type = "hidden" value="<?php echo $item->Id; ?>">
            </div>
        <?php echo form_close(); ?>
	</div>
</section>

<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }

</script>


