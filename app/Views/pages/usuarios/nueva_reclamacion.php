<?php
    $value = $_SESSION['user'];
    $form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'',];
?>

<section class="bg-gray">

  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_usuarios'); ?> <!-- MENU USUARIO.PHP -->
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
          <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Nueva Reclamación</h3>
          <?php echo form_open('users/crear_reclamacion',$form_att); ?>
            
            <div class="row row-cols-lg-4 g-lg-4 text-uppercase cblue">

              <div class="col">
                    <div class="form-group">
                        <strong for="nombre">Nombre:</strong>
                        <input type="text" class="form-control bg-gray" name="nombre" value="<?= $value['Nombre'] ?>" autofocus readonly>
                    </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <strong for="apellidos">Apellidos:</strong>
                      <input type="text" class="form-control bg-gray" name="apellidos" value="<?= $value['Apellidos'] ?>" readonly>
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <strong for="telefono">Teléfono:</strong>
                      <input type="text" class="form-control bg-gray" name="telefono" value="<?= $value['Telefono'] ?>" readonly>
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <strong for="email">Email:</strong>
                      <input type="text" class="form-control bg-gray" name="email" value="<?= $value['Email'] ?>" readonly>
                  </div>
              </div>

              <div class="col-lg-12">
                    <div class="form-group">
                        <strong for="asunto">Asunto:</strong>
                        <input type="text" class="form-control bg-transparent" name="asunto" value="">
                    </div>
                </div>

              <div class="col-lg-12">
                    <div class="form-group">
                        <strong for="comentarios">Descripción:</strong>
                        <textarea type="text" class="form-control bg-transparent" name="comentarios" value="" style="height:100px"></textarea>
                    </div>
                </div>

              <div class="col">
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase mt-3">Crear</button>
              </div>
            </div>

          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</section>