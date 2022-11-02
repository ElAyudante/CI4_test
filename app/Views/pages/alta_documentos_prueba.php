<?php
$form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'',];
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
                    
                        <div class="row row-cols-lg-2 g-lg-4 cblue">
                        
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del documento" autofocus>
                                </div>
                            </div>
                        
                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                                    <label class="fw-bold me-3">Tipo de archivo</label>

                                    <div class="form-check form-check-inline me-2 mb-0">
                                        <input class="form-check-input" type="radio" name="archivos" id="archivos1" value="publico" checked>
                                        <label class="form-check-label" for="archivos1">Público</label>
                                    </div>
                                    <div class="form-check form-check-inline me-2 mb-0">
                                        <input class="form-check-input" type="radio" name="archivos" id="archivos2" value="privado" checked>
                                        <label class="form-check-label" for="archivos2">Privado</label>
                                    </div>
                                    <div class="form-check form-check-inline me-2 mb-0">
                                        <input class="form-check-input" type="radio" name="archivos" id="archivos3" value="convenio" checked>
                                        <label class="form-check-label" for="archivos3">Convenio</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="descripcion" placeholder="Descripción del documento" autofocus></textarea>
                                </div>
                            </div>

                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="custom-file">
                                <label class="custom-file-label text-uppercase fw-bold me-3" for="customFile">Archivo adjunto</label>
                                    <input type="file" class="custom-file-input"  name="archivo" id="customFile">                    
                                </div>
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
                            </div>

                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</section>
