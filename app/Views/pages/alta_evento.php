</div>

<section class="presentacion p-5 text-left">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Alta Evento</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta app" style="margin-top: 2.1em; margin-bottom: -5.1em; height: auto;">

	<?php echo view('templates/menu_admin'); ?>

  	<div class="container" style="width: 70%; padding:0; margin-right:2em; margin-top: -60em;">
		<?php  ?>

		<?php echo form_open('users/register_evento_propio'); ?>
			<div class="row">
			<?php if (validation_errors()) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if (isset($error)) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
				</div>
			<?php endif; ?>
      <?php if (isset($success)) : ?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert">
						<?= $success ?>
					</div>
				</div>
			<?php endif; ?>
			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Alta evento</h3>
        <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="evento" placeholder="Nombre del evento" autofocus>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <textarea type="text" class="form-control" name="descripcion" placeholder="Descripción"></textarea>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12 mb-5 form-group">
                <div class="custom-file">
                <label class="custom-file-label" for="customFile">Archivo adjunto</label>
                    <input type="file" class="custom-file-input"  name="archivo" id="customFile">                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control bg-transparent" name="importecolegiados" placeholder="Colegiados ejercientes">
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control bg-transparent" name="importenoejercientes" placeholder="No ejercientes y otros colegiados">
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control bg-transparent" name="importeasociaciones" placeholder="Alumnos logopedia">
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control bg-transparent" name="nocolegiados" placeholder="Logopedas no colegiados">
            </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group custom-checkbox text-uppercase pt-3">
              <label style="color: #004987; font-weight:500;">Activo</label>
              <input type="checkbox" class="custom-control-input" name="activo" id="activo1">
              <label class="custom-control-label" for="activo1" value="1" style="color: #004987; font-weight:500;">Sí</label>
              <input type="checkbox" class="custom-control-input" name="activo" id="activo2">
              <label class="custom-control-label" for="activo2" value="0" style="color: #004987; font-weight:500;">No</label>
            </div>
          </div>
        </div>
     
			<div class="row">
				<div class="col-md-3 mb-5">
					<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
</section>


