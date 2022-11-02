<?php
$form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'',];
?>

<section class="bg-gray">
  <div class="container-fluid">
        <div class="row">
        
            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
            </div>

            <div class="col-lg-10">
                <div class="container p-5">
                    <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Alta Convenio (Admin)</h3>
                    <?php echo form_open('/itemCRUD/store_convenio', $form_att); ?>

                    <div class="row row-cols-lg-2 g-lg-4 cblue">

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="empresa" placeholder="Empresa" autofocus>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="web" placeholder="Web" autofocus>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="codigo" placeholder="Código" autofocus>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="descripcion" placeholder="Descripción"></textarea>
                            </div>
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
                        </div>
                <?php echo form_close(); ?>
            </div>
            
        </div>
    </div>
</section>


