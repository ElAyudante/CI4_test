</div>    
    <?php  ?>

<section class="presentacion p-5 text-left mb-5">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Acceso Adiminstrador</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta" style="height: 200; margin-top: 6em; margin-bottom: -3em;">
    <div class="container">
      <div class="row">
        <?php if (validation_errors()) : ?>
          <div class="col-md-12">
              <div class="alert alert-danger" role="alert">
                  <?= validation_errors() ?>
              </div>
          </div>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-4 mx-auto">
          <form action="<?php echo base_url(),'/'; ?>itemCRUD" method="post" name="formulario" style="margin:20px 0 0 20px">
            <div class="form-group">
              <input type="text" class="form-control text-center" name="username" placeholder="Usuario">
            </div>
            <div class="form-group">
              <input type="password" class="form-control text-center" name="password" placeholder="Contraseña">
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Entrar</button>
            <p class="mt-4"><a href="<?php echo base_url(),'/'; ?>password">¿Olvidaste tu contraseña?</a></p>
          </form>
        </div>
      </div>
    </div>
</section>
