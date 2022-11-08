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
                    <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Alta Convenio</h3>
                    <?php echo form_open('/itemCRUD/update_convenio', $form_att); ?>
                    <div class="row row-cols-lg-2 g-lg-4 cblue text-uppercase">
                    
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="empresa" value="<?=$item->empresa?>" autofocus>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="web" value="<?=$item->web?>" autofocus>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="codigo" value="<?=$item->codigo?>" autofocus>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="descripcion" autofocus><?=$item->descripcion?></textarea>
                            </div>
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
                        </div>
                        <input name = "id" type = "hidden" value="<?php echo $item->id; ?>"> <!-- NO TOCAR -->
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        
        </div>
    </div>
</section>