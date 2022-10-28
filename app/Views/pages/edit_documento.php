
<section class="junta">

<div class="container-fluid">
  <div class="row">
	
	<div class="col-lg-2 ps-0">
	  <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
	</div>

	<div class="col-lg-10">
	  <div class="container p-5">
		<?php  ?>

		<?php echo form_open('/itemCRUD/update_documento'); ?>
		  <div class="row">
			<?php
			  /*if ($this->session->flashdata('errors')){
				echo '<div class="alert alert-danger">';
				echo $this->session->flashdata('errors');
				echo "</div>";
			  }*/
			?>

		  <h3 style="color: #004987; text-transform: uppercase; font-size:3em">Editar Documento</h3>

			<div class="col-md-3">
			  <div class="form-group">
				<input type="text" class="form-control" name="nombre" value="<?=$item->Nombre;?>" autofocus>
			  </div>
			</div>
			<div class="col-md-3">
			  <div class="form-group">
				<input type="text" class="form-control" name="descripcion" value="<?=$item->Descripcion?>">
			  </div>
			</div>
			<div class="col-md-3">
			  <div class="form-group">
				<input type="file" class="form-control bg-transparent" name="archivo" value="<?= $item->Archivo?>">
			  </div>
			</div>
			<div class="col-md-3">
		  <div class="form-group custom-control custom-radio text-uppercase pt-3">
				<input type="radio" class="custom-control-input" value="1" name="publico" id="activo1">
				<label class="custom-control-label" for="habitacion1" style="color: #004987; font-weight:500;">Publico</label>
				<input type="radio" class="custom-control-input" value="0" name="publico" id="activo2">
				<label class="custom-control-label" for="habitacion2"style="color: #004987; font-weight:500;">Privado</label>
			  </div>
		  </div>
		  </div>
		  <div class="row">
			<div class="col-md-3">
			  <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
			</div>
			<input name = "id" type = "hidden" value="<?php echo $item->ID; ?>">
		  </div>
		<?php echo form_close(); ?>
	  </div>
	</div>
  </div>
</div>

</section>