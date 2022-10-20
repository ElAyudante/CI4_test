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
                                <strong>Fecha Apertura:</strong>
                                <?php echo $item->Fecha; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Asunto:</strong>
                                <?php echo $item->Asunto; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Descripción:</strong>
                                <?php echo $item->Comentarios; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Respuesta:</strong>
                                <?php echo $item->MiRespuesta; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
