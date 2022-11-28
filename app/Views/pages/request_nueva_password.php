<?php $session = \Config\Services::session();  ?>
<section class="presentacion p-5 text-lg-start text-center d-flex align-items-center" style="height: 300">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">¿Olvidaste tu contraseña?</h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray">
    <div class="container p-5 w-50 d-flex justify-content-center">
      

        <div class="p-5 w-75">

        <?php if($session->getFlashdata('msgError') !== null){ 
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $session->getFlashdata('msgError');  ?>
            </div>

            <?php } elseif($session->getFlashdata('msg') !== null){?>
              <div class="alert alert-success" role="alert">
                <?php echo $session->getFlashdata('msg');  ?>
            </div>
            <?php }?>
        <h3 class="py-4 px-5 text-white text-uppercase fs-2 bg-blue fw-bold mb-0 text-center"><i class="fa-solid fa-lock"></i> Recuperar Contraseña</h3>
            
        <form class="form-border p-5 bg-white mb-0 text-center" method="POST" action="<?php echo base_url(); ?>/request_new_password">
            <div class="d-flex align-items-center mb-4">
                <i class="fa-solid fa-envelope fs-1 me-4 cblue"></i>
                <input class="form-control" placeholder="Correo Electrónico" type="text" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase mb-3">Login</button>
        </form>
            
        </div>

    </div>
</section>
