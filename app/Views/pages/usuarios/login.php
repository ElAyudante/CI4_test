<section class="presentacion p-5 text-lg-start text-center d-flex align-items-center" style="height: 300">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Acceso Usuario</h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray">
    <div class="container p-5">
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

        <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Login</h3>

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
</section>





            

			