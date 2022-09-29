<section class="junta">

  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
		<?php echo form_open('/itemCRUD/store_empleo'); ?>
			<div class="row">
			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Alta oferta</h3>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="empresa" placeholder="Empresa" autofocus>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="lugar" placeholder="Lugar" autofocus>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="contacto" placeholder="Contacto" autofocus>
                </div>
            </div>
            <div class="col-md-3">
            <div class="form-group custom-control custom-radio text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">Activo</label>
                  <input type="radio" class="custom-control-input" value="1" name="activo" id="activo1">
                  <label class="custom-control-label" for="habitacion1" style="color: #004987; font-weight:500;">Sí</label>
                  <input type="radio" class="custom-control-input" value="0" name="activo" id="activo2">
                  <label class="custom-control-label" for="habitacion2"style="color: #004987; font-weight:500;">No</label>
                </div>
            </div>    
            <div class="col-md-6">
                <div class="form-group">
                    <textarea type="text" class="form-control" name="ofrece" placeholder="Ofrece"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea type="text" class="form-control" name="condiciones" placeholder="Condiciones"></textarea>
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


