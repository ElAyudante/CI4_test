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
    <div class="container p-5 w-50">

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

        <div class="p-5">

            <h3 class="p-3 text-white text-uppercase fs-2 bg-blue fw-bold mb-0"><i class="bi bi-person-circle"></i> Login</h3>
            <form class="form-border p-3 bg-white mb-0" method="POST" action="<?php echo base_url(); ?>/users/login">
                <input class="form-control mb-3" placeholder="NIF" type="text" name="nif" required>
                <input class="form-control mb-3" placeholder="Password" type="password" name="pass" required>
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase mb-3">Login</button>
                <p class="text-muted mb-0">¿Olvidaste tu contraseña?</p>
            </form>
            
        </div>

    </div>
</section>





            

			