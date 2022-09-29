<section class="junta">

  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
          <?php  ?>

          <?php echo form_open('/itemCRUD/update_empleo'); ?>
            <div class="row">
              <?php
                /*if ($this->session->flashdata('errors')){
                  echo '<div class="alert alert-danger">';
                  echo $this->session->flashdata('errors');
                  echo "</div>";
                }*/
              ?>

            <h3 style="color: #004987; text-transform: uppercase; font-size:3em">Editar Oferta de Empleo</h3>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control" name="empresa" value="<?=$item->Empresa;?>" autofocus>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control" name="lugar" value="<?=$item->Lugar?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="contacto" value="<?= $item->Contacto?>">
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
            </div>
            <div class="row">
              
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="ofrece" value="<?= $item->Ofrece?>" style="height:100px">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="condiciones" value="<?= $item->Condiciones?>" style="height:100px">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</section>