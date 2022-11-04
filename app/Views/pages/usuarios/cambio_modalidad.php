<?php
    $value= $_SESSION['user'];
?>
<section class="bg-gray">
  	<div class="container-fluid row">

	  	<div class="col-lg-2 ps-0">
        	<?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
		</div>

		<div class="col-lg-10 text-center d-flex flex-row">
			<div class="contrainer p-5 col-lg-6" >
				<h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0"><img style="width: 60px;" class="img-fluid"> Cambio de Modalidad</h3>
				<div class="d-flex justify-content-center form-border p-3 bg-white mb-0">
					<p>Tu modalidad es: <b><?php 
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
                <?php echo form_open('/users/solicitar_cambio_modalidad'); ?>

                <div class="d-flex flex-column justify-content-center form-border p-3 bg-white mb-0">
                    <div class="d-flex flex-row justify-content-center">
                        <p style="line-height:35px">Solicitar cambio de modalidad a:</p> 
                        <select id ="ejerciente" class="form-control bg-transparent" style="width:150px; margin-left: 20px" name="ejerciente">
                            <option value="" select>Tipo de colegiado</option>
                            <option value="1">Ejerciente</option>
                            <option value="0">No ejerciente</option>
                            <option value="2">Jubilado</option>
                            <option value="3">Estudiante</option>
                        </select>
                    </div>
					<div class="col-md d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Solicitar cambio</button>
                    </div>
				</div>
                
                <?php echo form_close(); ?>
			</div>
            <div class="contrainer p-5 col-lg-6">
				<h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0"><img style="width: 60px;" class="img-fluid"> Solicitud de Baja</h3>
				<div class="d-flex justify-content-center form-border p-3 bg-white mb-0">
                <?php echo form_open('/users/solicitar_baja'); ?>

                <div class="d-flex flex-column justify-content-center form-border p-3 bg-white mb-0">
                    <div class="d-flex flex-row justify-content-center">
                        <p style="line-height:35px">¿Deseas solicitar la dada de baja del Colegio Profesional de Logopedas de Cantabria?</p> 
                        
                    </div>
					<div class="col-md d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase ">Solicitar Baja</button>
                    </div>
				</div>
                
                <?php echo form_close(); ?>
				</div>
			</div>
		</div>
        

	</div>
</section>