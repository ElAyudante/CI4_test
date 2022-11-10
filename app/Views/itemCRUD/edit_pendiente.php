
<section class="bg-gray">

    <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
    </div>

	<div class="container junta" style="position: relative; top: ; left: 50px">
		<?php  ?>

		<?php echo form_open('itemCRUD/update_pendiente/'.$item->Id); ?>
			<div class="row">

			<?php
            /*
                if ($this->session->flashdata('errors')){
                    echo '<div class="alert alert-danger">';
                    echo $this->session->flashdata('errors');
                    echo "</div>";
                }
                */
            ?>

			<h3 style="color: #004987; text-transform: uppercase; font-size:3em; margin-top:20px">Alta de colegiado pendiente</h3>

			<div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Nº Colegiado:</strong>
                    <input type="text" name="colegiado" class="form-control" value="<?php echo $item->Colegiado; ?>">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $item->Nombre; ?>" readonly>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="apellidos" class="form-control" value="<?php echo $item->Apellidos; ?>" readonly>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Nif:</strong>
                    <input type="text" name="nif" class="form-control" value="<?php echo $item->NIF; ?>" readonly>
                </div>
            </div>
            
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Ejerciente:</strong>
                    <input type="text" name="ejerciente" class="form-control" value="<?php 
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
            
			<div class="row">
				<div class="col-md-3">
					<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Enviar pago</button>
				</div>
                <input name = "id" type = "hidden" value="<?php echo $item->Id; ?>">
			</div>

		<?php echo form_close(); ?>
	</div>
</section>
