<?php
    $value = $_SESSION['user'];
?>

<section class="junta">

  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_usuarios'); ?> <!-- MENU USUARIO.PHP -->
      </div>

      <div class="col-lg-10">
        <div class="container p-5">

          <?php echo form_open('/itemCRUD/crear_reclamacion'); ?>
            <div class="row">
              <?php
                /*if ($this->session->flashdata('errors')){
                  echo '<div class="alert alert-danger">';
                  echo $this->session->flashdata('errors');
                  echo "</div>";
                }*/
              ?>

            <h3 style="color: #004987; text-transform: uppercase; font-size:3em">Nueva Reclamación</h3>

            <div class="row">
              <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <p type="text" class="form-control" name="nombre" value="<?= $value['Nombre'] ?>" autofocus><?= $value['Nombre'] ?> </p>
                    </div>
              </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <p type="text" class="form-control" name="apellidos" value="<?= $value['Apellidos'] ?>"><?= $value['Apellidos'] ?> </p>
                    </div>
              </div>
              <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" value="">
                    </div>
            </div>
              <div class="col-md-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="">
                    </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control bg-transparent" name="asunto" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control bg-transparent" name="descripcion" value="" style="height:100px">
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Crear</button>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</section>