<section class="presentacion p-5 text-left" style="height: 200">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Acceso Usuario</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta" style="height: 400; margin-top: 6em; margin-bottom: -3em;">
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
        <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Login
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo base_url(); ?>/users/login">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="NIF" type="text" name="nif" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" type="password" name="pass" required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
      </div>
    </div>
</section>





            

			