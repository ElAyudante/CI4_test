<section class="junta">

  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
		<?php echo form_open('/itemCRUD/store_convenio'); ?>
			<div class="row">
			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Alta Convenio</h3>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="empresa" placeholder="Empresa" autofocus>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="web" placeholder="Web" autofocus>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="codigo" placeholder="Código" autofocus>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <textarea type="text" class="form-control" name="descripcion" placeholder="Descripción"></textarea>
                </div>
            </div>

             
            <div class="row">
                <div class="col-md-3 mb-5">
                    <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
                </div>
            </div>
        <?php echo form_close(); ?>
	</div>
</section>


