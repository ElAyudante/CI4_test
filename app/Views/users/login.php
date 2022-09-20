</div>    
    <?php  ?>

<section class="presentacion p-5 text-left mb-5">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Acceso a colegiados</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta">
    <div class="container">
        <?php echo form_open('users/login'); ?>
            <div class="row py-5">
                
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
                    <h1 class="cblue fw-bold text-uppercase text-center pb-4">¡Bienvenido Colegiado!</h1>
                    <div class="form-group">
                        <input type="text" class="form-control text-center bordercblue" name="username" placeholder="Usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control text-center bordercblue" name="password" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary text-uppercase d-block m-auto">Entrar</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</section>
