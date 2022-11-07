<section class="bg-gray">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
            </div>

            <div class="col-lg-10 mt-4">

                <!--<section class="junta-derecha mb-4">
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
                                        <div class="overlay-curso"></div>
                                        <div class="content-curso">
                                            <h2 class="text-uppercase fw-bold cgray mt-0"><?php echo $item->Nombre; ?></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 text-white mt-5 pb-5 pt-2 d-flex flex-column">
                                <div class="col-lg-8 decana mt-1">
                                    <h3 class="curso-tittle text-white mb-4"><?php echo $item->Nombre; ?></h3>
                                </div>
                                <div class="">
                                    <?php echo $item->Descripcion; ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>  
                </section>-->

                <section class="d-flex justify-content-center p-5">
                    <div class="row row-cols-2 g-4">

                        <div class="col">
                            <div class="card bg-transparent w-auto cards-users-empleo">
                                <div class="row g-0">
                                    <div class="col-lg-4 d-flex justify-content-center">
                                        <a href="<?php echo base_url(),'/'; ?>formacion_detalle" target="_blank" class="text-decoration-none">
                                            <img class="img-fluid" src="<?php echo base_url(),'/'; ?>assets/images/png/curso-cplc-arasaac.jpg">
                                        </a>
                                    </div>
                                    <div class="col-lg-8 d-flex align-items-center bg-white">
                                        <div class="card-body text-center">
                                            <h5 class="curso-tittle cblue text-uppercase mb-4 text-center"><?php echo $item->Nombre; ?></h5>
                                            <button type="button" class="btn btn-primary btn-block btn-acceso text-uppercase"><a class="text-white text-decoration-none" href="">Descarga</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card bg-transparent w-auto cards-users-empleo">
                                <div class="row g-0">
                                    <div class="col-lg-4 d-flex justify-content-center">
                                        <a href="<?php echo base_url(),'/'; ?>formacion_detalle" target="_blank" class="text-decoration-none">
                                            <img class="img-fluid" src="<?php echo base_url(),'/'; ?>assets/images/png/curso-cplc-arasaac.jpg">
                                        </a>
                                    </div>
                                    <div class="col-lg-8 d-flex align-items-center bg-white">
                                        <div class="card-body text-center">
                                            <h5 class="curso-tittle cblue text-uppercase mb-4 text-center"><?php echo $item->Nombre; ?></h5>
                                            <button type="button" class="btn btn-primary btn-block btn-acceso text-uppercase"><a class="text-white text-decoration-none" href="">Descarga</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>

            </div>          
        </div>
    </div>
</section>
