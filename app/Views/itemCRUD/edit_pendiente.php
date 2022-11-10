<?php
$form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0 text-uppercase", "novalidate"=>'',];
?>

<section class="bg-gray" style="height: 60vh;">
	<div class="container-fluid">
        <div class="row h-100">
            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
            </div>
            
            <div class="col-lg-10">
                <div class="container p-5">
                    <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Alta de colegiado pendiente</h3>
                    <?php echo form_open('itemCRUD/update_pendiente/'.$item->Id, $form_att); ?>

                        <div class="row row-cols-lg-4 g-lg-4 cblue">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <strong>Nº Colegiado:</strong>
                                    <input type="text" name="colegiado" class="form-control" value="<?php echo $item->Colegiado; ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="nombre" class="form-control bg-gray" value="<?php echo $item->Nombre; ?>" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <strong>Apellidos:</strong>
                                    <input type="text" name="apellidos" class="form-control bg-gray" value="<?php echo $item->Apellidos; ?>" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <strong>Nif:</strong>
                                    <input type="text" name="nif" class="form-control bg-gray" value="<?php echo $item->NIF; ?>" readonly>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="form-group">
                                    <strong>Ejerciente:</strong>
                                    <input type="text" name="ejerciente" class="form-select bg-gray" value="<?php 
                                        switch ($item->Ejerciente) {
                                            case '0':
                                                echo('No ejerciente');
                                                break;
                                            case '1':
                                                echo('Ejerciente');
                                                break;
                                            case '2':
                                                echo('Jubilado');
                                                break;
                                            case '3':
                                                echo('Estudiante');
                                                break;                            
                                            default:
                                                echo('Tipo de colegiado');
                                                break;
                                        }
                                    ?>" readonly>
                                </div>
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Enviar pago</button>
                            </div>
                            <input name = "id" type = "hidden" value="<?php echo $item->Id; ?>">
                            
                        
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
