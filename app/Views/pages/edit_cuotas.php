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
			<h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Editar Tasas/Cuotas</h3>
          	<?php echo form_open('/itemCRUD/update_cuotas', $form_att) ?>

            <div class="row row-cols-lg-2 g-lg-4 cblue">

				<div class="col">
					<div class="form-group">
						<label for="inscripcion">Tasa Inscripción:</label>
						<input type="text" class="form-control" name="inscripcion" value="<?=$item->Inscripcion;?>" autofocus>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label for="ejerciente">Cuota Ejerciente:</label>
						<input type="text" class="form-control" name="ejerciente" value="<?=$item->Ordinaria;?>" autofocus>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label for="noEjerciente">Cuota No Ejerciente:</label>
						<input type="text" class="form-control" name="noEjerciente" value="<?=$item->NoEjerciente;?>" autofocus>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label for="estudiantes">Cuota Estudiante:</label>
						<input type="text" class="form-control" name="estudiantes" value="<?=$item->Estudiantes;?>" autofocus>
					</div>
              	</div>

			  	<div class="col">
                	<div class="form-group">
						<label for="jubilados">Cuota Jubilado:</label>
						<input type="text" class="form-control" name="jubilados" value="<?=$item->Jubilados;?>" autofocus>
					</div>
                </div>
				
				<div class="col"></div>
			
				<div class="col">
					<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Actualizar</button>
				</div>

            </div>

          <?php echo form_close(); ?>

        </div>
      </div>

    </div>
  </div>
</section>