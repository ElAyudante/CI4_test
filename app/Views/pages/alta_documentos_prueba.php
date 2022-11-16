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
                    <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Alta documento (admin)</h3>
                    <?php echo form_open('itemCRUD/store_documento', $form_att); ?>
                    
                        <div class="row row-cols-lg-2 g-lg-4 cblue text-uppercase">
                        
                            <div class="col">
                                <div class="form-group">
                                    <strong>Nombre del Documento:</strong>
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del documento" autofocus>
                                </div>
                            </div>
                        
                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                                    <label class="fw-bold me-3">Sector</label>

                                    <div class="form-check form-check-inline me-2 mb-0">
                                        <input class="form-check-input" type="radio" name="archivos" id="archivos1" value="publico" checked>
                                        <label class="form-check-label" for="archivos1">Público</label>
                                    </div>
                                    <div class="form-check form-check-inline me-2 mb-0">
                                        <input class="form-check-input" type="radio" name="archivos" id="archivos2" value="privado">
                                        <label class="form-check-label" for="archivos2">Privado</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <strong>Descripción del Documento:</strong>
                                    <textarea type="text" class="form-control" name="descripcion" placeholder="Descripción del documento" autofocus></textarea>
                                </div>
                            </div>

                            <div class="col d-flex align-items-center justify-content-center">
                                <label for="formFile" class="form-label text-uppercase fw-bold me-3 text-center">Archivo adjunto</label>
                                <input class="form-control" type="file" id="formFile" name="archivo">
                            </div>

                            <div class="col">
                                <button type="submit" name="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
                            </div>

                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</section>
