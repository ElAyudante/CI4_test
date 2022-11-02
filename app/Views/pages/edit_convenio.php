<section class="junta">

  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
		<?php echo form_open('/itemCRUD/update_convenio'); ?>
			<div class="row">
			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Alta Convenio</h3>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="empresa" value="<?=$item->empresa?>" autofocus>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="web" value="<?=$item->web?>" autofocus>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="codigo" value="<?=$item->codigo?>" autofocus>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" class="form-control" name="descripcion" value="<?=$item->descripcion?>" autofocus>
                </div>
            </div>

             
            <div class="row">
                <div class="col-md-3 mb-5">
                    <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
                </div>
                <input name = "id" type = "hidden" value="<?php echo $item->id; ?>">
            </div>
        <?php echo form_close(); ?>
	</div>
</section>


