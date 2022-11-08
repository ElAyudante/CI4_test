<?php
$form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'', "enctype" => "multipart/form-data"];
?>

<section class="bg-gray">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_admin'); ?> 
            </div>
    

            <div class="col-lg-10">
                <div class="container p-5">
                    <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Generar Factura</h3>
                    <?php echo form_open('itemCRUD/store_factura', $form_att); ?>
                    
                        <div class="row row-cols-lg-2 g-lg-4 cblue">
                        
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="numColegiado" value="<?= $data->NumColegiado ?>" autofocus disabled>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nombre" value="<?= $data->Nombre. ' ' . $data->Apellidos ?>" autofocus disabled>
                                </div>
                            </div>

                            <div class="col d-flex align-items-center justify-content-center">
                                <label for="formFile" class="form-label text-uppercase fw-bold me-3 text-center">Archivo adjunto</label>
                                <input class="form-control" type="file" id="formFile" name="archivo">
                            </div>

                            <div class="col">
                                <button type="submit" name="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Generar Factura</button>
                            </div>
                            <input name = "id" type = "hidden" value="<?php echo $data->ID; ?>">

                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</section>
