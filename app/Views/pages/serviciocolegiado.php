</div>
<img src="<?php echo base_url(),'/'; ?>assets/images/png/servicio.png" style="height: 270; width:100%;"></img>
<div class="container">
    <div class="grid-de-imagenes">
    <div class="row">
            <a class="col-lg-6" href="<?php echo base_url(),'/'; ?>codigo">
                <img src="<?php echo base_url(),'/'; ?>assets/images/png/normas-img.png" style="height: 270; width:545; margin-top: 40;"></img>
            </a>
            <a class="col-lg-6" href="<?php echo base_url(),'/'; ?>forum/index">
                <img src="<?php echo base_url(),'/'; ?>assets/images/png/foro-img.png" style="height: 270; width:545; margin-top: 40;"></img>
            </a>
        </div>
        <div class="row">
            <a class="col-lg-4" href="<?php echo base_url(),'/'; ?>products/index">
                <img src="<?php echo base_url(),'/'; ?>assets/images/png/tasas-img.png" style="height: 300; width:340; margin-top: 40;"></img>
            </a>
            <a class="col-lg-4" href="<?php echo base_url(),'/'; ?>juntagob">
                <img src="<?php echo base_url(),'/'; ?>assets/images/png/junta-img.png" style="height: 300; width:340; margin-top: 40; margin-left: 5;"></img>
            </a>
            <?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true && $_SESSION['is_admin'] === true) : ?>
            <a class="col-lg-4" href="<?php echo base_url(),'/'; ?>alucinante">
                <img src="<?php echo base_url(),'/'; ?>assets/images/png/voto-img.png" style="height: 300; width:340; margin-top: 40; margin-left: 10;"></img>
            </a>
            <?php endif; ?>
        </div>
        <div class="row mt-5">
            <a href="<?php echo base_url(),'/'; ?>users/profile/edit" class="alineadobotonmenu btn btn-primary btn-lg btn-block" type="submit">EDITAR PERFIL</a>
        </div>
    </div>
</div>
