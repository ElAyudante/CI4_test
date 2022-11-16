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
            <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Alta oferta (Admin)</h3>
		    <?php echo form_open('/itemCRUD/store_empleo', $form_att); ?>

			<div class="row row-cols-lg-2 g-lg-4 cblue text-uppercase">
			
            <div class="col">
                <div class="form-group">
                    <strong>Nombre de la Empresa:</strong>
                    <input type="text" class="form-control" name="empresa" placeholder="Empresa" autofocus>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Lugar de la Empresa:</strong>
                    <input type="text" class="form-control" name="lugar" placeholder="Lugar" autofocus>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Contacto de la Empresa:</strong>
                    <input type="text" class="form-control" name="contacto" placeholder="Contacto" autofocus>
                </div>
            </div>

            <div class="col d-flex align-items-center">
                <div class="col text-uppercase d-flex align-items-center">
                    <label class="fw-bold me-3">Activo:</label>
                    <div class="form-check form-check-inline me-2 mb-0">
                        <input class="form-check-input" type="radio" name="activos" id="activo1" value="1" checked>
                        <label class="form-check-label" for="activo1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline me-2 mb-0">
                        <input class="form-check-input" type="radio" name="activos" id="activo2" value="0">
                        <label class="form-check-label" for="activo2">No</label>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <strong>Servicios:</strong>
                    <textarea type="text" class="form-control" name="ofrece" placeholder="Ofrece"></textarea>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <strong>Condiciones:</strong>
                    <textarea type="text" class="form-control" name="condiciones" placeholder="Condiciones"></textarea>
                </div>
            </div>

            <div class="col">
                    <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
            </div>
             
        <?php echo form_close(); ?>
	</div>
</section>


