<section class="presentacion p-5 text-lg-start text-center d-flex align-items-center" style="height: 300">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Acceso Colegiados</h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray">
    <div class="container p-5 w-50 d-flex justify-content-center">

        <div class="alert alert-danger" role="alert">
            <?php 
            
            ?>
        </div>

        <div class="p-5 w-75">

            <h3 class="py-4 px-5 text-white text-uppercase fs-2 bg-blue fw-bold mb-0 text-center"><i class="bi bi-person-circle"></i> Colegiados Login</h3>
            <form class="form-border p-5 bg-white mb-0 text-center" method="POST" action="<?php echo base_url(); ?>/users/login">
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-people-fill fs-1 me-4 cblue"></i>
                    <input class="form-control" placeholder="NIF" type="text" name="nif" required>
                </div>
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-key-fill fs-1 me-4 cblue"></i>
                    <input class="form-control" placeholder="Password" type="password" name="pass" required>
                </div>              
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase mb-3">Login</button>
                <p class="text-muted mb-0">¿Olvidaste tu contraseña?</p>
            </form>
            
        </div>

    </div>
</section>





            

			