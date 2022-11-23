<?php
    $value= $_SESSION['user'];
    $form_att = [ "enctype" => "multipart/form-data"]
?>
<section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>

		<div class="col-lg-10 text-center">
            <div class="container p-5">
                <div class="row row-cols-2">

                    <div class="col" >
                        <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0 text-center">Cambio de Modalidad</h3>
                        <div class="d-flex justify-content-center text-uppercase cblue form-border p-3 bg-white mb-0">
                            <p class="mb-0">Tu modalidad es: <b><?php 
                                switch($value['Ejerciente']){
                                    case 0:
                                        echo 'No Ejerciente';
                                        break;
                                    case 1: 
                                        echo 'Ejerciente';
                                        break;
                                    case 2:
                                        echo 'Jubilado';
                                        break;
                                    case 3:
                                        echo 'Estudiante';
                                        break;
                                }
                            ?></b></p>
                        </div>
                        <?php echo form_open('/users/solicitar_cambio_modalidad', $form_att); ?>

                        <div class="form-border p-3 bg-white mb-0">
                            <div class="d-flex justify-content-center">
                                <p class="mb-0 cblue fw-bold text-uppercase me-3">Solicitar cambio de modalidad a:</p>
                                <select id ="ejerciente" class="form-select bg-transparent" name="ejerciente">
                                    <option select>Tipo de colegiado</option>
                                    <option value="1">Ejerciente</option>
                                    <option value="0">No ejerciente</option>
                                    <option value="2">Jubilado</option>
                                    <option value="3">Estudiante</option>
                                </select>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center mb-2 mt-4">
							<input type="file" class="form-control bg-transparent" name="archivo">
						</div>
                            <div class="col-md d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase w-auto"><?= $textBoton ?></button>
                            </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>

                    <div class="col">
                        <div>
                            <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Solicitud de Baja</h3>
                            <div class="d-flex justify-content-center">
                                <?php echo form_open('/users/solicitar_baja', $form_att); ?>

                                <div class="d-flex flex-column justify-content-center form-border p-3 bg-white mb-0">
                                    <div class="d-flex flex-row justify-content-center text-uppercase cblue fw-bold">
                                        <p class="mb-0">¿Deseas solicitar la dada de baja del Colegio Profesional de Logopedas de Cantabria?</p> 
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center mt-4">
							        <input type="file" class="form-control bg-transparent" name="archivo">
						</div>
                                    <div class="col-md d-flex justify-content-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase w-auto">Solicitar Baja</button>
                                    </div>
                            </div>
                            
                            <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

                </div>	
            </div>		
		</div>
        

	</div>
</section>