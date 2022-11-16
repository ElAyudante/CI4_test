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
          <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Editar Oferta de Empleo</h3>
          <?php echo form_open('/itemCRUD/update_empleo', $form_att) ?>

            <div class="row row-cols-lg-2 g-lg-4 cblue text-uppercase">
    
              <div class="col">
                <div class="form-group">
                  <strong>Nombre de la Empresa:</strong>
                  <input type="text" class="form-control" name="empresa" value="<?=$item->Empresa;?>" autofocus>
                </div>
              </div>
              
              <div class="col">
                <div class="form-group">
                  <strong>Lugar de la Empresa:</strong>
                  <input type="text" class="form-control" name="lugar" value="<?=$item->Lugar?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Contacto de la Empresa:</strong>
                  <input type="text" class="form-control bg-transparent" name="contacto" value="<?= $item->Contacto?>">
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
                  <input type="text" class="form-control bg-transparent" name="ofrece" value="<?= $item->Ofrece?>" style="height:100px">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Condiciones:</strong>
                  <input type="text" class="form-control bg-transparent" name="condiciones" value="<?= $item->Condiciones?>" style="height:100px">
                </div>
              </div>

              <div class="col"></div>
              <div class="col"></div>

              <div class="col">
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
              </div>

            </div>

            <input name = "id" type = "hidden" value="<?php echo $item->ID; ?>">
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</section>