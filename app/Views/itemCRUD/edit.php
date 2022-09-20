
<section class="junta">

    <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
    </div>

	<div class="container junta" style="position: relative; top: ; left: 50px">
		<?php  ?>

		<?php echo form_open('itemCRUD/update/'.$item->Id); ?>
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

			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Editar Colegiado</h3>

			<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha Alta:</strong>
                    <input type="text" name="falta" class="form-control" value="<?php echo $item->FechaAlta; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $item->Nombre; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="apellidos" class="form-control" value="<?php echo $item->Apellidos; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nif:</strong>
                    <input type="text" name="nif" class="form-control" value="<?php echo $item->NIF; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dirección:</strong>
                    <input type="text" name="direccion" class="form-control" value="<?php echo $item->Direccion; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Localidad:</strong>
                    <input type="text" name="localidad" class="form-control" value="<?php echo $item->Localidad; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Código Postal:</strong>
                    <input type="text" name="cp" class="form-control" value="<?php echo $item->CP; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Provincia:</strong>
                    <input type="text" name="provincia" class="form-control" value="<?php echo $item->Provincia; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Comunidad:</strong>
                    <input type="text" name="comunidad" class="form-control" value="<?php echo $item->Comunidad; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="text" name="telefono" class="form-control" value="<?php echo $item->Telefono; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Móvil:</strong>
                    <input type="text" name="movil" class="form-control" value="<?php echo $item->Movil; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" value="<?php echo $item->Email; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lugar de Nacimiento:</strong>
                    <input type="text" name="lnacimiento" class="form-control" value="<?php echo $item->LugarNacimiento; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de Nacimiento:</strong>
                    <input type="text" name="fnacimiento" class="form-control" value="<?php echo $item->FechaNacimiento; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cuenta Bancaria:</strong>
                    <input type="text" name="cuenta" class="form-control" value="<?php echo $item->CuentaBancaria; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teléfono de trabajo:</strong>
                    <input type="text" name="tlftrabajo" class="form-control" value="<?php echo $item->TelefonoTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lugar de Trabajo:</strong>
                    <input type="text" name="lugtrabajo" class="form-control" value="<?php echo $item->LugarTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dirección de Trabajo:</strong>
                    <input type="text" name="dtrabajo" class="form-control" value="<?php echo $item->DireccionTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Localidad de Trabajo:</strong>
                    <input type="text" name="loctrabajo" class="form-control" value="<?php echo $item->LocalidadTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nº de Colegiado:</strong>
                    <input type="text" name="ncolegiado" class="form-control" value="<?php echo $item->Colegiado; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
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
                    ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Especialidad:</strong>
                    <input type="text" name="especialidad" class="form-control" value="<?php echo $item->Especialidad; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ámbito de Trabajo:</strong>
                    <input type="text" name="ambito" class="form-control" value="<?php echo $item->AmbitoTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Sector:</strong>
                    <select id ="ejerciente" class="form-control bg-transparent" name="ejerciente">
                        <option value="1" select>Público</option>
                        <option value="0">Privado</option>
                    </select>
                </div>
            </div>
			<div class="row">
				<div class="col-md-3">
					<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
				</div>
			</div>

		<?php echo form_close(); ?>
	</div>
</section>
