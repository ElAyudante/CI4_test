<section class="junta">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
            </div>
            <div class="col-lg-10 mt-4">
                <section class="junta-derecha mb-4">
                    <div class="container container-curso" style="margin-top:100px">
                        <div class="row row-cols-2 row-cols-sm-1">
                            <div class="col-lg-4 text-white mt-5">
                                <a href="<?php echo base_url(),'/'; ?>formacion_detalle" target="_blank" class="text-decoration-none">
                                    <div class="cards-curso m-auto" style="margin-top: -8em !important;">
                                        <div class="imgBx-curso">
                                            <div>
                                                <img style="height:350px;" src="<?php echo base_url(),'/'; ?>assets/images/png/curso-cplc-arasaac.jpg">
                                            </div>
                                        </div>
                                        <div class="overlay-curso">
                                            
                                        </div>
                                        <div class="content-curso">
                                            <h2 class="text-uppercase fw-bold cgray mt-0"><?php echo $item->Empresa; ?></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 text-white mt-5 pb-5 pt-2 d-flex flex-column">
                                <div class="col-lg-8 decana mt-1">
                                    <h3 class="curso-tittle text-white mb-4"><?php echo $item->Ofrece; ?></h3>
                                </div>
                                <ul class="objetivos">
                                    <li><?php echo $item->Empresa; ?></li>
                                    <li><?php echo $item->Lugar; ?></li>
                                    <li><?php echo $item->Condiciones; ?></li>
                                    <li><?php echo $item->Contacto; ?></li>
                                </ul>
                                <button type="button" class="btn btn-primary btn-block btn-acceso text-uppercase"><a class="text-white" href="">Contactar</a></button>
                            </div>
                        </div>
                    </div>  
                </section>
            </div>     
        </div>
    </div>
</section>
