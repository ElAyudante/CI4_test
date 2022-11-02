<section class="junta">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
          <?php  ?>

          <?php echo form_open('/itemCRUD/update_cuotas') ?>
            <div class="row">
              <?php
                /*if ($this->session->flashdata('errors')){
                  echo '<div class="alert alert-danger">';
                  echo $this->session->flashdata('errors');
                  echo "</div>";
                }*/
              ?>

            <h3 style="color: #004987; text-transform: uppercase; font-size:3em">Editar Tasas/Cuotas</h3>

			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
					<label for="inscripcion">Tasa Inscripción:</label>
					<input type="text" class="form-control" name="inscripcion" value="<?=$item->Inscripcion;?>" autofocus>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
					<label for="ejerciente">Cuota Ejerciente:</label>
					<input type="text" class="form-control" name="ejerciente" value="<?=$item->Ordinaria;?>" autofocus>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					<label for="noEjerciente">Cuota No Ejerciente:</label>
					<input type="text" class="form-control" name="noEjerciente" value="<?=$item->NoEjerciente;?>" autofocus>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
					<label for="estudiantes">Cuota Estudiante:</label>
					<input type="text" class="form-control" name="estudiantes" value="<?=$item->Estudiantes;?>" autofocus>
					</div>
              	</div>
			  	<div class="col-md-2">
                	<div class="form-group">
					<label for="jubilados">Cuota Jubilado:</label>
                  	<input type="text" class="form-control" name="jubilados" value="<?=$item->Jubilados;?>" autofocus>
                </div>
			</div>
			<div class="row">
				<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Actualizar</button>
			</div>

              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</section>