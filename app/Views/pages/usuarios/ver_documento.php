<section class="junta">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
            </div>

            <div class="col-lg-10 mt-4">
                <div class="container junta">

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre del Documento:</strong>
                                <?php echo $item->Nombre; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Archivo:</strong>
                                <?php echo $item->Archivo; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
